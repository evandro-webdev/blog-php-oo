<?php $this->layout('master', ['title' => $title]) ?>

<header id="header" class="header">
  <div class="header-container">
    <div class="left-colum">
      <a href="index.html" class="logo">
        <img src="img/logo.svg" alt="logo da odontosmile" />
      </a>

      <input type="checkbox" id="menu-bar" />
      <label for="menu-bar" class="menu-label">
        <img src="img/icons/menu.svg" alt="menu de navegacao" />
      </label>

      <nav class="navbar">
        <ul>
          <li><a href="#">Início</a></li>
          <li><a href="#">Sobre nós</a></li>
          <li><a href="#">Depoimentos</a></li>
          <li><a href="#">Serviços</a></li>
          <li class="mobile-contact-btn"><a href="#contato">Contato</a></li>
        </ul>
      </nav>
    </div>

    <a href="#" class="cta desktop-contact-btn">Entre em contato</a>
  </div>
</header>

<section class="hero-section" id="inicio">
  <div class="hero-container">
    <div class="hero-content">
      <h1 class="hero-title">
        Seu <span>sorriso perfeito</span> começa aqui!
      </h1>
      <p class="hero-desc">
        Venha fazer seu agendamento na clínica odontológica mais
        especializada da região, atendimento fácil e rápido, clique abaixo
      </p>

      <div class="cta-group">
        <a href="" class="cta">Agende agora</a>
        <a href="" class="cta-outline">Ver depoimentos</a>
      </div>
    </div>

    <img class="hero-img-mobile" src="./img/hero-mobile.png" alt="paciente feliz no consultório odontológico" />

    <img class="hero-img-desktop" src="./img/hero-desktop.png" alt="paciente feliz no consultório odontológico"
      class="hero-img" />
  </div>
</section>

<section class="about-section">
  <div class="container">
    <div class="about-information">
      <div class="heading">
        <h3>Sobre nós</h3>
        <h2>Seu bem-estar é nossa prioridade</h2>
      </div>
      <p>
        No nosso consultório odontológico, estamos empenhados em
        proporcionar o melhor atendimento, usando tecnologia avançada e uma
        equipe dedicada de especialistas para garantir a saúde bucal e o
        sorriso radiante que você merece. Sua confiança e conforto são nossa
        prioridade, e estamos aqui para cuidar de você em cada passo da
        jornada odontológica.
      </p>
    </div>

    <img src="./img/about.jpg" alt="mulher dentista sorrindo com paciente criança" />
  </div>
</section>

<section class="benefits-section">
  <div class="container">
    <div class="benefits-information">
      <div class="heading">
        <h3>Vantagens</h3>
        <h2>Por que nos escolher?</h2>
      </div>
      <div class="benefits">
        <div class="benefit-topic">
          <img src="./img/icons/enviroment.svg" alt="ícone de ambiente agradável" />
          <p>
            Ambiente acolhedor e amigável para que você se sinta em casa
          </p>
        </div>
        <div class="benefit-topic">
          <img src="./img/icons/wellness.svg" alt="ícone bem estar" />
          <p>
            Prioridade no conforto e bem-estar do paciente durante todo o
            tratamento
          </p>
        </div>
        <div class="benefit-topic">
          <img src="./img/icons/schedule.svg" alt="ícone de fácil agendamento" />
          <p>
            Agendamento online simplificado, economize tempo com apenas
            alguns cliques
          </p>
        </div>
        <div class="benefit-topic">
          <img src="./img/icons/economy.svg" alt="ícone de economia" />
          <p>Opções de pagamento flexíveis e acessíveis para todos</p>
        </div>
      </div>
    </div>
    <img src="./img/benefits.jpg" alt="paciente mulher conversando com a dentista" />
  </div>
</section>

