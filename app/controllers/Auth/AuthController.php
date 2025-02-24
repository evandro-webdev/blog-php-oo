<?php

namespace app\controllers\Auth;

use app\auth\Auth;
use app\support\Flash;
use app\library\Redirect;
use app\support\Validation;
use app\database\models\User;
use app\controllers\Controller;
use app\services\AuthService;
use Exception;

class AuthController extends Controller
{
  public function __construct(
    private Validation $validation,
    private AuthService $authService
  ) {}

  public function loginForm()
  {
    $this->view('auth/login', ['title' => 'Entrar']);
  }

  public function login()
  {
    $validated = $this->validation->validate([
      'email' => 'required|email',
      'password' => 'required'
    ]);

    if (!$validated) {
      Redirect::backWithData();
    }

    try {
      $user = $this->authService->login($validated);
      Auth::login($user);
      Flash::set('login-success', "Bem vindo, $user->name!");

      if ($user->is_admin) {
        Redirect::to('/admin/posts');
      }

      Redirect::to('/blog');
    } catch (Exception $e) {
      Flash::set('login-error', $e->getMessage());
      Redirect::backWithData();
    }
  }

  public function registerForm()
  {
    $this->view('auth/register', ['title' => 'Criar conta']);
  }

  public function register()
  {
    $validated = $this->validation->validate([
      'name' => 'required',
      'email' => 'required|email|unique:' . User::class,
      'password' => 'required|maxLen:16|minLen:6',
      'confirmPassword' => 'required|matches:password'
    ]);

    if (!$validated) {
      Redirect::backWithData();
    }

    try {
      $createdUser = $this->authService->register($validated);

      Auth::login($createdUser);
      Flash::set('user-created', 'Conta criada com sucesso');
      Redirect::to('/blog');
    } catch (Exception $e) {
      Flash::set('register-error', $e->getMessage());
      Redirect::backWithData();
    }
  }

  public function logout()
  {
    Auth::logout();
    Redirect::to('/blog');
  }
}
