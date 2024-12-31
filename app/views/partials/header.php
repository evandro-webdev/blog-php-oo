<!-- <header class="blog-header">
  <div class="logo">
    <a href="/blog">Meu Blog</a>
  </div>

  <nav>
    <a href="/">Institucional</a>
    <a href="/most-read">Mais Lidos</a>
    <a href="/categories">Categorias</a>
    <a href="/contact">Contato</a>
    <?php if (isset($_SESSION['auth']) && $_SESSION['auth']->is_admin) { ?>
      <a href="/admin">Dashboard</a>
    <?php } ?>
  </nav>

  <form action="/blog" method="GET" class="search-bar">
    <input type="text" name="search" placeholder="Buscar...">
    <button>Buscar</button>
  </form>

  <div class="auth-buttons">
    <?php if (!isset($_SESSION['auth'])) { ?>
      <a href="/auth/login" class="login-btn">Login</a>
      <a href="/auth/register" class="register-btn">Registro</a>
    <?php } else { ?>
      <a href="/blog/perfil"><img src="/img/icons/profile.svg" alt=""> Perfil</a>
      <form action="/auth/logout" method="POST">
        <button>Sair</button>
      </form>
    <?php } ?>
  </div>
</header> -->

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
          <li><a href="/admin">Dashboard</a></li>
          <li><a href="#">Sobre nós</a></li>
          <li><a href="#">Depoimentos</a></li>
          <li><a href="#">Serviços</a></li>
          <li><a href="#contato">Contato</a></li>
        </ul>
        <div class="social-links">
          <a href="#"><img src="/img/icons/facebook-white.svg" width="32" height="32" alt="icone do facebook"></a>
          <a href="#"><img src="/img/icons/instagram-white.svg" width="32" height="32" alt="icone do instagram"></a>
        </div>
      </nav>
    </div>

    <a href="#" class="button desktop__button">Entre em contato</a>
  </div>
</header>