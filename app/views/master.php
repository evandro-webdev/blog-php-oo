<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= $_SERVER['REQUEST_URI'] === '/' ? '/css/home.min.css' : '/css/blog.min.css' ?>">
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
  <script src="https://cdn.tiny.cloud/1/3qqrdxghokajgnwrpufmupg41lyo1e5llr6bymftc3btdx6v/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
  <title><?= $title ?></title>
</head>

<body>
  <?= $this->insert('./partials/header') ?>
  <main>
    <?= $this->section('content') ?>
  </main>
  <?php
  echo $this->insert('./partials/footer');

  echo $this->section('slides');
  echo $this->section('previewImage');
  echo $this->section('modal');
  ?>
  <script src="/js/flashMessage.js"></script>
  <script src="/js/header.js"></script>

</body>

</html>