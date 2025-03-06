<?php
$isAuthenticated = isset($_SESSION['auth']);
$auth = $_SESSION['auth'] ?? null;
?>

<header id="header" class="header">
  <div class="container">
    <div class="left-colum">
      <a href="/" class="logo">
        <img src="/img/logo.svg" alt="logo da odontosmile" />
      </a>

      <input type="checkbox" id="menu-bar" />
      <label for="menu-bar" class="menu-label">
        <img src="/img/icons/menu.svg" alt="menu de navegacao" />
      </label>

      <nav class="navbar">
        <ul>
          <li><a href="/blog">Blog</a></li>
          <li><a href="#servicos">Serviços</a></li>
          <li><a href="/#contato">Contato</a></li>
        </ul>
        <div class="social-links">
          <a href="#"><img src="/img/icons/facebook-white.svg" width="32" height="32" alt="icone do facebook"></a>
          <a href="#"><img src="/img/icons/instagram-white.svg" width="32" height="32" alt="icone do instagram"></a>
        </div>
      </nav>
    </div>

    <div class="auth-buttons">
      <?php if (!$isAuthenticated) { ?>
        <a href="/auth/login" class="button rounded">Login</a>
        <a href="/auth/register" class="button outline rounded">Registro</a>
      <?php } else { ?>
        <button class="profile-button"><img src="/img/icons/profile-placeholder.svg" width="53" height="53" alt="icone de perfil"></button>

        <div class="profile-menu">
          <div class="profile-menu__head">
            <img src="<?= $auth->profile_pic ?? '/img/icons/profile-pic.svg' ?>" width="40" height="40" alt="foto de perfil">
            <h4><?= $auth->name . " " . $auth->last_name ?></h4>
          </div>
          <ul class="profile-menu__links">
            <li><a href="/blog/perfil"><img src="/img/icons/profile-outline.svg" alt="icone de perfil"> Perfil</a></li>
            <?php if ($isAuthenticated && $auth->is_admin) { ?>
              <li><a href="/admin/posts"><img src="/img/icons/dashboard-blue.svg" alt="icone de gerenciamento"> Dashboard</a></li>
            <?php } ?>
            <li>
              <form action="/auth/logout" method="POST"><button type="submit"><img src="/img/icons/logout.svg" alt="icone de saída">Sair</button></form>
            </li>
          </ul>
        </div>
      <?php } ?>
    </div>
  </div>
</header>