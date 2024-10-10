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

<div class="container">
  <article class="single-post">
    <header class="post-header">
      <h1 class="post-title"><?php echo $post->title ?></h1>
      <div class="post-meta">
        <span class="post-category"><?php echo $post->category_title ?></span>
        <span class="author">Por <?php echo $post->author ?></span>
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

  <section class="comments-section">
    <h2 class="comments-title">Comentários</h2>

    <?php echo flash('comment-success', 'msg msg-success mb') ?>

    <?php if (count($comments) > 0) { ?>
    <ul class="comments-list">
      <?php foreach ($comments as $comment) { ?>
      <li class="comment-item">
        <div class="comment-header">
          <span class="comment-author"><?php echo $comment->name; ?></span>
          <span class="comment-date"><?php echo formatDate($comment->created_at); ?></span>
        </div>
        <div class="comment-content">
          <?php echo $comment->content; ?>
        </div>
      </li>
      <?php } ?>
    </ul>
    <?php } else { ?>
    <p class="no-comments">Nenhum comentário ainda. Seja o primeiro a comentar!</p>
    <?php } ?>

    <div class="comment-form-container">
      <h3>Deixe um comentário</h3>
      <form action="/blog/comment" method="POST">
        <input type="hidden" name="postId" value="<?php echo $post->id; ?>">
        <input type="hidden" name="userId" value="<?php echo $_SESSION['auth']->id; ?>">
        <textarea name="content" rows="4" placeholder="Escreva seu comentário aqui..." required></textarea>
        <button type="submit">Comentar</button>
      </form>
    </div>
  </section>

</div>

<?php } ?>