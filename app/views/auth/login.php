<?php
$this->layout('master', ['title' => $title]);
$user = (object) ($_SESSION['old_data'] ?? '');
unset($_SESSION['old_data']);
?>

<?php echo flash('info', 'flash-message') ?>
<?php echo flash('too-many-attempts', 'flash-message') ?>

<section class="auth-section">
  <div class="container">
    <h1>Login</h1>
    <form action="/auth/login" method="POST" class="form">
      <div class="form__fields">
        <input type="email" name="email" class="form__input" placeholder="Email" />
        <input type="password" name="password" class="form__input" placeholder="Senha" />
      </div>
      <button class="button">Entrar</button>
    </form>
    <p>
      Não possui uma conta?<br>
      <a href="/auth/register">Clique aqui</a> para se registrar
    </p>
  </div>
</section>


<!-- <div class="form-container">

  <form method="POST" class="form">
    <div class="form-group">
      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" value="<?php echo $user->email ?? '' ?>"
        placeholder="Digite seu e-mail">
      <?php echo flash('email', 'msg msg-failed mt') ?>
    </div>

    <div class="form-group">
      <label for="password">Senha:</label>
      <input type="password" id="password" name="password" value="<?php echo $user->password ?? '' ?>"
        placeholder="Digite sua senha">
      <?php echo flash('password', 'msg msg-failed mt') ?>
      <?php echo flash('login-error', 'msg msg-failed mt mb') ?>
    </div>

    <button type="submit">Entrar</button>
  </form>
</div> -->