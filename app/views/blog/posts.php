<?php

$this->layout('master', ['title' => $title]); ?>

<?php echo flash('user-created', 'flash-message') ?>
<?php echo flash('login-success', 'flash-message') ?>

<!-- <div class="slides-container <?php echo (isset($_GET['search'])) ? 'disabled' : ''  ?>">
  <?php foreach ($mostViewed as $post) { ?>
    <div class="slide" id="slide-1" style="background-image: url('<?php echo $post->imagePath ?? '' ?>')">
      <div class="slide-content">
        <a href="/blog/post/<?php echo $post->slug ?>">
          <h2><?php echo $post->title ?></h2>
        </a>
        <p><?php echo $post->categoryTitle ?></p>
        <p><?php echo formatDate($post->created_at) ?></p>
      </div>
    </div>
  <?php } ?>

  <button class="prev" onclick="moveSlides(-1)">&#10094;</button>
  <button class="next" onclick="moveSlides(1)">&#10095;</button>
</div> -->

<section class="highlighted-posts">
  <div class="container">
    <div class="slider">
      <div class="slider__main">
        <div class="slider__display">
          <img src="/img/posts/672e753bda3e9-post01.jpg" alt="Imagem principal 1" class="slider__image active">
          <div class="slider__content">
            <div class="slider__post-meta">
              <span class="slider__post-date">02, agosto 2023</span>
              <span>|</span>
              <span class="slider__post-category">Extração do Siso</span>
            </div>
            <h2>Tudo o que você precisa saber sobre implantes dentários: Um guia completo</h2>
          </div>
        </div>
        <div class="slider__display">
          <img src="/img/posts/672e73e1b8930-post425.jpg" alt="Imagem principal 2" class="slider__image">
          <div class="slider__content">
            <div class="slider__post-meta">
              <span class="slider__post-date">02, agosto 2023</span>
              <span>|</span>
              <span class="slider__post-category">Extração do Siso</span>
            </div>
            <h2>Tudo o que você precisa saber sobre implantes dentários: Um guia completo</h2>
          </div>
        </div>
        <div class="slider__display">
          <img src="/img/posts/672e76957d760-post32.jpg" alt="Imagem principal 3" class="slider__image">
          <div class="slider__content">
            <div class="slider__post-meta">
              <span class="slider__post-date">02, agosto 2023</span>
              <span>|</span>
              <span class="slider__post-category">Extração do Siso</span>
            </div>
            <h2>Tudo o que você precisa saber sobre implantes dentários: Um guia completo</h2>
          </div>
        </div>
        <div class="slider__display">
          <img src="/img/posts/672e6fac343d2-post43.jpg" alt="Imagem principal 4" class="slider__image">
          <div class="slider__content">
            <div class="slider__post-meta">
              <span class="slider__post-date">02, agosto 2023</span>
              <span>|</span>
              <span class="slider__post-category">Extração do Siso</span>
            </div>
            <h2>Tudo o que você precisa saber sobre implantes dentários: Um guia completo</h2>
          </div>
        </div>
      </div>
      <div class="slider__thumbnails">
        <div class="thumbnail-wrapper">
          <img src="/img/posts/672e753bda3e9-post01.jpg" width="70" height="70" alt="Miniatura 1" class="slider__thumbnail active" data-index="0">
        </div>
        <div class="thumbnail-wrapper">
          <img src="/img/posts/672e73e1b8930-post425.jpg" width="70" height="70" alt="Miniatura 2" class="slider__thumbnail" data-index="1">
        </div>
        <div class="thumbnail-wrapper">
          <img src="/img/posts/672e76957d760-post32.jpg" width="70" height="70" alt="Miniatura 3" class="slider__thumbnail" data-index="2">
        </div>
        <div class="thumbnail-wrapper">
          <img src="/img/posts/672e6fac343d2-post43.jpg" width="70" height="70" alt="Miniatura 4" class="slider__thumbnail" data-index="3">
        </div>
      </div>
    </div>
  </div>
</section>

