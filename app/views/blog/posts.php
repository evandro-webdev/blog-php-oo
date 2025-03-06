<?php

$this->layout('master', ['title' => $title]); ?>

<?= flash('user-created', 'flash-message') ?>
<?= flash('login-success', 'flash-message') ?>

<section class="highlighted-posts <?= $isSearch ? 'disabled' : ''  ?>">
  <div class="container">
    <div class="slider">
      <div class="slider__main">
        <?php foreach ($featured as $post) { ?>
          <div class="slider__display">
            <img src="<?= $post->imagePath ?? '' ?>" alt="Imagem principal 1" class="slider__image active">
            <div class="slider__content">
              <div class="slider__post-meta">
                <span class="slider__post-date"><?= formatDate($post->created_at) ?></span>
                <span>|</span>
                <span class="slider__post-category"><?= $post->categoryTitle ?></span>
              </div>
              <h2><a href="/blog/post/<?= $post->slug ?>"><?= $post->title ?></a></h2>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="slider__thumbnails">
        <?php foreach ($featured as $post) { ?>
          <div class="thumbnail-wrapper">
            <img src="<?= $post->imagePath ?? '' ?>" width="70" height="70" alt="" class="slider__thumbnail active" data-index="0">
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>

<section class="blog-section">
  <div class="container">
    <div class="heading">
      <h2>Postagens recentes</h2>
      <form action="/blog" method="GET" class="form form__search">
        <div class="form__group float-button">
          <input type="search" name="search" class="form__input" placeholder="Procurar post">
          <button type="submit"><img src="/img/icons/search.svg" width="20" height="20" alt=""></button>
        </div>
      </form>
    </div>

    <div class="blog-posts">
      <div class="main-posts">
        <div class="post-list">
          <?php foreach ($posts as $post) { ?>
            <article class="post-card">
              <img src="<?= $post->imagePath ?? '' ?>" class="post-card__image" width="270" height="160" alt="Descrição da imagem">
              <div class="post-card__content">
                <div class="post-card__meta">
                  <span class="post-card__date"><?= formatDate($post->created_at) ?></span>
                  <span>|</span>
                  <span class="post-card__category"><?= $post->categoryTitle ?></span>
                </div>
                <h3 class="post-card__title"><?= $post->title ?></h3>
                <div class="post-card__footer">
                  <a href="/blog/post/<?= $post->slug ?>" class="post-card__link">Ler mais</a>
                  <div class="post-card__comments">
                    <img src="/img/icons/comment.svg" alt=""><span class="number-comments">5</span>
                  </div>
                </div>
              </div>
            </article>
          <?php } ?>
          <?= $pagination ? $pagination->links() : '' ?>
        </div>

        <div class="most-acessed <?= $isSearch ? 'disabled' : ''  ?>">
          <div class="heading">
            <h2>Mais acessados</h2>
          </div>

          <div class="post-list">
            <?php foreach ($mostViewed as $post) { ?>
              <article class="post-card">
                <img src="<?= $post->imagePath ?? '' ?>" class="post-card__image" alt="Descrição da imagem">
                <div class="post-card__content">
                  <div class="post-card__meta">
                    <span class="post-card__date"><?= formatDate($post->created_at) ?></span>
                    <span>|</span>
                    <span class="post-card__category"><?= $post->categoryTitle ?></span>
                  </div>
                  <h3 class="post-card__title"><?= $post->title ?></h3>
                  <div class="post-card__footer">
                    <a href="/blog/post/<?= $post->slug ?>" class="post-card__link">Ler mais</a>
                    <div class="post-card__comments">
                      <img src="/img/icons/comment.svg" alt=""><span class="number-comments">5</span>
                    </div>
                  </div>
                </div>
              </article>
            <?php } ?>
          </div>
        </div>
      </div>

      <aside class="side-recommendations <?= $isSearch ? 'disabled' : ''  ?>">
        <div class="recommended-posts">
          <h3>Posts recomendados</h3>
          <div class="post-list">
            <?php foreach ($mostViewed as $post) { ?>
              <article class="post-card">
                <img src="<?= $post->imagePath ?? '' ?>" class="post-card__image" alt="Descrição da imagem">
                <div class="post-card__content">
                  <div class="post-card__meta">
                    <span class="post-card__date"><?= formatDate($post->created_at) ?></span>
                    <span>|</span>
                    <span class="post-card__category"><?= $post->categoryTitle ?></span>
                  </div>
                  <h3 class="post-card__title"><a href="/blog/post/<?= $post->slug ?>"><?= $post->title ?></a></h3>
                </div>
              </article>
            <?php } ?>
          </div>
        </div>
        <div class="popular-categories">
          <h3>Categorias mais acessadas</h3>
          <div class="categories-list">
            <?php foreach ($mostViewed as $post) { ?>
              <a href="/blog/categoria/<?= $post->categorySlug ?>"><?= $post->categoryTitle ?></a>
            <?php } ?>
          </div>
        </div>
      </aside>
    </div>
  </div>
</section>

<?php $this->start('slides') ?>
<script src="/js/slides.js"></script>
<?php $this->stop() ?>

<script>
  const sliderImages = document.querySelectorAll('.slider__display');
  const thumbnails = document.querySelectorAll('.thumbnail-wrapper');
  let currentIndex = 0;
  let interval;

  function showImage(index) {
    // Remove a classe 'active' de todas as imagens e miniaturas
    sliderImages.forEach(img => img.classList.remove('active'));
    thumbnails.forEach(thumb => thumb.classList.remove('active'));

    // Adiciona a classe 'active' na imagem e miniatura selecionada
    sliderImages[index].classList.add('active');
    thumbnails[index].classList.add('active');
    currentIndex = index;
  }

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