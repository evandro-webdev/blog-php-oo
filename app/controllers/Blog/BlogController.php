<?php

namespace app\controllers\Blog;

use app\controllers\Controller;
use app\database\models\Post;

class BlogController extends Controller
{
  public function index()
  {
    $post = new Post;
    $posts = $post->all();
    $this->view('blog/posts', ['title' => 'Postagens recentes', 'posts' => $posts]);
  }

  public function show($slug)
  {
    $post = new Post;
    $foundPost = $post->findBy('slug', $slug);
    $this->view('blog/post', ['title' => 'Post', 'post' => $foundPost]);
  }
}