<section class="blog-section">
  <div class="container">
    <div class="heading">
      <h2>Postagens recentes</h2>
      <form action="" class="form form__search">
        <div class="form__group float-button">
          <input type="search" class="form__input" placeholder="Procurar post">
          <button type="submit"><img src="/img/icons/search.svg" alt=""></button>
        </div>
      </form>
    </div>

    <div class="blog-posts">
      <div class="main-posts">
        <div class="post-list">
          <article class="post-card">
            <img src="/img/posts/672e753bda3e9-post01.jpg" class="post-card__image" alt="Descrição da imagem">
            <div class="post-card__content">
              <div class="post-card__meta">
                <span class="post-card__date">02, agosto 2023</span>
                <span>|</span>
                <span class="post-card__category">Extração do Siso</span>
              </div>
              <h3 class="post-card__title">
                Tudo o que você precisa saber sobre o dente do siso: Mitos e verdades
              </h3>
              <div class="post-card__footer">
                <a href="#" class="post-card__link">Ler mais</a>
                <div class="post-card__comments">
                  <img src="/img/icons/comment.svg" alt=""><span class="number-comments">5</span>
                </div>
              </div>
            </div>
          </article>

          <article class="post-card">
            <img src="/img/posts/672e753bda3e9-post01.jpg" class="post-card__image" alt="Descrição da imagem">
            <div class="post-card__content">
              <div class="post-card__meta">
                <span class="post-card__date">02, agosto 2023</span>
                <span>|</span>
                <span class="post-card__category">Extração do Siso</span>
              </div>
              <h3 class="post-card__title">
                Tudo o que você precisa saber sobre o dente do siso: Mitos e verdades
              </h3>
              <div class="post-card__footer">
                <a href="#" class="post-card__link">Ler mais</a>
                <div class="post-card__comments">
                  <img src="/img/icons/comment.svg" alt=""><span class="number-comments">5</span>
                </div>
              </div>
            </div>
          </article>

          <article class="post-card">
            <img src="/img/posts/672e753bda3e9-post01.jpg" class="post-card__image" alt="Descrição da imagem">
            <div class="post-card__content">
              <div class="post-card__meta">
                <span class="post-card__date">02, agosto 2023</span>
                <span>|</span>
                <span class="post-card__category">Extração do Siso</span>
              </div>
              <h3 class="post-card__title">
                Tudo o que você precisa saber sobre o dente do siso: Mitos e verdades
              </h3>
              <div class="post-card__footer">
                <a href="#" class="post-card__link">Ler mais</a>
                <div class="post-card__comments">
                  <img src="/img/icons/comment.svg" alt=""><span class="number-comments">5</span>
                </div>
              </div>
            </div>
          </article>
        </div>

        <div class="most-acessed">
          <div class="heading">
            <h2>Mais acessados</h2>
          </div>

          <div class="post-list">
            <article class="post-card">
              <img src="/img/posts/672e753bda3e9-post01.jpg" class="post-card__image" alt="Descrição da imagem">
              <div class="post-card__content">
                <div class="post-card__meta">
                  <span class="post-card__date">02, agosto 2023</span>
                  <span>|</span>
                  <span class="post-card__category">Extração do Siso</span>
                </div>
                <h3 class="post-card__title">
                  Tudo o que você precisa saber sobre o dente do siso: Mitos e verdades
                </h3>
                <div class="post-card__footer">
                  <a href="#" class="post-card__link">Ler mais</a>
                  <div class="post-card__comments">
                    <img src="/img/icons/comment.svg" alt=""><span class="number-comments">5</span>
                  </div>
                </div>
              </div>
            </article>

            <article class="post-card">
              <img src="/img/posts/672e753bda3e9-post01.jpg" class="post-card__image" alt="Descrição da imagem">
              <div class="post-card__content">
                <div class="post-card__meta">
                  <span class="post-card__date">02, agosto 2023</span>
                  <span>|</span>
                  <span class="post-card__category">Extração do Siso</span>
                </div>
                <h3 class="post-card__title">
                  Tudo o que você precisa saber sobre o dente do siso: Mitos e verdades
                </h3>
                <div class="post-card__footer">
                  <a href="#" class="post-card__link">Ler mais</a>
                  <div class="post-card__comments">
                    <img src="/img/icons/comment.svg" alt=""><span class="number-comments">5</span>
                  </div>
                </div>
              </div>
            </article>

            <article class="post-card">
              <img src="/img/posts/672e753bda3e9-post01.jpg" class="post-card__image" alt="Descrição da imagem">
              <div class="post-card__content">
                <div class="post-card__meta">
                  <span class="post-card__date">02, agosto 2023</span>
                  <span>|</span>
                  <span class="post-card__category">Extração do Siso</span>
                </div>
                <h3 class="post-card__title">
                  Tudo o que você precisa saber sobre o dente do siso: Mitos e verdades
                </h3>
                <div class="post-card__footer">
                  <a href="#" class="post-card__link">Ler mais</a>
                  <div class="post-card__comments">
                    <img src="/img/icons/comment.svg" alt=""><span class="number-comments">5</span>
                  </div>
                </div>
              </div>
            </article>
          </div>
        </div>
      </div>

      <aside class="side-recommendations">
        <div class="recommended-posts">
          <h3>Posts recomendados</h3>
          <div class="post-list">
            <article class="post-card">
              <img src="/img/posts/672e753bda3e9-post01.jpg" class="post-card__image" alt="Descrição da imagem">
              <div class="post-card__content">
                <div class="post-card__meta">
                  <span class="post-card__date">02, agosto 2023</span>
                  <span>|</span>
                  <span class="post-card__category">Extração do Siso</span>
                </div>
                <h3 class="post-card__title">
                  Tudo o que você precisa saber sobre o dente do siso: Mitos e verdades
                </h3>
              </div>
            </article>
            <article class="post-card">
              <img src="/img/posts/672e753bda3e9-post01.jpg" class="post-card__image" alt="Descrição da imagem">
              <div class="post-card__content">
                <div class="post-card__meta">
                  <span class="post-card__date">02, agosto 2023</span>
                  <span>|</span>
                  <span class="post-card__category">Extração do Siso</span>
                </div>
                <h3 class="post-card__title">
                  Tudo o que você precisa saber sobre o dente do siso: Mitos e verdades
                </h3>
              </div>
            </article>
            <article class="post-card">
              <img src="/img/posts/672e753bda3e9-post01.jpg" class="post-card__image" alt="Descrição da imagem">
              <div class="post-card__content">
                <div class="post-card__meta">
                  <span class="post-card__date">02, agosto 2023</span>
                  <span>|</span>
                  <span class="post-card__category">Extração do Siso</span>
                </div>
                <h3 class="post-card__title">
                  Tudo o que você precisa saber sobre o dente do siso: Mitos e verdades
                </h3>
              </div>
            </article>
          </div>
        </div>
        <div class="popular-categories">
          <h3>Categorias mais acessadas</h3>
          <div class="categories-list">
            <a href="#">Saúde Bucal</a>
            <a href="#">Tratamentos</a>
            <a href="#">Produtos odontológicos</a>
            <a href="#">Estética Dental</a>
            <a href="#">Odontologia Infantil</a>
          </div>
        </div>
      </aside>
    </div>
  </div>
