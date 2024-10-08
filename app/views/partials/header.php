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

  <div class="search-bar">
    <input type="text" placeholder="Buscar...">
    <button>Buscar</button>
  </div>

  <div class="auth-buttons">
    <?php if (!isset($_SESSION['auth'])) { ?>
    <a href="/auth/login" class="login-btn">Login</a>
    <a href="/auth/register" class="register-btn">Registro</a>
    <?php } else { ?>
    <form action="/auth/logout" method="POST">
      <button>Sair</button>
    </form>
    <?php } ?>
  </div>
</header>