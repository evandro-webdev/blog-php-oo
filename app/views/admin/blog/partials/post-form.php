<form action="<?php echo isset($post->id) ? $action . $post->id  : $action ?>" method="POST" enctype="multipart/form-data" class="form">
  <div class="form__left-column">

    <div class="form__group form-image">
      <input id="input-file" class="form__input-file" type="file" name="postImage">
      <div class="image-container">
        <img src="<?php echo $post->imagePath ?? '/img/placeholder.webp' ?>" alt="Prévia da imagem" id="image-preview" class="form__image-preview">
        <label for="input-file" class="form__label-file">Escolher imagem</label>
      </div>
      <span class="form__file-name" id="file-name">Nenhum arquivo selecionado | Formatos suportados: JPG, WEBP</span>

      <?php echo flash('postImage', 'msg msg_failed mt') ?>
    </div>

    <div class="form__checkboxes">
      <div class="form__group checkbox">
        <input type="checkbox" name="publish" id="publish" value="1">
        <label for="publish">Publicar imediatamente</label>
      </div>
      <div class="form__group checkbox">
        <input type="hidden" name="featured" value="0">
        <input type="checkbox" name="featured" id="highlight" value="1" <?php echo $post->featured ? 'checked' : ''; ?>>
        <label for="highlight">Publicar como destaque</label>
        <?php echo flash('featured', 'msg msg_failed mt') ?>
      </div>
    </div>

  </div>
  <div class="form__right-column">
    <div class="form__fields">
      <div class="form__group">
        <input type="text" name="title" value="<?php echo $post->title ?? '' ?>" placeholder="Título do post" class="form__input" />
        <?php echo flash('title', 'msg msg_failed mt') ?>
      </div>

      <div class="form__group">
        <select id="category" name="categoryId" class="form__select">
          <option value="" class="form__option" selected>Selecione uma categoria</option>
          <?php foreach ($categories as $category) { ?>
            <option class="form__option" <?php echo isset($post->categoryId) && $post->categoryId == $category->id ? "selected" : "" ?>
              value="<?php echo $category->id ?>">
              <?php echo $category->title ?></option>
          <?php } ?>
        </select>
        <?php echo flash('categoryId', 'msg msg_failed mt') ?>
      </div>
      <div class="form__group">
        <textarea class="form__textarea" id="content" name="content"><?php echo $post->content ?? '' ?></textarea>
        <?php echo flash('content', 'msg msg_failed mt') ?>
      </div>
      <!-- <div class="form__checkboxes">
        <div class="form__group checkbox">
          <input type="checkbox" name="publish" id="publish" value="1">
          <label for="publish">Publicar imediatamente</label>
        </div>
        <div class="form__group checkbox">
          <input type="hidden" name="featured" value="0">
          <input type="checkbox" name="featured" id="highlight" value="1">
          <label for="highlight">Publicar como destaque</label>
        </div>
      </div> -->
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
      'placeholder', 'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount'
    ],
    placeholder: 'Escreva aqui o conteúdo do post...',
    toolbar: 'styles | bold italic underline strikethrough | outdent indent | link image',
    branding: false,
    font_family_formats: "Poppins=poppins",
    content_style: `
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');
      body {
        margin: 11px 20px;
        font-family: 'Poppins';
        font-size: 18px;
        font-weight: 400;
        color: #323761;
      }
      .mce-content-body[data-mce-placeholder]::before {
        font-family: 'Poppins';
        font-weight: 300;
        font-size: 18px;
        color: #969696 !important;
      }
    `,
  });

  const selectElement = document.querySelector('.form__select');

  selectElement.addEventListener('change', function() {
    if (this.value === '') {
      this.classList.add('initial');
      this.classList.remove('selected');
    } else {
      this.classList.add('selected');
      this.classList.remove('initial');
    }
  });

  // Inicialmente, adicione a classe `initial`
  if (selectElement.value === '') {
    selectElement.classList.add('initial');
  } else {
    selectElement.classList.add('selected');
  }
</script>