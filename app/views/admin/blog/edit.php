<?php $this->layout('master', ['title' => $title]);
$post = (object) ($_SESSION['old_data'] ?? $post);
unset($_SESSION['old_data']);
?>

<section class="manage-post-section">
  <div class="container">
    <h1>Editar post</h1>
    <?php echo $this->insert('/admin/blog/partials/post-form', ["action" => $action, "post" => $post, "categories" => $categories]) ?>
  </div>
</section>


<?php $this->start('previewImage') ?>
<script src="/js/previewImage.js"></script>
<?php $this->stop() ?>