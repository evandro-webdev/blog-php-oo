<?php

namespace app\services;

use app\database\Filters;
use app\database\models\Post;
use app\database\models\Comment;

class PostFilterService
{
  private const POST_CARD_FIELDS = "posts.title, posts.slug, imagePath, created_at, categories.title as categoryTitle";
  private const POST_ALL_FIELDS = "
      posts.id, posts.title, posts.slug, categoryId, posts.content, imagePath, posts.created_at, 
      categories.slug as categorySlug, categories.title as categoryTitle, 
      CONCAT(name, ' ', last_name) as author, users.profile_pic";

  public function baseFilter($fieldOrder, $limit = 3)
  {
    return (new Filters)->join('categories', 'posts.categoryId', '=', 'categories.id')
      ->orderBy($fieldOrder, 'DESC')
      ->limit($limit);
  }

  public function getMostViewed()
  {
    $filter = $this->baseFilter('views');
    return (new Post)
      ->setFields(self::POST_CARD_FIELDS)
      ->setFilters($filter)
      ->all();
  }

  public function getRecent()
  {
    $filter = $this->baseFilter('created_at');
    return (new Post)
      ->setFields(self::POST_CARD_FIELDS)
      ->setFilters($filter)
      ->all();
  }

  public function getFeatured($limit = 4)
  {
    $filter = $this->baseFilter('created_at', $limit)->where('featured', '=', 1);
    return (new Post)
      ->setFields(self::POST_CARD_FIELDS)
      ->setFilters($filter)
      ->all();
  }

  public function getRelatedPosts($postId, $categoryId)
  {
    $filter = $this->baseFilter('created_at')
      ->where('categoryId', '=', $categoryId, 'AND')
      ->where('posts.id', '!=', $postId);

    return (new Post)
      ->setFields(self::POST_CARD_FIELDS)
      ->setFilters($filter)
      ->all();
  }

  public function getSearch($searchTerm, $pagination)
  {
    $filter = $this->baseFilter('created_at')
      ->where('posts.title', 'LIKE', "%$searchTerm%");

    return (new Post)
      ->setFields(self::POST_CARD_FIELDS)
      ->setFilters($filter)
      ->setPagination($pagination)
      ->all();
  }

  public function getPost($slug)
  {
    $filter = (new Filters)->join('categories', 'posts.categoryId', '=', 'categories.id')
      ->join('users', 'posts.userId', '=', 'users.id')
      ->join('comments', 'posts.id', '=', 'comments.postId', 'LEFT JOIN')
      ->where('posts.slug', '=', $slug)
      ->groupBy('posts.id');

    return (new Post)
      ->setFields(self::POST_ALL_FIELDS)
      ->setFilters($filter)
      ->all();
  }

  public function getCommentsForPost($id)
  {
    $filter = (new Filters)->join('users', 'comments.userId', '=', 'users.id')
      ->where('postId', '=', $id)
      ->orderBy('created_at', 'DESC');

    return (new Comment)
      ->setFields("comments.id, content, comments.created_at, name, userId, profile_pic")
      ->setFilters($filter)
      ->all();
  }

  public function getPostsByUser($userId)
  {
    $filters = (new Filters)->where('userId', '=', $userId);
    return (new Post)->setFilters($filters)->all();
  }
}
