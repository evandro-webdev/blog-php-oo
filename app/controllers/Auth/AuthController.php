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
    if (Auth::isBlocked()) {
      Flash::set('too-many-attempts', 'Muitas tentativas de acesso, tente novamente mais tarde.');
      return header('location: /auth/login');
    }

    $validated = (new Validation)->validate([
      'email' => 'required|email',
      'password' => 'required'
    ]);

    if (!$validated) {
      return $this->redirectBackWithData('/auth/login');
    }

    $user = (new User)->findBy('email', $validated['email']);

    if (!$user || !password_verify($validated['password'], $user->password)) {
      Auth::trackLoginAttempts();
      Flash::set('login-error', 'Email ou senha incorretos.');
      return $this->redirectBackWithData('/auth/login');
    }

    Auth::login($user);
    Flash::set('login-success', "Bem vindo, $user->name!");

    if ($user->is_admin) {
      return header('location: /admin');
    }

    return header('location: /blog');
  }

  public function registerForm()
  {
    $this->view('auth/register', ['title' => 'Criar conta']);
  }

  public function register()
  {
    $validated = (new Validation)->validate([
      'name' => 'required',
      'email' => 'required|email|unique:' . User::class,
      'password' => 'required|maxLen:16|minLen:6',
      'confirmPassword' => 'required|matches:password'
    ]);

    if (!$validated) {
      return $this->redirectBackWithData('/auth/register');
    }

    unset($validated['confirmPassword']);
    $validated['password'] = password_hash($validated['password'], PASSWORD_DEFAULT);

    $user = new User;
    $user->create($validated);
    $createdUser = $user->findBy('email', $validated['email']);

    if (!$createdUser) {
      Flash::set('register-error', 'Ocorreu um erro ao criar sua conta. Tente novamente.');
      return $this->redirectBackWithData('/auth/register');
    }

    Auth::login($createdUser);
    Flash::set('user-created', 'Conta criada com sucesso');
    return header('location: /blog');
  }

  public function logout()
  {
    Auth::logout();
    return header('location: /blog');
  }

  private function redirectBackWithData($url)
  {
    $_SESSION['user_data'] = Request::all();
    return header("location: $url");
  }
}