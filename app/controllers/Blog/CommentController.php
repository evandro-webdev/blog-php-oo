<?php

namespace app\controllers\Blog;

use app\auth\Auth;
use app\support\Flash;
use app\support\Validation;
use app\controllers\Controller;
use app\database\models\Comment;
use app\library\Request;

class CommentController extends Controller
{
  public function create()
  {
    Auth::refreshSession();

    $validated = (new Validation)->validate([
      'content' => 'required'
    ]);

    if (!$validated) {
      Flash::set('comment-error', 'Erro ao enviar o comentário. Tente novamente.');
      return header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    $validated['postId'] = Request::input('postId');
    $validated['userId'] = Auth::getUser()->id;

    (new Comment)->create($validated);
    Flash::set('comment-success', 'Comentário enviado com sucesso.');
    return header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
}