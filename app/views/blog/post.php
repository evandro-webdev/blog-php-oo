<?php

$this->layout('master', ['title' => $title]); ?>

<?php $this->start('temporary-styles') ?>
<link rel="stylesheet" href="/css/temporary-styles.css" />
<?php $this->stop() ?>

<?php if (!$post) { ?>
  <div class="post-not-found-container">
    <h1 class="post-not-found-title">Esse post não existe</h1>
    <p class="post-not-found-message">Desculpe, o post que você está procurando não foi encontrado.</p>
    <a href="/" class="post-not-found-link">Voltar para a página inicial</a>
  </div>
<?php } else { ?>

  <article class="single-post">
    <header class="post-header">
      <h1 class="post-title"><?php echo $post->title ?></h1>
      <div class="post-meta">
        <span class="post-category"><?php echo $post->category_title ?></span>
        <span class="author">Por Dr. João</span>
        <span class="date"><?php echo formatDate($post->created_at) ?></span>
      </div>
    </header>

    <section class="post-content">
      <p>
        <?php echo $post->content; ?>
      </p>
    </section>

    <footer class="post-footer">
      <div class="share-links">
        <span>Compartilhar:</span>
        <a href="#">Facebook</a> | <a href="#">Twitter</a> | <a href="#">LinkedIn</a>
      </div>
    </footer>
  </article>
<?php } ?>