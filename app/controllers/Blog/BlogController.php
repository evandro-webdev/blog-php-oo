<?php

namespace app\controllers\Blog;

use app\auth\Auth;
use app\library\Request;
use app\controllers\Controller;
use app\database\Pagination;
use app\database\models\Post;
use app\database\models\Comment;
use app\services\PostFilterService;

class BlogController extends Controller
{
  private $postFilterService;

  public function __construct()
  {
    $this->postFilterService = new PostFilterService();
  }

  public function index()
  {
    $featured = $this->postFilterService->getFeatured();
    $recent = $this->postFilterService->getRecent();
    $mostViewed = $this->postFilterService->getMostViewed(3);

    if (Request::query('search')) {
      $pagination = new Pagination;
      $foundPosts = $this->postFilterService->getSearched(Request::query('search'), $pagination);
    }

    $this->view('blog/posts', [
      'title' => 'Página inicial',
      'featured' => $featured,
      'posts' => $foundPosts ?? $recent,
      'mostViewed' => $mostViewed,
      'pagination' => $pagination ?? ''
    ]);
  }

  public function show($slug)
  {
    $filter = $this->postFilterService->baseFilter()->where('posts.slug', '=', $slug);

    $post = new Post;
    $foundPost = $post
      ->setFields("posts.id, posts.title, posts.slug, categoryId, posts.content, imagePath, posts.created_at, 
        categories.slug as categorySlug, categories.title as categoryTitle, users.name as author, users.profile_pic")
      ->setFilters($filter)
      ->all();

    $post->incrementViews($foundPost[0]->id);
    $relatedPosts = $this->postFilterService->getRelatedPosts($foundPost[0]->id, $foundPost[0]->categoryId);

    $filter = $this->postFilterService->commentFilter($foundPost[0]->id);
    $comments = (new Comment)
      ->setFields("comments.id, content, comments.created_at, name, userId, profile_pic")
      ->setFilters($filter)
      ->all();

    $this->view('blog/post', [
      'title' => $foundPost[0]->title,
      'post' => $foundPost[0],
      'relatedPosts' => $relatedPosts,
      'comments' => $comments,
      'isAuth' => Auth::isAuth()
    ]);
  }
}
