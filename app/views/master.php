<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="css/style.min.css"> -->
  <link rel="stylesheet" href="/css/blog.min.css">
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
  <title><?php echo $title ?></title>
</head>

<body>
  <?php
  echo $this->insert('./partials/header');
  ?>
  <main>
    <?php echo $this->section('content') ?>
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