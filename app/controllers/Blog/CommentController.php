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
  public function __construct(private Comment $comment) {}

  public function create()
  {
    $validated = (new Validation)->validate([
      'content' => 'required'
    ]);

    if (!$validated) {
      Flash::set('comment-error', 'Erro ao enviar o comentário. Tente novamente.');
      Redirect::back();
    }

    $validated['postId'] = Request::input('postId');
    $validated['userId'] = Auth::getUser()->id;

    $this->comment->create($validated);
    Flash::set('comment-success', 'Comentário enviado com sucesso.');
    Redirect::back();
  }

  public function delete($id)
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['_method'] === 'DELETE') {
      $deletedComment = $this->comment->delete($id);
      if ($deletedComment) {
        Flash::set('comment-deleted', 'Seu comentário foi deletado');
        Redirect::back();
      }
    }
  }
}
