<?php
$this->layout('master', ['title' => $title]);
$user = (object) ($_SESSION['old_data'] ?? '');
unset($_SESSION['old_data']);
?>

<section class="auth-section">
  <div class="container">
    <?php echo flash('info', 'flash-message') ?>
    <?php echo flash('too-many-attempts', 'flash-message') ?>
    <h1>Login</h1>
    <form action="/auth/login" method="POST" class="form">
      <div class="form__fields">
        <div class="form__group">
          <input type="email" name="email" class="form__input" value="<?php echo $user->email ?? '' ?>" placeholder="Email" />
          <?php echo flash('email', 'msg msg_failed mt') ?>
        </div>
        <div class="form__group">
          <input type="password" name="password" class="form__input" value="<?php echo $user->password ?? '' ?>" placeholder="Senha" />
          <?php echo flash('password', 'msg msg-failed mt') ?>
          <?php echo flash('login-error', 'msg msg_failed mt') ?>
        </div>
      </div>
      <button class="button">Entrar</button>
    </form>
    <p>
      Não possui uma conta?<br>
      <a href="/auth/register">Clique aqui</a> para se registrar
    </p>
  </div>
</section>