<?php $this->layout('master', ['title' => $title]);
$post = (object) ($_SESSION['old_data'] ?? $post);
unset($_SESSION['old_data']);
?>

<?php $this->start('temporary-styles') ?>
<link rel="stylesheet" href="/css/temporary-styles.css" />
<?php $this->stop() ?>

<?php echo $this->insert('/admin/blog/partials/post-form', ["action" => $action, "post" => $post, "categories" => $categories]) ?>

<?php $this->start('previewImage') ?>
<script src="/js/previewImage.js"></script>
<?php $this->stop() ?>