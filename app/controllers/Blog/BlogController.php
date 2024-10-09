<?php

namespace app\controllers\Blog;

use app\database\models\Post;
use app\controllers\Controller;
use app\database\Filters;
use app\database\models\Category;

class BlogController extends Controller
{
  public function index()
  {
    $filter = new Filters;
    $filter->join('categories', 'posts.categoryId', '=', 'categories.id');

    $post = new Post;
    $posts = $post->setFields("posts.title as post_title, posts.slug, posts.created_at, categories.title as category_title")
      ->setFilters($filter)
      ->all();

    $categories = (new Category)->all();

    $this->view('blog/posts', ['title' => 'Postagens recentes', 'posts' => $posts, 'categories' => $categories]);
  }

  public function show($slug)
  {
    $filter = new Filters;
    $filter->join('categories', 'posts.categoryId', '=', 'categories.id');
    $filter->where('posts.slug', '=', $slug);
    $foundPost = (new Post)->setFields("posts.title, posts.slug, content, posts.created_at, categories.title as category_title")
      ->setFilters($filter)
      ->all();

    $this->view('blog/post', ['title' => 'Post', 'post' => $foundPost[0]]);
  }

  public function postsByCategory($slug)
  {
    $filter = $this->filterCategory($slug);
    $post = new Post;
    $posts = $post->setFields("posts.slug, posts.title as post_title, posts.created_at, categories.title as category_title")
      ->setFilters($filter)
      ->all();

    $categories = (new Category)->all();

    $this->view('blog/posts', ['title' => 'Postagens recentes', 'posts' => $posts, 'categories' => $categories]);
  }

  private function filterCategory($slug)
  {
    $filter = new Filters;
    $filter->join('categories', 'posts.categoryId', '=', 'categories.id');
    $filter->where('categories.slug', '=', $slug);
    return $filter;
  }
}
