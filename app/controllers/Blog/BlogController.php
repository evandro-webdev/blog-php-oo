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
  public function __construct(private PostService $postService) {}

  public function index($slug = '')
  {
    $featured = $this->postService->getFeaturedPosts();
    $recent = $this->postService->getRecentPosts();
    $mostViewed = $this->postService->getMostViewedPosts(3);

    $searchQuery = Request::query('search');

    $pagination = new Pagination;
    $pagination->setItemsPerPage(8);

    $filteredPosts = $slug
      ? $this->postService->getPostsByCategory($pagination, $slug)
      : $this->postService->getPosts($pagination, $searchQuery);

    $this->view('blog/posts', [
      'title' => 'Página inicial',
      'featured' => $featured,
      'posts' => $filteredPosts ?? $recent,
      'mostViewed' => $mostViewed,
      'pagination' => $pagination ?? '',
      'slug' => $slug
    ]);
  }

  public function show($slug)
  {
    $post = $this->postService->getSinglePost($slug)[0];
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
