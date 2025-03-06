<?php
$this->layout('master', ['title' => $title]);
$userForm = (object) ($_SESSION['old_data'] ?? $user);
?>

<section class="profile-section">
  <div class="container">
    <div class="profile-management">
      <div class="profile">
        <div class="heading">
          <h1>Perfil</h1>
          <h2>Bem vindo, <?= $user->name ?></h2>
        </div>
        <div class="profile__info">
          <div class="profile-pic-container">
            <form action="/blog/atualizar-foto" method="POST" id="profile-pic-form" enctype="multipart/form-data">
              <input type="file" id="profile-pic" name="profile_pic" class="profile__pic-input" onchange="submitForm()">
              <label for="profile-pic" class="profile-pic-label">
                <img src="<?= $user->profile_pic ?? '../img/icons/profile-pic.svg' ?>" width="150" height="150" alt="foto de perfil" class="profile__picture">
              </label>
            </form>
          </div>
          <div class="profile__details">
            <span class="profile__name"><?= $user->name . " " . $user->last_name ?? '' ?></span>
            <span class="profile__email"><?= $user->email ?></span>
            <span class="profile__age">23 anos</span>
          </div>
        </div>
      </div>
      <form action="/blog/atualizar-perfil" method="POST" class="form profile__edit">
        <?= flash('profile-updated', 'msg msg_success') ?>
        <div class="form__fields">
          <div class="form__group">
            <input type="text" class="form__input" name="name" placeholder="Digite seu nome" value="<?= $userForm->name ?? '' ?>">
          </div>
          <div class="form__group">
            <input type="text" class="form__input" name="last_name" placeholder="Digite seu segundo nome" value="<?= $userForm->last_name ?? '' ?>">
          </div>
          <div class="form__group">
            <input type="text" class="form__input" name="email" placeholder="Digite seu email" value="<?= $userForm->email ?? '' ?>">
          </div>
          <div class="form__group">
            <input type="tel" class="form__input" name="phone" placeholder="(XX) 5462-4108" value="<?= $userForm->phone ?? '' ?>">
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
      <a href="/admin/posts" class="button has-icon"><img src="/img/icons/dashboard.svg" width="24" height="24" alt=""><span>Dashboard</span></a>
    </div>
  </div>
</section>

<script>
  function submitForm() {
    document.querySelector('#profile-pic-form').submit();
  }
</script>