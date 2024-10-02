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
    $post = new Post;
    $post->setFields("title as post_title, slug, created_at");
    $posts = $post->all();
    $category = new Category;
    $categories = $category->all();
    $this->view('blog/posts', ['title' => 'Postagens recentes', 'posts' => $posts, 'categories' => $categories]);
  }

  public function show($slug)
  {
    $post = new Post;
    $foundPost = $post->findBy('slug', $slug);
    $this->view('blog/post', ['title' => 'Post', 'post' => $foundPost]);
  }

  public function postsByCategory($slug)
  {
    $filter = $this->filterCategory($slug);
    $post = new Post;
    $post->setFields("posts.slug, posts.title as post_title, posts.created_at, categories.title as category_title");
    $post->setFilters($filter);
    $posts = $post->all();
    $category = new Category;
    $categories = $category->all();

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