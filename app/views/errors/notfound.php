<?php $this->layout('master', ['title' => $title]) ?>

<?php $this->start('temporary-styles') ?>
<link rel="stylesheet" href="/css/temporary-styles.css" />
<?php $this->stop() ?>

<div class="not-found-container">
  <h1 class="not-found-title">404 - Página Não Encontrada</h1>
  <p class="not-found-message">A página que você está tentando acessar não existe.</p>
  <a href="/" class="not-found-link">Voltar para a página inicial</a>
</div>