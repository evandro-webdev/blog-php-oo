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
  <?php echo $this->insert('./partials/header') ?>
  <?php echo $this->section('content') ?>
  <?php echo $this->insert('./partials/footer') ?>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      setTimeout(function() {
        var flashMessage = document.querySelector('.flash-message');
        if (flashMessage) {
          flashMessage.classList.add('hide');
        }
      }, 5000);
    });
  </script>
</body>

</html>