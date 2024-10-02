<form class="create-form" action="<?php echo isset($post->id) ? $action . $post->id  : $action ?>" method="POST">
  <div class="form-group">
    <label for="title">Título:</label>
    <input type="text" id="title" name="title" value="<?php echo $post->title ?? '' ?>" placeholder="Título do post">
    <?php echo flash('title', 'msg msg-failed') ?>
  </div>

  <div class="form-group">
    <label for="content">Conteúdo:</label>
    <textarea id="content" name="content" rows="5"
      placeholder="Conteúdo do post"><?php echo $post->content ?? '' ?></textarea>
    <?php echo flash('content', 'msg msg-failed') ?>
  </div>

  <div class="form-group">
    <label for="category">Categoria:</label>
    <select id="category" name="categoryId">
      <option value="">Selecione uma categoria</option>
      <?php foreach ($categories as $category) { ?>
        <option <?php echo isset($post->categoryId) && $post->categoryId == $category->id ? "selected" : "" ?>
          value="<?php echo $category->id ?>">
          <?php echo $category->title ?></option>
      <?php } ?>
    </select>
    <?php echo flash('categoryId', 'msg msg-failed') ?>
  </div>

  <button type="submit">Cadastrar</button>
</form>