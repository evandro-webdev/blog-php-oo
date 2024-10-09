<?php

namespace app\controllers\Blog;

use app\database\models\Post;
use app\controllers\Controller;
use app\database\Filters;
use app\database\models\Category;
use app\database\models\Comment;

class BlogController extends Controller
{
  public function index()
  {
    $filter = new Filters;
    $filter->join('categories', 'posts.categoryId', '=', 'categories.id');
    $filter->join('users', 'posts.userId', '=', 'users.id');
    $filter->orderBy('created_at', 'DESC');

    $post = new Post;
    $posts = $post->setFields("posts.title as post_title, posts.slug, posts.created_at, categories.title as category_title, users.name as author_name")
      ->setFilters($filter)
      ->all();

    $categories = (new Category)->all();

    $this->view('blog/posts', ['title' => 'Postagens recentes', 'posts' => $posts, 'categories' => $categories]);
  }

  public function show($slug)
  {
    $filter = new Filters;
    $filter->join('categories', 'posts.categoryId', '=', 'categories.id');
    $filter->join('users', 'posts.userId', '=', 'users.id');

    $filter->where('posts.slug', '=', $slug);
    $foundPost = (new Post)->setFields("posts.id, posts.title, posts.slug, content, posts.created_at, categories.title as category_title, users.name as author_name")
      ->setFilters($filter)
      ->all();

    $filter = new Filters;
    $filter->where('postId', '=', $foundPost[0]->id);
    $filter->join('users', 'comments.userId', '=', 'users.id');
    $comments = (new Comment)->setFilters($filter)->all();

    $this->view('blog/post', ['title' => 'Post', 'post' => $foundPost[0], 'comments' => $comments]);
  }

  public function postsByCategory($slug)
  {
    $filter = $this->filterCategory($slug);
    $post = new Post;
    $posts = $post->setFields("posts.slug, posts.title as post_title, posts.created_at, categories.title as category_title, users.name as author_name")
      ->setFilters($filter)
      ->all();

    $categories = (new Category)->all();

    $this->view('blog/posts', ['title' => 'Postagens recentes', 'posts' => $posts, 'categories' => $categories]);
  }

  private function filterCategory($slug)
  {
    $filter = new Filters;
    $filter->join('categories', 'posts.categoryId', '=', 'categories.id');
    $filter->join('users', 'posts.userId', '=', 'users.id');
    $filter->where('categories.slug', '=', $slug);
    return $filter;
  }
}
