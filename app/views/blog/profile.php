<?php
$this->layout('master', ['title' => $title]);
$userForm = (object) ($_SESSION['old_data'] ?? $user);
?>

<?php $this->start('temporary-styles') ?>
<link rel="stylesheet" href="/css/temporary-styles.css" />
<?php $this->stop() ?>

<section class="profile-section">
  <div class="container">
    <div class="profile-management">
      <div class="profile">
        <div class="heading">
          <h1>Perfil</h1>
          <h2>Bem vindo, <?php echo $user->name ?></h2>
        </div>
        <div class="profile__info">
          <img src="<?php echo $user->profile_pic ?? '../img/icons/profile-pic.svg' ?>" width="150" height="150" alt="" class="profile__picture">
          <div class="profile__details">
            <span class="profile__name"><?php echo $user->name . " " . $user->last_name ?? '' ?></span>
            <span class="profile__email"><?php echo $user->email ?></span>
            <span class="profile__age">23 anos</span>
          </div>
        </div>
      </div>
      <form action="" class="form profile__edit">
        <div class="form__fields">
          <div class="form__group">
            <input type="text" class="form__input" placeholder="Digite seu nome" value="<?php echo $userForm->name ?? '' ?>">
          </div>
          <div class="form__group">
            <input type="text" class="form__input" placeholder="Digite seu segundo nome" value="<?php echo $userForm->last_name ?? '' ?>">
          </div>
          <div class="form__group">
            <input type="text" class="form__input" placeholder="Digite seu email" value="<?php echo $userForm->email ?? '' ?>">
          </div>
          <div class="form__group">
            <input type="tel" class="form__input" placeholder="(XX) 5462-4108">
          </div>
        </div>
        <button class="button">Salvar alterações</button>
      </form>
    </div>

    <div class="card">
      <h3>Posts mais vistos</h3>
      <ul class="card__list">
        <li class="posts-titles">Tudo o que você precisa saber sobre o dente do siso: Mitos e verdades</li>
        <li class="posts-titles">Tudo o que você precisa saber sobre o dente do siso: Mitos e verdades</li>
        <li class="posts-titles">Tudo o que você precisa saber sobre o dente do siso: Mitos e verdades</li>
        <li class="posts-titles">Tudo o que você precisa saber sobre o dente do siso: Mitos e verdades</li>
        <li class="posts-titles">Tudo o que você precisa saber sobre o dente do siso: Mitos e verdades</li>
      </ul>
    </div>

    <div class="card">
      <h3>Posts recentes</h3>
      <ul class="card__list">
        <li class="posts-titles">Tudo o que você precisa saber sobre o dente do siso: Mitos e verdades</li>
        <li class="posts-titles">Tudo o que você precisa saber sobre o dente do siso: Mitos e verdades</li>
        <li class="posts-titles">Tudo o que você precisa saber sobre o dente do siso: Mitos e verdades</li>
        <li class="posts-titles">Tudo o que você precisa saber sobre o dente do siso: Mitos e verdades</li>
        <li class="posts-titles">Tudo o que você precisa saber sobre o dente do siso: Mitos e verdades</li>
      </ul>
    </div>

    <div class="card">
      <h3>Estatisticas gerais</h3>
      <ul class="card__list has-icon">
        <li><img src="/img/icons/posts.svg" alt=""><span>20 publicações</span></li>
        <li><img src="/img/icons/views.svg" alt=""><span>4300 cliques</span></li>
        <li><img src="/img/icons/comments-blue.svg" alt=""><span>60 comentarios</span></li>
        <li><img src="/img/icons/share.svg" alt=""><span>25 compartilhamentos</span></li>
      </ul>
      <a href="/admin" class="button has-icon"><img src="/img/icons/dashboard.svg" width="24" height="24" alt=""><span>Dashboard</span></a>
    </div>
  </div>
</section>

<!--
<div class="profile-container">
  <div class="user-profile">
    <div class="profile-group">
      <?php echo flash('profile-updated', 'msg msg-success mb') ?>
      <h1 class="profile-title">Perfil de Usuário</h1>
      <div class="profile-info">
        <div class="profile-pic-container">
          <img src="<?php echo $user->profile_pic ?? '../img/icons/profile-pic.svg' ?>" alt="foto de perfil" class="profile-pic">

          <form action="/blog/atualizar-foto" method="POST" id="profile-pic-form" enctype="multipart/form-data">
            <input type="file" id="profile-pic" name="profile_pic" class="profile-pic-input" onchange="submitForm()">
            <label for="profile-pic" class="profile-pic-label"><img src="../img/icons/camera.svg"> Trocar</label>
          </form>

        </div>
        <div class="profile-details">
          <p><strong>Nome:</strong> <?php echo $user->name . " " . $user->last_name ?? '' ?></p>
          <p><strong>Email:</strong> <?php echo $user->email ?></p>
          <p><strong>Data de Registro:</strong> <?php echo formatDate($user->created_at) ?? '' ?></p>
        </div>
      </div>
    </div>
    <div class="profile-actions">
      <button class="btn-edit" id="toggle-form" type="submit">Editar Informações</button>
    </div>

    <form action="/blog/atualizar-perfil" method="POST" class="user-edit-form" id="user-edit-form">
      <div class="form-group">
        <label for="name">Nome:</label>
        <input
          type="text"
          id="name"
          name="name"
          value="<?php echo $userForm->name ?? '' ?>"
          placeholder="Digite seu nome">
        <?php echo flash('name', 'msg msg-failed mt') ?>
      </div>

      <div class="form-group">
        <label for="name">Sobrenome:</label>
        <input
          type="text"
          id="last_name"
          name="last_name"
          value="<?php echo $userForm->last_name ?? '' ?>"
          placeholder="Digite seu sobrenome">
        <?php echo flash('last_name', 'msg msg-failed mt') ?>
      </div>

      <button type="submit" class="btn-submit">Salvar Alterações</button>
    </form>
  </div>

  <?php if (count($postsByUser) > 0) { ?>
    <div class="user-posts">
      <h2 class="posts-title">Seus posts Cadastrados</h2>
      <ul class="posts-list">
        <?php foreach ($postsByUser as $post) { ?>
          <li class="post-item">
            <a href="/blog/post/<?php echo $post->slug ?>" class="post-link"><?php echo $post->title ?></a>
            <span class="post-date">Publicado em: <?php echo formatDate($post->created_at) ?></span>
          </li>
        <?php } ?>
      </ul>
    </div>
  <?php } ?>
</div>
-->

<script>
  const userEditForm = document.querySelector('#user-edit-form');
  const toggleForm = document.querySelector('#toggle-form');

  <?php if (!empty($_SESSION['old_data'])) { ?>
    userEditForm.classList.add('active');
    unset($_SESSION['old_data']);
  <?php } ?>

  toggleForm.addEventListener('click', e => {
    userEditForm.classList.toggle('active');
  })

  function submitForm() {
    document.querySelector('#profile-pic-form').submit();
  }
</script>