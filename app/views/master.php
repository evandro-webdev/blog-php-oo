<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title ?></title>
</head>

<body>
  <?php echo $this->insert('./partials/header') ?>
  <?php echo $this->section('content') ?>
  <?php echo $this->insert('./partials/footer') ?>
</body>

</html>