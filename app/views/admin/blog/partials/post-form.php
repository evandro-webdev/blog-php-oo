<form action="<?= isset($post->id) ? $action . $post->id  : $action ?>" method="POST" enctype="multipart/form-data" class="form">
  <div class="form__left-column">

    <div class="form__group form-image">
      <input id="input-file" class="form__input-file" type="file" name="postImage">
      <div class="image-container">
        <img src="<?= $post->imagePath ?? '/img/elements/placeholder.webp' ?>" alt="Prévia da imagem" id="image-preview" class="form__image-preview">
        <label for="input-file" class="form__label-file">Escolher imagem</label>
      </div>
      <span class="form__file-name" id="file-name">Nenhum arquivo selecionado | Formatos suportados: JPG, WEBP</span>

      <?= flash('postImage', 'msg msg_failed mt') ?>
    </div>

    <div class="form__checkboxes">
      <div class="form__group checkbox">
        <input type="hidden" name="published" value="0">
        <input type="checkbox" name="published" id="published" value="1" <?= isset($post->published) && $post->published ? 'checked' : ''; ?>>
        <label for="published">Marcar como publicado</label>
        <?= flash('featured', 'msg msg_failed mt') ?>
      </div>
      <div class="form__group checkbox">
        <input type="hidden" name="featured" value="0">
        <input type="checkbox" name="featured" id="highlight" value="1" <?= isset($post->featured) && $post->featured ? 'checked' : ''; ?>>
        <label for="highlight" title="O post será automaticamente publicado">Publicar como destaque</label>
        <small id="highlight-help" class="tool-tip">(O post será automaticamente publicado)</small>
        <?= flash('featured', 'msg msg_failed mt') ?>
      </div>
    </div>

  </div>
  <div class="form__right-column">
    <div class="form__fields">
      <div class="form__group">
        <input type="text" name="title" value="<?= $post->title ?? '' ?>" placeholder="Título do post" class="form__input" />
        <?= flash('title', 'msg msg_failed mt') ?>
      </div>

      <div class="form__group">
        <select id="category" name="categoryId" class="form__select">
          <option value="" class="form__option" selected>Selecione uma categoria</option>
          <?php foreach ($categories as $category) { ?>
            <option class="form__option" <?= isset($post->categoryId) && $post->categoryId == $category->id ? "selected" : "" ?>
              value="<?= $category->id ?>">
              <?= $category->title ?></option>
          <?php } ?>
        </select>
        <?= flash('categoryId', 'msg msg_failed mt') ?>
      </div>
      <div class="form__group">
        <textarea class="form__textarea" id="content" name="content"><?= $post->content ?? '' ?></textarea>
        <?= flash('content', 'msg msg_failed mt') ?>
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
</script>

<script>
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

  if (selectElement.value === '') {
    selectElement.classList.add('initial');
  } else {
    selectElement.classList.add('selected');
  }
</script>

<script>
  const highlightCheckbox = document.querySelector('#highlight');
  const publishedCheckbox = document.querySelector('#published');
  const highlightHelpText = document.querySelector('#highlight-help');

  highlightCheckbox.addEventListener('change', function() {
    if (this.checked) {
      publishedCheckbox.checked = true;
      highlightHelpText.style.display = 'inline';
    } else {
      highlightHelpText.style.display = 'none';
    }
  })

  publishedCheckbox.addEventListener('change', function() {
    if (highlightCheckbox.checked) {
      this.checked = true;
    }
  });
</script>