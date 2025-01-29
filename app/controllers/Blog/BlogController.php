<?php

namespace app\controllers\Blog;

use app\auth\Auth;
use app\library\Request;
use app\database\Pagination;
use app\database\models\Post;
use app\controllers\Controller;
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
      $searchResults = $this->postFilterService->getSearch(Request::query('search'), $pagination);
    }

    $this->view('blog/posts', [
      'title' => 'Página inicial',
      'featured' => $featured,
      'posts' => $searchResults ?? $recent,
      'mostViewed' => $mostViewed,
      'pagination' => $pagination ?? ''
    ]);
  }

  public function show($slug)
  {
    $post = $this->postFilterService->getPost($slug)[0];
    $relatedPosts = $this->postFilterService->getRelatedPosts($post->id, $post->categoryId);
    $comments = $this->postFilterService->getCommentsForPost($post->id);
    (new Post)->incrementViews($post->id);

    $this->view('blog/post', [
      'title' => $post->title,
      'post' => $post,
      'relatedPosts' => $relatedPosts,
      'comments' => $comments,
      'isAuth' => Auth::isAuth()
    ]);
  }
}
