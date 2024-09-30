<?php $this->layout('master', ['title' => $title]); ?>

<?php $this->start('temporary-styles') ?>
<link rel="stylesheet" href="/css/temporary-styles.css" />
<?php $this->stop() ?>

<?php echo $this->insert('/admin/blog/partials/post-form', ["action" => $action, "post" => $post, "categories" => $categories]) ?>