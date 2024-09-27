<?php

$this->layout('master', ['title' => $title]); ?>

<?php $this->start('temporary-styles') ?>
<link rel="stylesheet" href="/css/temporary-styles.css" />
<?php $this->stop() ?>

<div class="post-container">
  <?php foreach ($posts as $post) { ?>
    <div class="post">
      <h2 class="post-title"><?php echo $post->title ?></h2>
      <p class="post-content"><?php echo $post->content ?></p>
      <p class="post-date"><?php echo formatDate($post->created_at) ?></p>
      <a class="post-link" href="/blog/post/<?php echo $post->slug ?>">Ver mais</a>
    </div>
  <?php } ?>
</div>