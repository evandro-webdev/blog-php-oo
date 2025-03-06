<?php

$this->layout('master', ['title' => $title]); ?>

<?php if (!$post) { ?>
  <div class="not-found-container">
    <h1 class="post-not-found-title">Esse post não existe</h1>
    <p class="post-not-found-message">Desculpe, o post que você está procurando não foi encontrado.</p>
    <a href="/" class="post-not-found-link">Voltar para a página inicial</a>
  </div>
<?php } else { ?>
  <article class="post-article">
    <div class="container">
      <img src="<?= $post->imagePath ?? '' ?>" width="968" height="510" alt="" class="post__image">
      <div class="post__details">
        <div class="post__author">
          <img src="<?= $post->profile_pic ?? '/img/icons/profile-pic.svg' ?>" width="50" height="50" alt="">
          <span><?= $post->author ?></span>
        </div>
        <div class="post__meta">
          <span class="post-card__date"><?= formatDate($post->created_at) ?></span>
          <span>|</span>
          <span class="post-card__category"><?= $post->categoryTitle ?></span>
        </div>
      </div>
      <div class="post__content">
        <h1 class="post__title"><?= $post->title ?></h1>
        <div class="post__body">
          <?= $post->content ?>
        </div>
      </div>
      <div class="share-post">
        <h3>Compartilhe</h3>
        <div class="social-links">
          <a href="#"><img src="/img/icons/facebook.svg" width="30" height="30" alt="ícone do facebook"></a>
          <a href="#"><img src="/img/icons/instagram.svg" width="30" height="30" alt="ícone do facebook"></a>
          <a href="#"><img src="/img/icons/x.svg" width="30" height="30" alt="ícone do facebook"></a>
          <a href="#"><img src="/img/icons/whatsapp-blue.svg" width="30" height="30" alt="ícone do facebook"></a>
        </div>
      </div>
    </div>
  </article>

  <section class="comments-section">
    <div class="container">
      <div class="heading">
        <h2>Comentários</h2>
      </div>
      <div class="add-comment">
        <img src="<?= $_SESSION['auth']->profile_pic ?? '/img/icons/profile-pic.svg' ?>" width="60" height="60" alt="">
        <form action="/blog/comment" method="POST" class="form form__search">
          <input type="hidden" name="postId" value="<?= $post->id; ?>">
          <div class="form__group float-button">
            <input type="text" name="content" class="form__input" placeholder="Compartilhe a sua opnião"></input>
            <button type="submit"><img src="/img/icons/send.svg" width="20" height="20" alt="icone de envio"></button>
          </div>
        </form>
      </div>
      <div class="comments">
        <?php foreach ($comments as $comment) { ?>
          <div class="comment">
            <div class="comment__head">
              <img src="<?= $comment->profile_pic ?? '/img/icons/profile-pic.svg' ?>" class="comment__author-pic" width="60" height="60" alt="">
              <div class="comment__details">
                <h4 class="comment__author"><?= $comment->name ?></h4>
                <span><?= formatDate($comment->created_at) ?></span>
              </div>
            </div>
            <p class="comment__body"><?= $comment->content ?></p>
          </div>
        <?php } ?>
        <?php if (!$comments) { ?>
          <p>Nenhum comentário encontrado, seja o primeiro a opinar!</p>
        <?php } ?>

      </div>
    </div>
  </section>
<?php } ?>