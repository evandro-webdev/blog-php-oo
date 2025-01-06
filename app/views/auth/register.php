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
        <input type="email" name="name" class="form__input" placeholder="Nome" />
        <input type="email" name="email" class="form__input" placeholder="Email" />
        <input type="password" name="password" class="form__input" placeholder="Senha" />
        <input type="password" name="confirmPassword" class="form__input" placeholder="Confirme a senha" />
      </div>
      <button class="button">Entrar</button>
    </form>
    <p>
      Já possui uma conta?<br>
      <a href="/auth/login">Clique aqui</a> para entrar
    </p>
  </div>
</section>


<!-- <div class="form-container">

  <form action="/auth/register" method="POST" class="form">
    <div class="form-group">
      <label for="name">Nome:</label>
      <input type="text" id="name" name="name" value="<?php echo $user->name ?? '' ?>"
        placeholder="Digite seu nome completo">
      <?php echo flash('name', 'msg msg-failed mt') ?>
    </div>

    <div class="form-group">
      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" value="<?php echo $user->email ?? '' ?>"
        placeholder="Digite seu e-mail">
      <?php echo flash('email', 'msg msg-failed mt') ?>
    </div>

    <div class="form-group">
      <label for="password">Senha:</label>
      <input type="password" id="password" name="password" value="<?php echo $user->password ?? '' ?>"
        placeholder="Digite uma senha">
      <?php echo flash('password', 'msg msg-failed mt') ?>
    </div>

    <div class="form-group">
      <label for="confirmPassword">Confirme a Senha:</label>
      <input type="password" id="confirmPassword" name="confirmPassword"
        value="<?php echo $user->confirmPassword ?? '' ?>" placeholder="Confirme sua senha">
      <?php echo flash('confirmPassword', 'msg msg-failed mt') ?>
      <?php echo flash('register-error', 'msg msg-failed mt') ?>
    </div>

    <button type="submit">Registrar</button>
  </form>

</div> -->