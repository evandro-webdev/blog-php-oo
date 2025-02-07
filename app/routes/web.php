<?php

try {
  $router->add('/', 'GET', 'HomeController:index');

  $router->group(['prefix' => 'admin', 'controller' => 'admin', 'middlewares' => ['admin']], function () {
    $this->add('/posts', 'GET', 'AdminController:index');
    $this->add('/posts/autor/(:numeric)', 'GET', 'AdminController:index', ['userId']);
    $this->add('?search=(:any)', 'GET', 'AdminController:index');
    $this->add('/posts/create', 'GET', 'AdminController:create');
    $this->add('/posts', 'POST', 'AdminController:store');
    $this->add('/posts/edit/(:numeric)', 'GET', 'AdminController:edit', ['id']);
    $this->add('/posts/(:numeric)', 'POST', 'AdminController:update', ['id']);
    $this->add('/posts/delete/(:numeric)', 'POST', 'AdminController:delete', ['id']);
  });

  $router->group(['prefix' => 'blog', 'controller' => 'blog'], function () {
    $this->add('/', 'GET', 'BlogController:index');
    $this->add('/categoria/(:any)', 'GET', 'BlogController:index', ['slug']);
    $this->add('?search=(:any)', 'GET', 'BlogController:index');
    $this->add('/post/(:any)', 'GET', 'BlogController:show', ['slug']);
    $this->add('/comment', 'POST', 'CommentController:create');
    $this->add('/comment/delete/(:numeric)', 'POST', 'CommentController:delete', ['id']);
  });

  $router->group(['prefix' => 'blog', 'controller' => 'blog', 'middlewares' => ['auth']], function () {
    $this->add('/perfil', 'GET', 'UserController:profile');
    $this->add('/atualizar-perfil', 'POST', 'UserController:updateProfile');
    $this->add('/atualizar-foto', 'POST', 'UserController:updateProfilePic');
  });

  $router->group(['prefix' => 'auth', 'controller' => 'auth', 'middlewares' => ['guest']], function () {
    $this->add('/login', 'GET', 'AuthController:loginForm');
    $this->add('/login', 'POST', 'AuthController:login');
    $this->add('/register', 'GET', 'AuthController:registerForm');
    $this->add('/register', 'POST', 'AuthController:register');
    $this->add('/logout', 'POST', 'AuthController:logout')->middleware(['auth']);
  });

  $router->init();
} catch (\Exception $e) {
  dd($e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine());
}
