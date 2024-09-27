<?php

try {
  $router->group(['prefix' => 'admin', 'controller' => 'admin', 'middlewares' => ['auth']], function () {
    $this->add('/', 'GET', 'AdminController:index');
    $this->add('/posts/create', 'GET', 'AdminController:create');
    $this->add('/posts/store', 'POST', 'AdminController:store');
    $this->add('/post/(:numeric)', 'POST', 'AdminController:delete', ['id']);
  });
  $router->group(['prefix' => 'blog', 'controller' => 'blog'], function () {
    $this->add('/', 'GET', 'BlogController:index');
    $this->add('/post/(:any)', 'GET', 'BlogController:show', ['slug']);
  });
  $router->add('/', 'GET', 'HomeController:index');
  $router->add('/product/(:alpha)', 'GET', 'ProductController:show')->options(['prefix' => 'site', 'controller' => 'site', 'middlewares' => []]);
  $router->init();
} catch (\Exception $e) {
  dd($e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine());
}