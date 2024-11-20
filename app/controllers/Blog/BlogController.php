<?php

namespace app\controllers\Blog;

use app\auth\Auth;
use app\library\Request;
use app\database\Filters;
use app\database\models\Post;
use app\controllers\Controller;
use app\database\models\Comment;
use app\database\models\Category;
use app\database\models\User;
use app\database\Pagination;

class BlogController extends Controller
{
  public function index($slug = null)
  {
    $filter = $this->baseFilter()->orderBy('posts.created_at', 'DESC');

    if ($slug) {
      $filter->where('categories.slug', '=', $slug);
    }

    $search = Request::query('search') ?? null;
    if ($search) {
      $filter->where('posts.title', 'LIKE', "%$search%");
    }

    $pagination = new Pagination;

    $posts = (new Post)
      ->setFields("posts.id, posts.title, posts.slug, posts.created_at, imagePath, categories.title as category_title, 
        users.name as author, COUNT(comments.id) as comment_count")
      ->setFilters($filter)
      ->setPagination($pagination)
      ->all();

    $categories = (new Category)->all();

    $mostViewed = $this->getMostViewed();

    $this->view('blog/posts', [
      'title' => 'Postagens recentes',
      'posts' => $posts,
      'categories' => $categories,
      'mostViewed' => $mostViewed,
      'pagination' => $pagination
    ]);
  }

  public function show($slug)
  {
    $filter = $this->baseFilter()->where('posts.slug', '=', $slug);

    $post = new Post;
    $foundPost = $post
      ->setFields("posts.id, posts.title, posts.slug, categoryId, posts.content, imagePath, posts.created_at, 
        categories.slug as categorySlug, categories.title as category_title, users.name as author")
      ->setFilters($filter)
      ->all();

    $post->incrementViews($foundPost[0]->id);
    $relatedPosts = $this->getRelatedPosts($foundPost[0]->id, $foundPost[0]->categoryId);

    $filter = $this->commentFilter($foundPost[0]->id);
    $comments = (new Comment)
      ->setFields("comments.id, content, comments.created_at, name, userId")
      ->setFilters($filter)
      ->all();

    $isAuth = Auth::isAuth();
    $this->view('blog/post', [
      'title' => 'Post',
      'post' => $foundPost[0],
      'relatedPosts' => $relatedPosts,
      'comments' => $comments,
      'isAuth' => $isAuth
    ]);
  }

  public function profile()
  {
    $userId = Auth::getUser()->id;
    $user = (new User)->findBy('id', $userId);
    $filters = (new Filters)->where('userId', '=', $userId);
    $postsByUser = (new Post)->setFilters($filters)->all();
    $this->view('blog/profile', ['title' => 'Perfil', 'user' => $user, 'postsByUser' => $postsByUser]);
  }

  private function baseFilter()
  {
    $filter = new Filters;
    $filter->join('categories', 'posts.categoryId', '=', 'categories.id')
      ->join('users', 'posts.userId', '=', 'users.id')
      ->join('comments', 'posts.id', '=', 'comments.postId', 'LEFT JOIN')
      ->groupBy('posts.id');
    return $filter;
  }

  private function commentFilter($id)
  {
    $filter = new Filters;
    $filter->join('users', 'comments.userId', '=', 'users.id')
      ->where('postId', '=', $id)
      ->orderBy('created_at', 'DESC');

    return $filter;
  }

  private function getMostViewed($limit = 5)
  {
    $filter = new Filters;
    $filter->join('categories', 'posts.categoryId', '=', 'categories.id')
      ->orderBy('views', 'DESC')
      ->limit($limit);

    return (new Post)
      ->setFields("posts.title, posts.slug, imagePath, created_at, categories.title as categoryTitle")
      ->setFilters($filter)
      ->all();
  }

  private function getRelatedPosts($postId, $categoryId, $limit = 5)
  {
    $filter = new Filters;
    $filter->join('categories', 'posts.categoryId', '=', 'categories.id')
      ->where('categoryId', '=', $categoryId, 'AND')
      ->where('posts.id', '!=', $postId)
      ->orderBy('created_at', 'DESC')
      ->limit($limit);

    return (new Post)
      ->setFields("posts.title, posts.slug, imagePath, created_at, categories.title as categoryTitle")
      ->setFilters($filter)
      ->all();
  }
}
