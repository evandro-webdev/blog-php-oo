<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php echo $this->section('temporary-styles') ?>
  <?php echo $this->section('main-styles') ?>
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
  <title><?php echo $title ?></title>
</head>

<body>
  <?php
  // echo $this->insert('./partials/header');
  echo $this->section('content');
  echo $this->insert('./partials/footer');

  echo $this->section('slides');
  echo $this->section('previewImage');
  echo $this->section('modal');
  ?>
  <script src="/js/flashMessage.js"></script>
</body>

</html>