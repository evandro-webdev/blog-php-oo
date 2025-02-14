<?php

namespace app\library;

use RuntimeException;

class ImageManager
{
  protected string $uploadDir;
  protected string $folder;
  protected const BASE_IMAGE_PATH = '/public/img/';

  public function __construct(string $folder)
  {
    $this->uploadDir = BASE_PATH . self::BASE_IMAGE_PATH . $folder;
    $this->folder = $folder;
  }

  public function uploadImage(array $image): string
  {
    $imageName = $this->generateImageName($image['name']);
    $imagePath = $this->uploadDir . '/' . $imageName;

    if (move_uploaded_file($image['tmp_name'], $imagePath)) {
      return "/img/$this->folder/$imageName";
    }

    throw new RuntimeException('Erro ao fazer o upload de imagem');
  }

  public function deleteImage(string $imagePath): bool
  {
    $filePath = BASE_PATH . "/public{$imagePath}";

    if (!file_exists($filePath)) {
      error_log("Arquivo não encontrado: $filePath", 0);
      return false;
    }

    return unlink($filePath);
  }

  private function generateImageName(string $originalName)
  {
    return uniqid() . '-' . basename($originalName);
  }
}