<section class="feedback-section">
  <div class="container">
    <div class="heading">
      <img src="./img/icons/quote.svg" alt="ícone de aspas" />
      <h3>Depoimentos</h3>
      <h2>O impacto positivo dos nossos cuidados</h2>
    </div>

    <div class="feedbacks">
      <div class="feedback-card">
        <div class="feedback-head">
          <img src="./img/patient01.png" alt="foto do paciente João Pedro" />
          <h4>João Pedro</h4>
        </div>
        <p>
          Meu medo de dentista desapareceu depois que visitei esse
          consultório. Recomendo a todos, excelentes profissionais e
          ambiente acolhedor!
        </p>
      </div>

      <div class="feedback-card">
        <div class="feedback-head">
          <img src="./img/patient02.png" alt="foto do paciente Leonardo Henrique" />
          <h4>Leonardo Henrique</h4>
        </div>
        <p>
          Precisava remover um dente que estava me causando uma dor
          insuportavel e me deram a confiança que precisava, deu tudo certo,
          são profissionais qualificados.
        </p>
      </div>

      <div class="feedback-card">
        <div class="feedback-head">
          <img src="./img/patient03.png" alt="foto da paciente Márcia Assunção" />
          <h4>Márcia Assunção</h4>
        </div>
        <p>
          Atendimento perfeito, foi muito fácil para agendar um horário e
          também foram muito atenciosos, minha dor de dente foi curada com
          um procedimento muito tranquilo.
        </p>
      </div>
    </div>
  </div>
</section>

<div class="cta-section">
  <div class="container">
    <div class="heading">
      <h2>Vai fazer uma consulta?</h2>
      <p>Faça seu agendamento ou tire suas dúvidas</p>
    </div>
    <a href="#" class="cta">Entre em contato</a>
  </div>
</div>

<section class="services-section">
  <div class="container">
    <div class="heading">
      <h3>Serviços</h3>
      <h2>Soluções para cada necessidade</h2>
    </div>

    <div class="services">
      <div class="service-card">
        <img src="./img/icons/prevention.svg" alt="ícone de agendamento
            odontológico" />
        <div class="service-info">
          <h4>Limpeza e Prevenção</h4>
          <p>
            Mantenha seu sorriso saudável com cuidados preventivos regulares
          </p>
        </div>
      </div>

      <div class="service-card">
        <img src="./img/icons/canal.svg" alt="ícone de tratamento de canal" />
        <div class="service-info">
          <h4>Tratamento de Canal</h4>
          <p>Solucionamos problemas dentais com precisão e eficiência</p>
        </div>
      </div>

      <div class="service-card">
        <img src="./img/icons/implant.svg" alt="ícone de implante dental" />
        <div class="service-info">
          <h4>Implantes Dentários</h4>
          <p>Recupere sua confiança com sorrisos completos e naturais</p>
        </div>
      </div>

      <div class="service-card">
        <img src="./img/icons/braces.svg" alt="ícone de aparelho ortodôntico" />
        <div class="service-info">
          <h4>Ortodontia</h4>
          <p>
            Alinhe seu sorriso com tratamentos ortodônticos modernos e
            discretos
          </p>
        </div>
      </div>

      <div class="service-card">
        <img src="./img/icons/tooth-whitening.svg" alt="ícone de clareamento dental" />
        <div class="service-info">
          <h4>Clareamento Dental</h4>
          <p>
            Sorria com confiança através do clareamento dental seguro e
            eficaz
          </p>
        </div>
      </div>

      <div class="service-card">
        <img src="./img/icons/restauration.svg" alt="ícone de restaurações estéticas" />
        <div class="service-info">
          <h4>Restaurações Estéticas</h4>
          <p>Restaure a beleza natural do seu sorriso com perfeição</p>
        </div>
      </div>
    </div>

    <a href="#" class="cta-outline">Saber mais</a>
  </div>
</section>

