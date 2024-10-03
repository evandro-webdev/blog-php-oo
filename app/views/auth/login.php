<?php $this->layout('master', ['title' => $title]); ?>

<?php $this->start('temporary-styles') ?>
<link rel="stylesheet" href="/css/temporary-styles.css" />
<?php $this->stop() ?>

<form method="POST" class="form">
  <div class="form-group">
    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" value="<?php echo $email ?? '' ?>" placeholder="Digite seu e-mail">
    <?php echo flash('email', 'msg msg-failed mt') ?>
  </div>

  <div class="form-group">
    <label for="password">Senha:</label>
    <input type="password" id="password" name="password" placeholder="Digite sua senha">
    <?php echo flash('password', 'msg msg-failed mt') ?>
  </div>

  <button type="submit">Entrar</button>
</form>