<?php

namespace app\controllers\Auth;

use app\support\Flash;
use app\library\Request;
use app\support\Validation;
use app\database\models\User;
use app\controllers\Controller;

class AuthController extends Controller
{
  public function loginForm()
  {
    $this->view('auth/login', ['title' => 'Entrar']);
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
      'email' => 'required|unique:' . User::class,
      'password' => 'required|maxLen:8|minLen:4',
      'confirmPassword' => 'required|matches:password'
    ]);

    if (!$validated) {
      header('location: /auth/register');
    }

    unset($validated['confirmPassword']);
    $user = new User;
    $user->create($validated);
    Flash::set('user-created', 'Conta criada com sucesso');
    header('location: /blog');
  }
}