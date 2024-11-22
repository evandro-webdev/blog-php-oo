<?php

$this->layout('master', ['title' => $title]); ?>

<?php $this->start('temporary-styles') ?>
<link rel="stylesheet" href="/css/temporary-styles.css" />
<?php $this->stop() ?>

<form action="/user/update" method="POST" class="user-edit-form">
  <div class="form-group">
    <label for="name">Nome:</label>
    <input
      type="text"
      id="name"
      name="name"
      value="<?php echo $user->name ?? '' ?>"
      placeholder="Digite seu nome">
    <?php echo flash('name', 'msg msg-failed mt') ?>
  </div>

  <div class="form-group">
    <label for="email">Email:</label>
    <input
      type="email"
      id="email"
      name="email"
      value="<?php echo $user->email ?? '' ?>"
      placeholder="Digite seu email">
    <?php echo flash('email', 'msg msg-failed mt') ?>
  </div>

  <div class="form-group">
    <label for="password">Senha:</label>
    <input
      type="password"
      id="password"
      name="password"
      placeholder="Digite uma nova senha (opcional)">
    <?php echo flash('password', 'msg msg-failed mt') ?>
  </div>

  <div class="form-group">
    <label for="password_confirmation">Confirme a Senha:</label>
    <input
      type="password"
      id="password_confirmation"
      name="password_confirmation"
      placeholder="Confirme a nova senha">
    <?php echo flash('password_confirmation', 'msg msg-failed mt') ?>
  </div>

  <div class="form-group">
    <button type="submit" class="btn-submit">Salvar Alterações</button>
  </div>
</form>