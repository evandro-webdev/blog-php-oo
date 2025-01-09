<!-- <div class="form-container">
  <form class="form" action="<?php echo isset($post->id) ? $action . $post->id  : $action ?>" method="POST"
    enctype="multipart/form-data">
    <div class="form-group">
      <label for="title">Título:</label>
      <input type="text" id="title" name="title" value="<?php echo $post->title ?? '' ?>" placeholder="Título do post">
      <?php echo flash('title', 'msg msg-failed mt') ?>
    </div>

    <div class="form-group">
      <label for="content">Conteúdo:</label>
      <textarea id="content" name="content" rows="5"
        placeholder="Conteúdo do post"><?php echo $post->content ?? '' ?></textarea>
      <?php echo flash('content', 'msg msg-failed mt') ?>
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
      <?php echo flash('categoryId', 'msg msg-failed mt') ?>
    </div>

    <div class="form-group">
      <input id="cover-post" class="cover-post" type="file" name="postImage" class="">

      <label for="cover-post" class="custom-file-label">Selecionar arquivo</label>
      <span class="file-name" id="file-name">Nenhum arquivo selecionado</span>

      <img src="<?php echo $post->imagePath ?? '/img/placeholder.webp' ?>" alt="Prévia da imagem" class="image-preview">

      <?php echo flash('postImage', 'msg msg-failed mt') ?>
    </div>

    <button type="submit">Cadastrar</button>
  </form>
</div> -->

<form action="<?php echo isset($post->id) ? $action . $post->id  : $action ?>" method="POST" enctype="multipart/form-data" class="form">
  <div class="form__left-column">
    <div class="form__group form-image">
      <input id="input-file" class="form__input-file" type="file" name="postImage">
      <div class="image-container">
        <img src="<?php echo $post->imagePath ?? '/img/placeholder.webp' ?>" alt="Prévia da imagem" id="image-preview" class="form__image-preview">
        <label for="input-file" class="form__label-file">Escolher imagem</label>
      </div>

      <span class="form__file-name" id="file-name">Nenhum arquivo selecionado | Formatos suportados: JPG, WEBP</span>

      <?php echo flash('postImage', 'msg msg-failed mt') ?>
    </div>
    <div class="form__checkboxes">
      <div class="form__group checkbox">
        <input type="checkbox" name="publish" id="publish">
        <label for="publish">Publicar imediatamente</label>
      </div>
      <div class="form__group checkbox">
        <input type="checkbox" name="highlight" id="highlight">
        <label for="highlight">Publicar como destaque</label>
      </div>
    </div>
  </div>
  <div class="form__right-column">
    <div class="form__fields">
      <input type="text" name="title" value="<?php echo $post->title ?? '' ?>" placeholder="Título do post" class="form__input" />
      <div class="form__group">
        <select id="category" name="categoryId" class="form__select">
          <option value="" class="form__option">Selecione uma categoria</option>
          <?php foreach ($categories as $category) { ?>
            <option class="form__option" <?php echo isset($post->categoryId) && $post->categoryId == $category->id ? "selected" : "" ?>
              value="<?php echo $category->id ?>">
              <?php echo $category->title ?></option>
          <?php } ?>
        </select>
        <?php echo flash('categoryId', 'msg msg-failed mt') ?>
      </div>
      <textarea class="form__textarea" id="content" name="content"><?php echo $post->content ?? '' ?></textarea>
      <div class="form__checkboxes">
        <div class="form__group checkbox">
          <input type="checkbox" name="publish" id="publish">
          <label for="publish">Publicar imediatamente</label>
        </div>
        <div class="form__group checkbox">
          <input type="checkbox" name="highlight" id="highlight">
          <label for="highlight">Publicar como destaque</label>
        </div>
      </div>
    </div>
    <button class="button">Enviar</button>
  </div>
</form>

<script>
  tinymce.init({
    selector: '#content',
    skin: 'bootstrap',
    icons: 'bootstrap',
    language: 'pt_BR',
    language_url: '/js/lang/pt_BR.js',
    plugins: [
      'placeholder', 'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
      'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'mentions', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown', 'importword', 'exportword', 'exportpdf'
    ],
    placeholder: 'Escreva aqui o conteúdo do post...',
    toolbar: 'styles | bold italic underline | outdent indent | link image',
    branding: false,
    font_family_formats: "Poppins=poppins, sans-serif;",
    content_style: `
      body { 
        font-family: 'Poppins', sans-serif;
        font-size: 18px;
        color: var(--clr-blue-900);
      }
      .mce-content-body[data-mce-placeholder]::before {
        font-family: 'Poppins', sans-serif;
        font-weight: 300;
        font-size: 18px;
      }
    `,
  });
</script>