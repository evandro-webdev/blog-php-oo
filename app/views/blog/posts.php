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