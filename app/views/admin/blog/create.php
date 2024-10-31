<?php $this->layout('master', ['title' => $title]);
$post = (object) ($_SESSION['old_data'] ?? '');
unset($_SESSION['old_data']);
?>

<?php $this->start('temporary-styles') ?>
<link rel="stylesheet" href="/css/temporary-styles.css" />
<?php $this->stop() ?>

<?php echo $this->insert('/admin/blog/partials/post-form', ["action" => $action, "categories" => $categories, 'post' => $post]) ?>