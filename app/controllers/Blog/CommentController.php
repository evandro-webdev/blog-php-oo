<?php

namespace app\controllers\Blog;

use app\auth\Auth;
use app\support\Flash;
use app\support\Validation;
use app\controllers\Controller;
use app\database\models\Comment;
use app\library\Redirect;
use app\library\Request;

class CommentController extends Controller
{
  public function create()
  {
    $validated = (new Validation)->validate([
      'content' => 'required'
    ]);

    if (!$validated) {
      Flash::set('comment-error', 'Erro ao enviar o comentário. Tente novamente.');
      return Redirect::back();
    }

    $validated['postId'] = Request::input('postId');
    $validated['userId'] = Auth::getUser()->id;

    (new Comment)->create($validated);
    Flash::set('comment-success', 'Comentário enviado com sucesso.');
    return Redirect::back();
  }
}
