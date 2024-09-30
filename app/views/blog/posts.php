<?php

$this->layout('master', ['title' => $title]); ?>

<?php $this->start('temporary-styles') ?>
<link rel="stylesheet" href="/css/temporary-styles.css" />
<?php $this->stop() ?>

<div class="container">
  <header>
    <h1>Blog de Odontologia</h1>
  </header>

  <div class="content">
    <aside class="sidebar">
      <h2>Categorias</h2>
      <ul>
        <?php foreach ($categories as $category) { ?>
          <li><a href="/blog/categoria/<?php echo $category->slug ?>"><?php echo $category->title ?></a></li>
        <?php } ?>
      </ul>
    </aside>

    <main class="post-list">
      <?php foreach ($posts as $post) { ?>
        <div class="post-card">
          <div class="post-info">
            <span class="category"><?php echo "Categoria" ?></span>
            <a href="/blog/<?php echo $post->slug ?>">
              <h3 class="title"><?php echo $post->title ?></h3>
            </a>
            <div class="meta">
              <span>Por Dr. João</span> | <span><?php echo formatDate($post->created_at) ?></span>
            </div>
          </div>
        </div>
      <?php } ?>
    </main>
  </div>
</div>