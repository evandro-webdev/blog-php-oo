<?php $this->layout('master', ['title' => $title]) ?>

<section class="hero" id="inicio">
  <div class="container">
    <div class="hero__text">
      <h1>
        Seu <span>sorriso perfeito</span> começa aqui!
      </h1>
      <p>
        Venha fazer seu agendamento na clínica odontológica mais
        especializada da região, atendimento fácil e rápido, clique abaixo
      </p>

      <div class="button-group">
        <a href="" class="button rounded">Agende agora</a>
        <a href="#depoimentos" class="button outline rounded">Ver depoimentos</a>
      </div>
    </div>

    <picture>
      <source media="(min-width: 75em)" srcset="./img/hero-desktop.webp" width="1015" height="706" />
      <source media="(min-width: 50.625em)" srcset="./img/hero-tablet.webp" width="418" height="553" />
      <img src="./img/hero-mobile.webp" width="360" height="335" alt="paciente feliz no consultório odontológico">
    </picture>
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

    <img src="./img/about.webp" width="470" height="313" alt="mulher dentista sorrindo com paciente criança" />
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
          <img src="./img/icons/enviroment.svg" width="50" height="50" alt="ícone de ambiente agradável" />
          <p>
            Ambiente acolhedor e amigável para que você se sinta em casa
          </p>
        </div>
        <div class="benefit-topic">
          <img src="./img/icons/wellness.svg" width="50" height="50" alt="ícone bem estar" />
          <p>
            Prioridade no conforto e bem-estar do paciente durante todo o
            tratamento
          </p>
        </div>
        <div class="benefit-topic">
          <img src="./img/icons/schedule.svg" width="50" height="50" alt="ícone de fácil agendamento" />
          <p>
            Agendamento online simplificado, economize tempo com apenas
            alguns cliques
          </p>
        </div>
        <div class="benefit-topic">
          <img src="./img/icons/economy.svg" width="50" height="50" alt="ícone de economia" />
          <p>Opções de pagamento flexíveis e acessíveis para todos</p>
        </div>
      </div>
    </div>
    <img src="./img/benefits.webp" width="555" height="732" alt="paciente mulher conversando com a dentista" />
  </div>
</section>

<section id="depoimentos" class="feedback-section">
  <div class="container">
    <div class="heading">
      <img src="./img/icons/quote.svg" width="50" height="50" alt="ícone de aspas" />
      <h3>Depoimentos</h3>
      <h2>O impacto positivo dos nossos cuidados</h2>
    </div>

    <div class="feedbacks">
      <div class="feedback-card">
        <div class="feedback-head">
          <img src="./img/patient01.png" width="50" height="50" alt="foto do paciente João Pedro" />
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
          <img src="./img/patient02.png" width="50" height="50" alt="foto do paciente Leonardo Henrique" />
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
          <img src="./img/patient03.png" width="50" height="50" alt="foto da paciente Márcia Assunção" />
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
    <a href="#" class="button">Entre em contato</a>
  </div>
</div>

<section id="servicos" class="services-section">
  <div class="container">
    <div class="heading">
      <h3>Serviços</h3>
      <h2>Soluções para cada necessidade</h2>
    </div>

    <div class="services">
      <div class="service-card">
        <img src="./img/icons/prevention.svg" width="60" height="60" alt="ícone de agendamento odontológico" />
        <h4>Limpeza e Prevenção</h4>
        <p>Mantenha seu sorriso saudável com cuidados preventivos regulares</p>
      </div>

      <div class="service-card">
        <img src="./img/icons/canal.svg" width="60" height="60" alt="ícone de tratamento de canal" />
        <h4>Tratamento de Canal</h4>
        <p>Solucionamos problemas dentais com precisão e eficiência</p>
      </div>

      <div class="service-card">
        <img src="./img/icons/implant.svg" width="60" height="60" alt="ícone de implante dental" />
        <h4>Implantes Dentários</h4>
        <p>Recupere sua confiança com sorrisos completos e naturais</p>
      </div>

      <div class="service-card">
        <img src="./img/icons/braces.svg" width="60" height="60" alt="ícone de aparelho ortodôntico" />
        <h4>Ortodontia</h4>
        <p>Alinhe seu sorriso com tratamentos ortodônticos modernos e discretos</p>
      </div>

      <div class="service-card">
        <img src="./img/icons/tooth-whitening.svg" width="60" height="60" alt="ícone de clareamento dental" />
        <h4>Clareamento Dental</h4>
        <p>Sorria com confiança através do clareamento dental seguro e eficaz</p>
      </div>

      <div class="service-card">
        <img src="./img/icons/restauration.svg" width="60" height="60" alt="ícone de restaurações estéticas" />
        <h4>Restaurações Estéticas</h4>
        <p>Restaure a beleza natural do seu sorriso com perfeição</p>
      </div>
    </div>

    <a href="#" class="button outline">Saber mais</a>
  </div>
</section>

<section class="home-blog">
  <div class="container">
    <div class="heading">
      <h3>Blog</h3>
      <h2>Não perca nossas postagens recentes</h2>
    </div>

    <div class="blog-posts">
      <div class="post-card">
        <img src="./img/post01.jpg" width="405" height="240" alt="mulher com a mão no lado da boca com dor" />
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
        <img src="./img/post02.jpg" width="405" height="240" alt="mulher feliz com sorriso bonito" />
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
        <img src="./img/post03.jpg" width="405" height="240" alt="crinça sendo atendida no consultório" />
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
</section>

<section id="contato" class="contact-section">
  <div class="container">
    <div class="heading">
      <h3>Contato</h3>
      <h2>Faça seu agendamento ou tire suas dúvidas</h2>
    </div>

    <div class="contact-container">
      <form class="form">
        <div class="form__fields">
          <input type="text" class="form__input" placeholder="Nome completo" />
          <input type="email" class="form__input" placeholder="Email" />
          <input type="tel" class="form__input" placeholder="Telefone" />
          <textarea class="form__textarea" placeholder="Mensagem"></textarea>
        </div>
        <button class="button">Enviar</button>
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

<a target="_blank" href="#" class="whatsapp-link">
  <img src="img/icons/whatsapp-white.svg" alt="icone do whatsapp" />
</a>