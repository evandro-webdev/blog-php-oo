<?php
$this->layout('master', ['title' => $title]);
$user = (object) ($_SESSION['old_data'] ?? '');
unset($_SESSION['old_data']);
?>

<?php $this->start('temporary-styles') ?>
<link rel="stylesheet" href="/css/temporary-styles.css" />
<?php $this->stop() ?>

<?php echo flash('info', 'flash-message') ?>
<?php echo flash('too-many-attempts', 'flash-message') ?>

<div class="form-container">

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
</div>