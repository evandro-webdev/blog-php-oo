<?php

use app\auth\Auth;

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
      <img src="<?php echo $post->imagePath ?? '' ?>" width="968" height="510" alt="" class="post__image">
      <div class="post__details">
        <div class="post-author">
          <img src="/img/patient01.png" width="50" height="50" alt="">
          <span><?php echo $post->author ?></span>
        </div>
        <div class="post__meta">
          <span class="post-card__date"><?php echo formatDate($post->created_at) ?></span>
          <span>|</span>
          <span class="post-card__category"><?php echo $post->categoryTitle ?></span>
        </div>
      </div>
      <div class="post__content">
        <h1 class="post__title"><?php echo $post->title ?></h1>
        <div class="post__body">
          <?php echo $post->content ?>
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
        <img src="/img/patient02.png" width="60" height="60" alt="">
        <form action="/blog/comment" method="POST" class="form form__search">
          <input type="hidden" name="postId" value="<?php echo $post->id; ?>">
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
              <img src="<?php echo $comment->profile_pic ?>" class="comment__author-pic" width="60" height="60" alt="">
              <div class="comment__details">
                <h4 class="comment__author"><?php echo $comment->name ?></h4>
                <span><?php echo formatDate($comment->created_at) ?></span>
              </div>
            </div>
            <p class="comment__body"><?php echo $comment->content ?></p>
          </div>
        <?php } ?>
        <?php if (!$comments) { ?>
          <p>Nenhum comentário encontrado, seja o primeiro a opinar!</p>
        <?php } ?>

      </div>
    </div>
  </section>

  <!--
  <div class="container">
    <article class="single-post">
      <?php if (isset($post->imagePath)) { ?>
        <img src="<?php echo $post->imagePath ?>">
      <?php } ?>
      <header class="post-header">
        <h1 class="post-title"><?php echo $post->title ?></h1>
        <div class="post-meta">
          <a href="/blog/categoria/<?php echo $post->categorySlug ?>"><span
              class="post-category"><?php echo $post->category_title ?></span>
          </a>
          <span class="author">Por <?php echo $post->author ?></span>
          <span class="date"><?php echo formatDate($post->created_at) ?></span>
        </div>
      </header>

      <section class="post-content">
        <p>
          <?php echo $post->content ?>
        </p>
      </section>

      <footer class="post-footer">
        <div class="share-links">
          <span>Compartilhar:</span>
          <a href="#">Facebook</a> | <a href="#">Twitter</a> | <a href="#">LinkedIn</a>
        </div>
      </footer>
    </article>

    <div class="related-slides-container">
      <?php foreach ($relatedPosts as $relatedPost) { ?>
        <div class="related-slide" id="related-slide-<?php echo $relatedPost->id; ?>">
          <div class="related-slide-image" style="background-image: url('<?php echo $relatedPost->imagePath ?? ''; ?>');">
          </div>
          <div class="related-slide-content">
            <div class="related-slide-info">
              <span class="related-category"><?php echo $relatedPost->categoryTitle; ?></span> |
              <span class="related-date"><?php echo formatDate($relatedPost->created_at); ?></span>
            </div>
            <h3 class="related-title"><?php echo $relatedPost->title; ?></h3>
            <a href="/blog/post/<?php echo $relatedPost->slug; ?>" class="related-read-more">Ler mais</a>
          </div>
        </div>
      <?php } ?>
    </div>

    <section class="comments-section">
      <h2 class="comments-title">Comentários</h2>

      <?php echo flash('comment-success', 'msg msg-success mb') ?>
      <?php echo flash('comment-deleted', 'msg msg-success mb') ?>

      <?php if (count($comments) > 0) { ?>
        <ul class="comments-list">
          <?php foreach ($comments as $comment) { ?>
            <li class="comment-item">
              <div class="comment-header">
                <span class="comment-author"><?php echo $comment->name; ?></span>
                <span class="comment-date"><?php echo formatDate($comment->created_at); ?></span>
                <?php if (Auth::isAuth() && $comment->userId == Auth::getUser()->id) { ?>
                  <form action="/blog/comment/delete/<?php echo $comment->id ?>" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit">Excluir</button>
                  </form>
                <?php } ?>
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
        <?php if ($isAuth) { ?>
          <h3>Deixe um comentário</h3>
          <form action="/blog/comment" method="POST">
            <input type="hidden" name="postId" value="<?php echo $post->id; ?>">
            <textarea name="content" rows="4" placeholder="Escreva seu comentário aqui..." required></textarea>
            <button type="submit">Comentar</button>
          </form>
        <?php } else { ?>
          <p>Você precisa <a href="/auth/login">fazer login</a> para comentar.</p>
        <?php } ?>
      </div>
    </section>

  </div>
        -->

<?php } ?>