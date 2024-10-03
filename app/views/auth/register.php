<?php $this->layout('master', ['title' => $title]); ?>

<?php $this->start('temporary-styles') ?>
<link rel="stylesheet" href="/css/temporary-styles.css" />
<?php $this->stop() ?>

<form action="/auth/register" method="POST" class="form">
  <div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" id="name" name="name" value="<?php echo $name ?? '' ?>" placeholder="Digite seu nome completo">
    <?php echo flash('name', 'msg msg-failed mt') ?>
  </div>

  <div class="form-group">
    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" value="<?php echo $email ?? '' ?>" placeholder="Digite seu e-mail">
    <?php echo flash('email', 'msg msg-failed mt') ?>
  </div>

  <div class="form-group">
    <label for="password">Senha:</label>
    <input type="password" id="password" name="password" placeholder="Digite uma senha">
    <?php echo flash('password', 'msg msg-failed mt') ?>
  </div>

  <div class="form-group">
    <label for="confirmPassword">Confirme a Senha:</label>
    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirme sua senha">
    <?php echo flash('confirmPassword', 'msg msg-failed mt') ?>
  </div>

  <button type="submit">Registrar</button>
</form>