<section class="blog-section">
  <div class="container">
    <div class="heading">
      <h3>Blog</h3>
      <h2>Não perca nossas postagens recentes</h2>
    </div>

    <div class="inner-container">
      <div class="blog-posts">
        <div class="post-card">
          <img src="./img/post01.jpg" alt="mulher com a mão no lado da boca com dor" />
          <div class="post-content">
            <div class="post-head">
              <span>02, agosto 2023</span>
              <hr />
              <span>Extração do Siso</span>
            </div>
            <h3 title="Tudo o que você precisa saber sobre o dente do siso: Mitos e verdades" class="post-tile">
              Tudo o que você precisa saber sobre o dente do siso: Mitos e
              verdades
            </h3>
            <a href="#">Ler mais</a>
          </div>
        </div>

        <div class="post-card">
          <img src="./img/post02.jpg" alt="mulher feliz com sorriso bonito" />
          <div class="post-content">
            <div class="post-head">
              <span>02, agosto 2023</span>
              <hr />
              <span>Extração do Siso</span>
            </div>
            <h3 title="Um sorriso saudável é um sorriso feliz: Dicas de cuidados odontológicos" class="post-tile">
              Um sorriso saudável é um sorriso feliz: Dicas de cuidados
              odontológicos
            </h3>
            <a href="#">Ler mais</a>
          </div>
        </div>

        <div class="post-card">
          <img src="./img/post03.jpg" alt="crinça sendo atendida no consultório" />
          <div class="post-content">
            <div class="post-head">
              <span>02, agosto 2023</span>
              <hr />
              <span>Extração do Siso</span>
            </div>
            <h3 title="Odontologia para crianças: Como tornar a visita ao dentista divertida e sem medo"
              class="post-tile">
              Odontologia para crianças: Como tornar a visita ao dentista
              divertida e sem medo
            </h3>
            <a href="#">Ler mais</a>
          </div>
        </div>
      </div>

      <a href="#" class="see-more">
        <span>Ver todos</span>
        <img src="./img/icons/arrow.svg" alt="seta pra direita" />
      </a>
    </div>
  </div>
</section>

<section class="contact-section">
  <div class="container">
    <div class="heading">
      <h3>Contato</h3>
      <h2>Faça seu agendamento ou tire suas dúvidas</h2>
    </div>

    <div class="contact-methods">
      <form class="form">
        <input type="text" placeholder="Nome completo" />
        <input type="email" placeholder="Email" />
        <input type="tel" placeholder="Telefone" />
        <textarea placeholder="Mensagem"></textarea>
        <button class="cta">Enviar</button>
      </form>
      <img src="./img/map.jpg" alt="mapa da localização da Odontosmile" />
    </div>

    <div class="other-contacts">
      <a class="contact">
        <img src="./img/icons/whatsapp.svg" alt="ícone do whatsapp" />
        <span>Whatsapp</span>
      </a>

      <a class="contact">
        <img src="./img/icons/email.svg" alt="ícone de email" />
        <span>odontosmile@contato.com</span>
      </a>
    </div>
  </div>
</section>

<footer class="footer">
  <div class="footer-links">
    <div class="nav-col">
      <a href="#inicio" class="logo-footer"><img src="img/logo.svg" alt="logo da empresa" /></a>
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

<a target="_blank" href="#" class="whatsapp-link">
  <img src="img/icons/whatsapp-white.svg" alt="icone do whatsapp" />
</a>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init((duration = 3000));
</script>

<script>
  const footerYear = document.querySelector("#footer-year");

  footerYear.innerText = new Date().getFullYear();
</script>

<script>
  let lastScrollTop = 0;
  const header = document.getElementById("header");
  const menuBtn = document.getElementById("menu-bar");

  window.addEventListener("scroll", function() {
    let scrollTop =
      window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > lastScrollTop) {
      menuBtn.checked = false;
      header.classList.add("hidden");
      if (scrollTop > 0) {
        header.classList.add("header-white-bg");
      }
    } else {
      header.classList.remove("hidden");
      if (scrollTop === 0) {
        header.classList.remove("header-white-bg");
      }
    }

    lastScrollTop = scrollTop;
  });
</script>