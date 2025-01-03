<?php

namespace app\controllers\Blog;

use app\auth\Auth;
use app\support\Flash;
use app\database\Filters;
use app\library\Redirect;
use app\support\Validation;
use app\database\models\Post;
use app\database\models\User;
use app\library\ImageManager;
use app\controllers\Controller;


class UserController extends Controller
{
  public function profile()
  {
    $userId = Auth::getUser()->id;
    $user = (new User)->findBy('id', $userId);
    $filters = (new Filters)->where('userId', '=', $userId);
    $postsByUser = (new Post)->setFilters($filters)->all();
    $this->view('blog/profile', ['title' => 'Perfil', 'user' => $user, 'postsByUser' => $postsByUser]);
  }

  public function updateProfile()
  {
    $validated = (new Validation)->validate([
      'name' => 'required',
      'last_name' => 'optional'
    ]);

    if (!$validated) {
      Redirect::backWithData();
    }

    $userId = Auth::getUser()->id;
    (new User)->update($userId, $validated);
    Flash::set('profile-updated', 'Seu perfil foi atualizado com sucesso');
    Redirect::to('/blog/perfil');
  }

  public function updateProfilePic()
  {
    $validatedImage = (new Validation)->validate([
      'profile_pic' => 'maxSize:1|allowedTypes:image/jpeg,image/jpg'
    ]);

    if (!$validatedImage) {
      dd('falhou');
      Redirect::back();
    }

    $userId = Auth::getUser()->id;
    $validatedImage = $this->handleImageUpdate($userId, $validatedImage);
    (new User)->update($userId, $validatedImage);
    Flash::set('profile-updated', 'Foto atualizada');
    Redirect::back();
  }

  private function handleImageUpdate($id, $validated)
  {
    $imageManager = new ImageManager('/public/img/profilePics/', 'profilePics');
    $foundUser = (new User)->setFields('id, profile_pic')->findBy('id', $id);

    if ($foundUser && $foundUser->profile_pic) {
      $imageManager->delete($foundUser->profile_pic);
    }

    $validated['profile_pic'] = $imageManager->upload($validated['profile_pic']);
    return $validated;
  }
}
