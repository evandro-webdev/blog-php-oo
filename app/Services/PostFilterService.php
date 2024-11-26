<?php

namespace app\Services;

use app\database\Filters;
use app\database\models\Post;

class PostFilterService
{
  public function baseFilter()
  {
    return (new Filters)->join('categories', 'posts.categoryId', '=', 'categories.id')
      ->join('users', 'posts.userId', '=', 'users.id')
      ->join('comments', 'posts.id', '=', 'comments.postId', 'LEFT JOIN')
      ->groupBy('posts.id');
  }

  public function commentFilter($id)
  {
    return (new Filters)->join('users', 'comments.userId', '=', 'users.id')
      ->where('postId', '=', $id)
      ->orderBy('created_at', 'DESC');
  }

  public function getMostViewed($limit = 5)
  {
    $filter = new Filters;
    $filter->join('categories', 'posts.categoryId', '=', 'categories.id')
      ->orderBy('views', 'DESC')
      ->limit($limit);

    return (new Post)
      ->setFields("posts.title, posts.slug, imagePath, created_at, categories.title as categoryTitle")
      ->setFilters($filter)
      ->all();
  }

  public function getRelatedPosts($postId, $categoryId, $limit = 5)
  {
    $filter = new Filters;
    $filter->join('categories', 'posts.categoryId', '=', 'categories.id')
      ->where('categoryId', '=', $categoryId, 'AND')
      ->where('posts.id', '!=', $postId)
      ->orderBy('created_at', 'DESC')
      ->limit($limit);

    return (new Post)
      ->setFields("posts.title, posts.slug, imagePath, created_at, categories.title as categoryTitle")
      ->setFilters($filter)
      ->all();
  }
}
