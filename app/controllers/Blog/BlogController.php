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

  public function getByCategory($slug)
  {
    $filter = new Filters;
    $filter->join('categories', 'posts.categoryId', '=', 'categories.id');
    $filter->where('categories.slug', '=', $slug);
    $post = new Post;
    $post->setFilters($filter);
    $posts = $post->all();

    $category = new Category;
    $categories = $category->all();

    $this->view('blog/posts', ['title' => 'Postagens recentes', 'posts' => $posts, 'categories' => $categories]);
  }
}
