<?php $this->layout('master', ['title' => $title]); ?>

<?php $this->start('temporary-styles') ?>
<link rel="stylesheet" href="/css/temporary-styles.css" />
<?php $this->stop() ?>



<form class="create-form" action="store" method="POST">
  <div class="form-group">
    <label for="title">Título:</label>
    <input type="text" id="title" name="title" placeholder="Título do post" required>
  </div>

  <div class="form-group">
    <label for="content">Conteúdo:</label>
    <textarea id="content" name="content" rows="5" placeholder="Conteúdo do post" required></textarea>
  </div>

  <!-- <label for="categoria">Categoria:</label>  

  <select id="categoria" name="categoria">
    <option value="tecnologia">Tecnologia</option>
    <option value="viagem">Viagem</option>
    <option value="gastronomia">Gastronomia</option>
    <option value="entretenimento">Entretenimento</option>
  </select> -->

  <button type="submit">Cadastrar</button>
</form>