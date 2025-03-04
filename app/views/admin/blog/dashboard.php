<?php $this->layout('master', ['title' => $title]); ?>

<section class="dashboard-section">
  <div class="container">
    <?php echo flash('login-success', 'flash-message') ?>

    <?php echo flash('post-created', 'msg msg_success mb') ?>
    <?php echo flash('post-deleted', 'msg msg_success mb') ?>
    <div class="heading">
      <div>
        <h1>Dashboard</h1>
        <h2>Bem vindo, John</h2>
      </div>
      <form action="/admin/posts" method="GET" class="form form__search">
        <div class="form__group float-button">
          <input type="search" name="search" class="form__input" placeholder="Procurar post">
          <button type="submit"><img src="/img/icons/search.svg" width="20" height="20" alt=""></button>
        </div>
      </form>
    </div>
    <div class="dashboard">
      <div class="dashboard__wrapper">
        <table class="dashboard__table">
          <thead>
            <tr>
              <th>Título</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($posts as $post) { ?>
              <tr>
                <td><?php echo $post->title ?></td>
                <td class="dashboard__actions">
                  <a href="/admin/posts/edit/<?php echo $post->id ?>" class="edit"><img src="/img/icons/edit-blue.svg" width="16" height="16" alt=""><span>Editar</span></a>
                  <a href="#" class="delete open-modal" data-modal="confirmation-modal" data-post-id="<?php echo $post->id ?>"><img src="/img/icons/trash.svg" width="16" height="16" alt=""><span>Deletar</span></a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
        <?php echo $pagination ? $pagination->links() : '' ?>
      </div>

      <aside>
        <div class="card">
          <h3>Estatisticas gerais</h3>
          <ul class="card__list has-icon">
            <li><img src="/img/icons/posts.svg" width="24" height="24" alt=""><span><?php echo $postsStats['totalPosts'] ?> publicações</span></li>
            <li><img src="/img/icons/views.svg" width="24" height="24" alt=""><span><?php echo $postsStats['totalViews'] ?> cliques</span></li>
            <li><img src="/img/icons/comments-blue.svg" width="24" height="24" alt=""><span><?php echo $postsStats['totalComments'] ?> comentarios</span></li>
          </ul>
        </div>
        <div class="card authors">
          <h3>Redatores</h3>
          <ul class="card__list has-icon">
            <?php foreach ($authors as $author) { ?>
              <li><a href="/admin/posts/autor/<?php echo $author->id ?>"><img src="<?php echo $author->profile_pic ?? '/img/icons/posts.svg' ?>" width="40" height="40" alt=""><span><?php echo $author->name ?></span></a></li>
            <?php } ?>
          </ul>
        </div>
        <a href="/admin/posts/create" class="button has-icon"><img src="/img/icons/edit.svg" alt="icone de edição"> Novo post</a>
      </aside>

    </div>
  </div>
</section>

<div class="backdrop-container modal" id="confirmation-modal">
  <div class="confirmation-modal">
    <h3>Tem certeza que deseja deletar essa postagem?</h3>
    <div class="actions">
      <button class="button close-modal" data-modal="confirmation-modal">Cancelar</button>
      <form method="POST" id="delete-post-form">
        <input type="hidden" name="_method" value="DELETE">
        <button class="button" type="submit">Deletar</button>
      </form>
    </div>
  </div>
</div>

<?php $this->start('modal') ?>
<script src="/js/modal.js"></script>
<?php $this->stop() ?>