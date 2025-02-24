<?php

namespace app\services;

use app\auth\Auth;
use app\database\models\User;
use Exception;

class AuthService
{
  public function __construct(private User $user) {}

  public function login($data)
  {
    if (Auth::isBlocked()) {
      throw new Exception("Muitas tentativas de acesso, tente novamente mais tarde.");
    }

    $user = $this->user->findBy('email', $data['email']);

    if (!$user || !password_verify($data['password'], $user->password)) {
      Auth::trackLoginAttempts();
      throw new Exception("Email ou senha incorretos.");
    }

    unset($user->password, $user->email);

    return $user;
  }

  public function register($data)
  {
    unset($data['confirmPassword']);
    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

    $this->user->create($data);
    $createdUser = $this->user->findBy('email', $data['email']);

    if (!$createdUser) {
      throw new Exception("Ocorreu um erro ao criar sua conta. Tente novamente.");
    }

    return $createdUser;
  }
}