</section>

<!--  
<div class="container">

  <div class="content">
    <aside class="sidebar">
      <h2>Categorias</h2>
      <ul>
        <li><a href="/blog">Todos</a></li>
        <?php foreach ($categories as $category) { ?>
          <li><a href="/blog/categoria/<?php echo $category->slug ?>"><?php echo $category->title ?></a></li>
        <?php } ?>
      </ul>
    </aside>

    <main class="post-list">
      <?php if (!$posts) { ?>
        <p class="post-not-found-message">Post não encontrado.</p>
      <?php } ?>
      <?php foreach ($posts as $post) { ?>
        <div class="post-card">
          <img src="<?php echo $post->imagePath ?>">
          <div class="post-info">
            <span class="category"><?php echo $post->category_title ?></span>
            <a href="/blog/post/<?php echo $post->slug ?>">
              <h3 class="title"><?php echo $post->title ?></h3>
            </a>
            <div class="meta">
              <div>
                <span>Por <?php echo $post->author ?></span> | <span><?php echo formatDate($post->created_at) ?></span>
              </div>
              <span class="comment-count">
                <img src="/img/icons/comment.svg" alt="">
                <?php echo $post->comment_count ?>
              </span>
            </div>
          </div>
        </div>
      <?php } ?>
    </main>
  </div>
</div>
<?php echo $pagination->links() ?>
-->

<?php $this->start('slides') ?>
<script src="/js/slides.js"></script>
<?php $this->stop() ?>

<script>
  const sliderImages = document.querySelectorAll('.slider__display');
  const thumbnails = document.querySelectorAll('.thumbnail-wrapper');
  let currentIndex = 0;
  let interval;

  // Função para exibir a imagem ativa
  function showImage(index) {
    // Remove a classe 'active' de todas as imagens e miniaturas
    sliderImages.forEach(img => img.classList.remove('active'));
    thumbnails.forEach(thumb => thumb.classList.remove('active'));

    // Adiciona a classe 'active' na imagem e miniatura selecionada
    sliderImages[index].classList.add('active');
    thumbnails[index].classList.add('active');
    currentIndex = index;
  }

  // Função para avançar para a próxima imagem
  function nextImage() {
    const nextIndex = (currentIndex + 1) % sliderImages.length;
    showImage(nextIndex);
  }

  // Adiciona evento de clique nas miniaturas
  thumbnails.forEach((thumb, index) => {
    thumb.addEventListener('click', () => {
      showImage(index);
      restartInterval(); // Reinicia o intervalo ao clicar
    });
  });

  // Inicia a troca automática de imagens
  function startInterval() {
    interval = setInterval(nextImage, 4000); // Troca a cada 4 segundos
  }

  // Reinicia o intervalo
  function restartInterval() {
    clearInterval(interval);
    startInterval();
  }

  // Inicializa o slider
  showImage(currentIndex);
  startInterval();
</script>