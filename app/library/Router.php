<?php

namespace app\library;

use Closure;
use DI\Container;

class Router
{
  private array $routes = [];
  private array $routeOptions = [];
  private Route $route;
  private Container $container;

  public function __construct(Container $container)
  {
    $this->container = $container;
  }

  public function add(
    string $uri,
    string $request,
    string $controller,
    array $wildcardAliases = []
  ) {
    $this->route = new Route($request, $controller, $wildcardAliases);
    $this->route->addRouteUri(new Uri($uri));
    $this->route->addRouteGroupOptions(new RouteOptions($this->routeOptions));
    $this->route->addRouteWildcard(new RouteWildcard());
    $this->routes[] = $this->route;

    return $this;
  }

  public function group($routeOptions, Closure $callback)
  {
    $this->routeOptions = $routeOptions;
    $callback->call($this);
    $this->routeOptions = [];
  }

  public function middleware(array $middlewares)
  {
    $options = [];
    $options = !empty($this->routeOptions) ?
      array_merge($this->routeOptions, ['middlewares' => $middlewares]) :
      ['middlewares' => $middlewares];

    $this->route->addRouteGroupOptions(new RouteOptions($options));
  }

  public function options(array $options)
  {
    if (!empty($this->routeOptions)) {
      $options = array_merge($this->routeOptions, $options);
    }

    $this->route->addRouteGroupOptions(new RouteOptions($options));
  }

  public function init()
  {
    foreach ($this->routes as $route) {
      if ($route->match()) {
        Redirect::register($route);
        return (new Controller($this->container))->call($route);
      }
    }

    return (new Controller($this->container))->call(new Route('GET', 'NotFoundController:index', []));
  }
}
