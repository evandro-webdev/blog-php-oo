<?php

namespace app\controllers\Auth;

use app\auth\Auth;
use app\library\Request;
use app\support\Flash;
use app\support\Validation;
use app\database\models\User;
use app\controllers\Controller;

class AuthController extends Controller
{
  public function loginForm()
  {
    $this->view('auth/login', ['title' => 'Entrar']);
  }

  public function login()
  {
    $validation = new Validation;
    $validated = $validation->validate([
      'email' => 'required|email',
      'password' => 'required'
    ]);

    if (!$validated) {
      $_SESSION['user_data'] = Request::all();
      header('location: /auth/login');
      return;
    }

    $user = new User;
    $userFound = $user->findBy('email', $validated['email']);

    if (!$userFound) {
      $_SESSION['user_data'] = Request::all();
      Flash::set('login-error', 'Esse email não está cadastrado em nosso site.');
      header('location: /auth/login');
      return;
    }

    if ($validated['password'] !== $userFound->password) {
      Flash::set('login-error', 'Senha incorreta');
      header('location: /auth/login');
      return;
    }

    Auth::login($userFound);
    header('location: /blog');
    return;
  }

  public function registerForm()
  {
    $this->view('auth/register', ['title' => 'Criar conta']);
  }

  public function register()
  {
    $validation = new Validation;
    $validated = $validation->validate([
      'name' => 'required',
      'email' => 'required|email|unique:' . User::class,
      'password' => 'required|maxLen:8|minLen:4',
      'confirmPassword' => 'required|matches:password'
    ]);

    if (!$validated) {
      $_SESSION['user_data'] = Request::all();
      header('location: /auth/register');
      return;
    }

    unset($validated['confirmPassword']);
    $user = new User;
    $user->create($validated);
    Flash::set('user-created', 'Conta criada com sucesso');
    header('location: /blog');
    return;
  }

  public function logout()
  {
    Auth::logout();
    header('location: /blog');
    return;
  }
}
