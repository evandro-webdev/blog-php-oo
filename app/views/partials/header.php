<header class="blog-header">
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
    <a href="/blog/perfil"><img src="../img/icons/profile.svg" alt=""> Perfil</a>
    <form action="/auth/logout" method="POST">
      <button>Sair</button>
    </form>
    <?php } ?>
  </div>
</header>