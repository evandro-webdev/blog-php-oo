<?php

namespace app\controllers\Blog;

use app\auth\Auth;
use app\library\Request;
use app\database\Pagination;
use app\database\models\Post;
use app\controllers\Controller;
use app\services\PostService;

class BlogController extends Controller
{
  private PostService $postService;

  public function __construct(PostService $postService)
  {
    $this->postService = $postService;
  }

  public function index()
  {
    $featured = $this->postService->getFeatured();
    $recent = $this->postService->getRecent();
    $mostViewed = $this->postService->getMostViewed(3);

    if (Request::query('search')) {
      $searchResults = $this->postService->getPosts(new Pagination, Request::query('search'));
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
    $post = $this->postService->getPost($slug)[0];
    $relatedPosts = $this->postService->getRelatedPosts($post->id, $post->categoryId);
    $comments = $this->postService->getCommentsForPost($post->id);

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
