<?php

$this->layout('master', ['title' => $title]); ?>

<?php $this->start('temporary-styles') ?>
<link rel="stylesheet" href="/css/temporary-styles.css" />
<?php $this->stop() ?>


<div class="container">
  <div class="user-profile">
    <div class="profile-group">
      <h1 class="profile-title">Perfil de Usuário</h1>
      <div class="profile-info">
        <img src="../img/icons/profile-pic.svg" alt="" class="profile-pic">
        <div class="profile-details">
          <p><strong>Nome:</strong> <?php echo $user->name ?></p>
          <p><strong>Email:</strong> <?php echo $user->email ?></p>
          <p><strong>Data de Registro:</strong> <?php echo formatDate($user->created_at) ?></p>
        </div>
      </div>
    </div>
    <div class="profile-actions">
      <button class="btn-edit">Editar Informações</button>
    </div>

    <?php if (count($postsByUser) > 0) { ?>
      <div class="user-posts">
        <h2 class="posts-title">Posts Cadastrados</h2>
        <ul class="posts-list">
          <?php foreach ($postsByUser as $post) { ?>
            <li class="post-item">
              <a href="/blog/<?php echo $post->slug ?>" class="post-link"><?php echo $post->title ?></a>
              <span class="post-date">Publicado em: <?php echo formatDate($post->created_at) ?></span>
            </li>
          <?php } ?>
        </ul>
      </div>
    <?php } ?>
  </div>
</div>