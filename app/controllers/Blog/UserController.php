<?php

namespace app\controllers\Blog;

use app\auth\Auth;
use app\support\Flash;
use app\support\Validation;
use app\database\models\User;
use app\library\Redirect;
use app\library\ImageManager;
use app\controllers\Controller;

class UserController extends Controller
{
  public function __construct(private User $user, private Validation $validation) {}

  public function profile()
  {
    $userId = Auth::getUser()->id;
    $user = $this->user->findBy('id', $userId);

    $this->view('blog/profile', [
      'title' => 'Perfil',
      'user' => $user
    ]);
  }

  public function updateProfile()
  {
    $validated = $this->validation->validate([
      'name' => 'required',
      'last_name' => 'optional'
    ]);

    if (!$validated) {
      Redirect::backWithData();
    }

    $userId = Auth::getUser()->id;
    $this->user->update($userId, $validated);
    Flash::set('profile-updated', 'Seu perfil foi atualizado com sucesso');
    Redirect::to('/blog/perfil');
  }

  public function updateProfilePic()
  {
    $validatedImage = $this->validation->validate([
      'profile_pic' => 'maxSize:1|allowedTypes:image/jpeg,image/jpg'
    ]);

    if (!$validatedImage) {
      Redirect::back();
    }

    $userId = Auth::getUser()->id;
    $validatedImage = $this->handleImageUpdate($userId, $validatedImage);
    $this->user->update($userId, $validatedImage);
    Flash::set('profile-updated', 'Foto atualizada');
    Redirect::back();
  }

  private function handleImageUpdate($id, $validated)
  {
    $imageManager = new ImageManager('profilePics');
    $foundUser = $this->user->setFields('id, profile_pic')->findBy('id', $id);

    if ($foundUser && $foundUser->profile_pic) {
      $imageManager->deleteImage($foundUser->profile_pic);
    }

    $validated['profile_pic'] = $imageManager->uploadImage($validated['profile_pic']);
    return $validated;
  }
}
