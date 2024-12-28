<footer class="footer">
  <div class="container">
    <div>
      <a href="#inicio" class="logo"><img src="img/logo.svg" alt="logo da empresa" /></a>
      <ul class="social-links">
        <li>
          <a href="#"><img src="img/icons/facebook.svg" alt="icone do Facebook" /></a>
        </li>
        <li>
          <a href="#"><img src="img/icons/instagram.svg" alt="icone do Instagram" /></a>
        </li>
      </ul>
    </div>

    <div class="footer-nav">
      <div class="nav-col">
        <h3>Navegação</h3>
        <ul>
          <li><a href="#inicio">Início</a></li>
          <li><a href="#">Sobre nós</a></li>
          <li><a href="#">Depoimentos</a></li>
          <li><a href="#">Serviços</a></li>
        </ul>
      </div>

      <div class="nav-col">
        <h3>Contato</h3>
        <ul>
          <li><a href="#">3579-5275</a></li>
          <li><a href="#">Rua Santa Clara, 376, Sorocaba</a></li>
        </ul>
      </div>
    </div>
  </div>

  <p class="copyright">Odontosmile <span id="footer-year"></span>.</p>
</footer>

<script>
  const footerYear = document.querySelector("#footer-year");

  footerYear.innerText = new Date().getFullYear();
</script>