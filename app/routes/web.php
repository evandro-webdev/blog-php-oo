<?php

try {
  $router->add('/', 'GET', 'HomeController:index');

  $router->group(['prefix' => 'admin', 'controller' => 'admin', 'middlewares' => ['admin']], function () {
    $this->add('/', 'GET', 'AdminController:index');
    $this->add('/posts/create', 'GET', 'AdminController:create');
    $this->add('/posts', 'POST', 'AdminController:store');
    $this->add('/posts/edit/(:numeric)', 'GET', 'AdminController:edit', ['id']);
    $this->add('/posts/(:numeric)', 'POST', 'AdminController:update', ['id']);
    $this->add('/posts/delete/(:numeric)', 'POST', 'AdminController:delete', ['id']);
  });

  $router->group(['prefix' => 'blog', 'controller' => 'blog'], function () {
    $this->add('/', 'GET', 'BlogController:index');
    $this->add('/(:any)', 'GET', 'BlogController:show', ['slug']);
    $this->add('/categoria/(:any)', 'GET', 'BlogController:postsByCategory', ['slug']);
  });

  $router->group(['prefix' => 'auth', 'controller' => 'auth'], function () {
    $this->add('/login', 'GET', 'AuthController:loginForm');
    $this->add('/login', 'POST', 'AuthController:login');
    $this->add('/register', 'GET', 'AuthController:registerForm');
    $this->add('/register', 'POST', 'AuthController:register');
    $this->add('/logout', 'POST', 'AuthController:logout');
  });

  $router->init();
} catch (\Exception $e) {
  dd($e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine());
}
