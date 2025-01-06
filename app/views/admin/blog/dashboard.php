<?php $this->layout('master', ['title' => $title]); ?>

<!--
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
-->

<section class="dashboard-section">
  <div class="container">
    <div class="heading">
      <div>
        <h3>Bem vindo, John</h3>
        <h1>Dashboard</h1>
      </div>
      <form action="" class="form form__search">
        <div class="form__group float-button">
          <input type="search" class="form__input" placeholder="Procurar post">
          <button type="submit"><img src="/img/icons/search.svg" alt=""></button>
        </div>
      </form>
    </div>
    <div class="dashboard">
      <div class="dashboard__wrapper">
        <table class="dashboard__table">
          <thead>
            <tr>
              <th>Título</th>
              <th>Categoria</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Tudo o que você precisa saber sobre o dente do siso: Mitos e verdades</td>
              <td>Ortodontia</td>
              <td class="dashboard__actions">
                <a href="#" class="edit"><img src="/img/icons/edit-blue.svg" width="16" height="16" alt=""><span>Editar</span></a>
                <a href="#" class="delete open-modal" data-modal="confirmation-modal"><img src="/img/icons/trash.svg" width="16" height="16" alt=""><span>Deletar</span></a>
              </td>
            </tr>
            <tr>
              <td>O que esperar durante um tratamento de canal: Mitos e verdades</td>
              <td>Ortodontia</td>
              <td class="dashboard__actions">
                <a href="#" class="edit"><img src="/img/icons/edit-blue.svg" width="16" height="16" alt=""><span>Editar</span></a>
                <a href="#" class="delete open-modal" data-modal="confirmation-modal"><img src="/img/icons/trash.svg" width="16" height="16" alt=""><span>Deletar</span></a>
              </td>
            </tr>
            <tr>
              <td>Importância das visitas regulares ao dentista</td>
              <td>Ortodontia</td>
              <td class="dashboard__actions">
                <a href="#" class="edit"><img src="/img/icons/edit-blue.svg" width="16" height="16" alt=""><span>Editar</span></a>
                <a href="#" class="delete open-modal" data-modal="confirmation-modal"><img src="/img/icons/trash.svg" width="16" height="16" alt=""><span>Deletar</span></a>
              </td>
            </tr>
            <tr>
              <td>Importância das visitas regulares ao dentista</td>
              <td>Ortodontia</td>
              <td class="dashboard__actions">
                <a href="#" class="edit"><img src="/img/icons/edit-blue.svg" width="16" height="16" alt=""><span>Editar</span></a>
                <a href="#" class="delete open-modal" data-modal="confirmation-modal"><img src="/img/icons/trash.svg" width="16" height="16" alt=""><span>Deletar</span></a>
              </td>
            </tr>
            <tr>
              <td>Importância das visitas regulares ao dentista</td>
              <td>Ortodontia</td>
              <td class="dashboard__actions">
                <a href="#" class="edit"><img src="/img/icons/edit-blue.svg" width="16" height="16" alt=""><span>Editar</span></a>
                <a href="#" class="delete open-modal" data-modal="confirmation-modal"><img src="/img/icons/trash.svg" width="16" height="16" alt=""><span>Deletar</span></a>
              </td>
            </tr>
            <tr>
              <td>Importância das visitas regulares ao dentista</td>
              <td>Ortodontia</td>
              <td class="dashboard__actions">
                <a href="#" class="edit"><img src="/img/icons/edit-blue.svg" width="16" height="16" alt=""><span>Editar</span></a>
                <a href="#" class="delete open-modal" data-modal="confirmation-modal"><img src="/img/icons/trash.svg" width="16" height="16" alt=""><span>Deletar</span></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="card">
        <h3>Estatisticas gerais</h3>
        <ul class="card__list has-icon">
          <li><img src="/img/icons/posts.svg" alt=""><span>20 publicações</span></li>
          <li><img src="/img/icons/views.svg" alt=""><span>4300 cliques</span></li>
          <li><img src="/img/icons/comments-blue.svg" alt=""><span>60 comentarios</span></li>
          <li><img src="/img/icons/share.svg" alt=""><span>25 compartilhamentos</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<div class="backdrop-container modal" id="confirmation-modal">
  <div class="confirmation-modal">
    <h3>Tem certeza que deseja deletar essa postagem?</h3>
    <div class="actions">
      <button class="button close-modal" data-modal="confirmation-modal">Cancelar</button>
      <form action="/admin/posts/delete/<?php echo $post->id ?>" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <button class="button" type="submit">Deletar</button>
      </form>
    </div>
  </div>
</div>

<?php $this->start('modal') ?>
<script src="/js/modal.js"></script>
<?php $this->stop() ?>