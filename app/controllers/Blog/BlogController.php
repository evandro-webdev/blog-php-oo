<?php

namespace app\controllers\Blog;

use app\auth\Auth;
use app\database\Filters;
use app\database\models\Post;
use app\controllers\Controller;
use app\database\models\Comment;
use app\database\models\Category;

class BlogController extends Controller
{
  // ADICIONAR NUMERO DE COMENTÁRIOS NO CARD
  public function index($slug = null)
  {
    $filter = $this->baseFilter()->orderBy('created_at', 'DESC');

    if ($slug) {
      $filter->where('categories.slug', '=', $slug);
    }

    $posts = (new Post)
      ->setFields("posts.title, posts.slug, posts.created_at, categories.title as category_title, users.name as author")
      ->setFilters($filter)
      ->all();

    $categories = (new Category)->all();

    $this->view('blog/posts', [
      'title' => 'Postagens recentes',
      'posts' => $posts,
      'categories' => $categories
    ]);
  }

  public function show($slug)
  {
    $filter = $this->baseFilter()->where('posts.slug', '=', $slug);
    $foundPost = (new Post)
      ->setFields("posts.id, posts.title, posts.slug, content, posts.created_at, categories.title as category_title, users.name as author")
      ->setFilters($filter)
      ->all();

    $filter = $this->commentFilter($foundPost[0]->id);
    $comments = (new Comment)
      ->setFields("content, comments.created_at, name")
      ->setFilters($filter)
      ->all();

    $isAuth = Auth::isAuth();

    $this->view('blog/post', [
      'title' => 'Post',
      'post' => $foundPost[0],
      'comments' => $comments,
      'isAuth' => $isAuth
    ]);
  }

  private function baseFilter()
  {
    $filter = new Filters;
    $filter->join('categories', 'posts.categoryId', '=', 'categories.id')
      ->join('users', 'posts.userId', '=', 'users.id');
    return  $filter;
  }

  private function commentFilter($id)
  {
    $filter = new Filters;
    $filter->join('users', 'comments.userId', '=', 'users.id')
      ->where('postId', '=', $id)
      ->orderBy('created_at', 'DESC');

    return $filter;
  }
}