<?php

namespace app\library;

use Exception;

class ImageManager
{
  protected string $uploadDir;
  protected string $folder;

  public function __construct(string $folder = 'posts/', string $uploadDir = '/public/img/posts/')
  {
    $this->uploadDir = BASE_PATH . $uploadDir;
    $this->folder = $folder;
  }

  public function uploadImage(array $image): string
  {
    $imageName = uniqid() . '-' . basename($image['name']);
    $imagePath = $this->uploadDir . $imageName;

    if (move_uploaded_file($image['tmp_name'], $imagePath)) {
      return "/img/$this->folder/" . $imageName;
    }

    throw new Exception('Erro ao fazer o upload de imagem');
  }

  public function deleteImage(string $imagePath): bool
  {
    $filePath = BASE_PATH . "/public{$imagePath}";
    if (file_exists($filePath)) {
      return unlink($filePath);
    } else {
      error_log("Arquivo não encontrado: $filePath", 0);
      return false;
    }
  }
}
