<?php

$this->layout('master', ['title' => $title]);
$user = (object) ($_SESSION['old_data'] ?? '');
unset($_SESSION['old_data']);

?>

<section class="auth-section">
  <div class="container">
    <h1>Criar conta</h1>
    <form action="/auth/register" method="POST" class="form">
      <div class="form__fields">
        <div class="form__group">
          <input type="text" name="name" class="form__input" value="<?= $user->name ?? '' ?>" placeholder="Nome" />
          <?= flash('name', 'msg msg_failed mt') ?>
        </div>
        <div class="form__group">
          <input type="email" name="email" class="form__input" value="<?= $user->email ?? '' ?>" placeholder="Email" />
          <?= flash('email', 'msg msg_failed mt') ?>
        </div>
        <div class="form__group">
          <input type="password" name="password" class="form__input" value="<?= $user->password ?? '' ?>" placeholder="Senha" />
          <?= flash('password', 'msg msg_failed mt') ?>
        </div>
        <div class="form__group">
          <input type="password" name="confirmPassword" class="form__input" value="<?= $user->confirmPassword ?? '' ?>" placeholder="Confirme a senha" />
          <?= flash('confirmPassword', 'msg msg_failed mt') ?>
          <?= flash('register-error', 'msg msg-failed mt') ?>
        </div>
      </div>
      <button class="button">Entrar</button>
    </form>
    <p>
      Já possui uma conta?<br>
      <a href="/auth/login">Clique aqui</a> para entrar
    </p>
  </div>
</section>