<?php $this->layout('master', ['title' => $title]); ?>

<?php $this->start('temporary-styles') ?>
<link rel="stylesheet" href="/css/temporary-styles.css" />
<?php $this->stop() ?>

<div class="container">
  <header>
    <h1>Gerenciamento de Posts</h1>
    <a href="/admin/posts/create" class="btn-new-post">Cadastrar Novo Post</a>
  </header>

  <main>
    <?php echo flash('login-success', 'flash-message') ?>

    <?php echo flash('post-created', 'msg msg-success mb') ?>
    <?php echo flash('post-deleted', 'msg msg-success mb') ?>

    <section class="post-list">
      <h2>Lista de Posts</h2>
      <ul>
        <?php foreach ($posts as $post) { ?>
          <li>
            <span><?php echo $post->title ?></span>
            <div class="actions">
              <a href="/admin/posts/edit/<?php echo $post->id ?>" class="btn-update">Atualizar</a>
              <button class="btn-delete open-modal" data-modal="confirmation-modal" type="submit">Deletar</button>
            </div>
          </li>
        <?php } ?>
      </ul>
    </section>
  </main>
</div>

<div class="backdrop-container" id="confirmation-modal">
  <div class="confirmation-modal">
    <h3>Tem certeza que deseja deletar essa postagem?</h3>
    <div class="actions">
      <button class="btn-cancel close-modal" data-modal="confirmation-modal">Cancelar</button>
      <form action="/admin/posts/delete/<?php echo $post->id ?>" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <button class="btn-delete" type="submit">Deletar</button>
      </form>
    </div>
  </div>
</div>

<?php $this->start('modal') ?>
<script src="/js/modal.js"></script>
<?php $this->stop() ?>