<?php

$this->layout('master', ['title' => $title]);
$post = (object) ($_SESSION['old_data'] ?? '');
unset($_SESSION['old_data']);

?>

<section class="manage-post-section">
  <div class="container">
    <h1>Criar novo post</h1>
    <?= $this->insert('/admin/blog/partials/post-form', ["action" => $action, "categories" => $categories, 'post' => $post]) ?>
  </div>
</section>

<?php $this->start('previewImage') ?>
<script src="/js/previewImage.js"></script>
<?php $this->stop() ?>