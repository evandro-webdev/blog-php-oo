<?php

namespace app\controllers\Blog;

use app\auth\Auth;
use app\library\Request;
use app\controllers\Controller;
use app\database\Pagination;
use app\database\models\Post;
use app\database\models\Comment;
use app\database\models\Category;
use app\services\PostFilterService;

class BlogController extends Controller
{
  private $postFilterService;

  public function __construct()
  {
    $this->postFilterService = new PostFilterService();
  }

  public function index($slug = null)
  {
    $filter = $this->postFilterService->baseFilter()->orderBy('posts.created_at', 'DESC');

    if ($slug) {
      $filter->where('categories.slug', '=', $slug);
    }

    $search = Request::query('search') ?? null;
    if ($search) {
      $filter->where('posts.title', 'LIKE', "%$search%");
    }

    $pagination = new Pagination;

    $posts = (new Post)
      ->setFields("posts.id, posts.title, posts.slug, posts.created_at, imagePath, 
        categories.title as category_title, 
        users.name as author, COUNT(comments.id) as comment_count")
      ->setFilters($filter)
      ->setPagination($pagination)
      ->all();

    $categories = (new Category)->all();

    $mostViewed = $this->postFilterService->getMostViewed();

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
    $filter = $this->postFilterService->baseFilter()->where('posts.slug', '=', $slug);

    $post = new Post;
    $foundPost = $post
      ->setFields("posts.id, posts.title, posts.slug, categoryId, posts.content, imagePath, posts.created_at, 
        categories.slug as categorySlug, categories.title as category_title, users.name as author")
      ->setFilters($filter)
      ->all();

    $post->incrementViews($foundPost[0]->id);
    $relatedPosts = $this->postFilterService->getRelatedPosts($foundPost[0]->id, $foundPost[0]->categoryId);

    $filter = $this->postFilterService->commentFilter($foundPost[0]->id);
    $comments = (new Comment)
      ->setFields("comments.id, content, comments.created_at, name, userId")
      ->setFilters($filter)
      ->all();

    $this->view('blog/post', [
      'title' => 'Post',
      'post' => $foundPost[0],
      'relatedPosts' => $relatedPosts,
      'comments' => $comments,
      'isAuth' => Auth::isAuth()
    ]);
  }
}
