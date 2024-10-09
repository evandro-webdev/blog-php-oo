<?php

namespace app\controllers\Blog;

use app\support\Flash;
use app\support\Validation;
use app\controllers\Controller;
use app\database\models\Comment;
use app\library\Request;

class CommentController extends Controller
{
  public function create()
  {
    $validation = new Validation;
    $validated = $validation->validate([
      'content' => 'required'
    ]);

    if (!$validated) {
      Flash::set('comment-error', 'Erro ao enviar o comentário. Tente novamente.');
      return header('location: /post/' . $_POST['postId']);
    }

    $validated['postId'] = Request::input('postId');
    $validated['userId'] = Request::input('userId');

    $comment = new Comment;
    $comment->create($validated);
    Flash::set('comment-success', 'Comentário enviado com sucesso.');
    return header('location: /post/' . $_POST['postId']);
  }
}
