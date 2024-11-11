<?php

$this->layout('master', ['title' => $title]); ?>

<?php $this->start('temporary-styles') ?>
<link rel="stylesheet" href="/css/temporary-styles.css" />
<?php $this->stop() ?>

<?php echo flash('user-created', 'flash-message') ?>
<?php echo flash('login-success', 'flash-message') ?>

<div class="slides-container">
  <?php foreach ($mostViewed as $post) { ?>
    <div class="slide" id="slide-1" style="background-image: url('<?php echo $post->imagePath ?? '' ?>')">
      <div class="slide-content">
        <a href="/blog/<?php echo $post->slug ?>">
          <h2><?php echo $post->title ?></h2>
        </a>
        <p><?php echo $post->categoryTitle ?></p>
        <p><?php echo formatDate($post->created_at) ?></p>
      </div>
    </div>
  <?php } ?>

  <button class="prev" onclick="moveSlides(-1)">&#10094;</button>
  <button class="next" onclick="moveSlides(1)">&#10095;</button>
</div>

<div class="container">
  <header>
    <h1>Blog de Odontologia</h1>
  </header>

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
            <a href="/blog/<?php echo $post->slug ?>">
              <h3 class="title"><?php echo $post->title ?></h3>
            </a>
            <div class="meta">
              <span>Por <?php echo $post->author ?></span> | <span><?php echo formatDate($post->created_at) ?></span>
            </div>
          </div>
        </div>
      <?php } ?>
    </main>
  </div>
</div>

<?php echo $pagination ?>

<?php $this->start('slides') ?>
<script src="/js/slides.js"></script>
<?php $this->stop() ?>