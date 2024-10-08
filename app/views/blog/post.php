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
<?php }else{ ?>
<h1><?php echo $post->title ?></h1>
<p><?php echo $post->content ?></p>
<?php } ?>