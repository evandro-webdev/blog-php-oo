<?php

namespace app\controllers\Blog;

use app\auth\Auth;
use app\library\Request;
use app\controllers\Controller;
use app\services\PostService;

class BlogController extends Controller
{
  public function __construct(private PostService $postService) {}

  public function index($slug = '')
  {
    $searchQuery = Request::query('search');

    if (empty($searchQuery) && empty($slug)) {
      $featured = $this->postService->getFeaturedPosts();
      $recent = $this->postService->getRecentPosts();
      $mostViewed = $this->postService->getMostViewedPosts(3);
    }

    if ($slug || $searchQuery) {
      $pagination = $this->createPagination(8);

      $filteredPosts = $slug
        ? $this->postService->getPostsByCategory($pagination, $slug)
        : $this->postService->getPosts($pagination, $searchQuery);
    }

    $this->view('blog/posts', [
      'title' => 'Página inicial',
      'posts' => $filteredPosts ?? $recent,
      'featured' => $featured ?? '',
      'mostViewed' => $mostViewed ?? '',
      'pagination' => $pagination ?? '',
      'isSearch' => !empty($slug) || !empty($searchQuery)
    ]);
  }

  public function show($slug)
  {
    $post = $this->postService->getSinglePost($slug)[0];
    $relatedPosts = $this->postService->getRelatedPosts($post->id, $post->categoryId);
    $comments = $this->postService->getCommentsForPost($post->id);

    $this->postService->incrementViews($post->id);

    $this->view('blog/post', [
      'title' => $post->title,
      'post' => $post,
      'relatedPosts' => $relatedPosts,
      'comments' => $comments,
      'isAuth' => Auth::isAuth()
    ]);
  }
}
