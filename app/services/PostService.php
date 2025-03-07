<?php

namespace app\services;

use app\auth\Auth;
use app\support\Slugify;
use app\library\ImageManager;
use app\database\models\Post;
use app\database\Filters;
use app\database\models\Comment;
use app\database\models\Category;
use Exception;

class PostService
{
  private const POST_CARD_FIELDS = "
    posts.id,
    posts.title,
    posts.slug,
    imagePath,
    created_at,
    categories.title as categoryTitle,
    categories.slug as categorySlug";

  private const POST_ALL_FIELDS = "
    posts.id,
    posts.title,
    posts.content,
    imagePath,
    posts.created_at,
    categories.id as categoryId,
    categories.title as categoryTitle,
    categories.slug as categorySlug,
    CONCAT(name, ' ', last_name) as author,
    users.profile_pic";

  public function __construct(private Post $post) {}

  private function applyBaseFilter($fieldOrder)
  {
    return (new Filters)->join('categories', 'posts.categoryId', '=', 'categories.id')->orderBy($fieldOrder, 'DESC');
  }

  private function executePostQuery(Filters $filter, string $fieldsType, $pagination = null)
  {
    $posts = (new Post)
      ->setFields($fieldsType)
      ->setFilters($filter);

    if ($pagination) {
      $posts->setPagination($pagination);
    }

    return $posts->all();
  }

  public function getPosts($pagination, $searchTerm = null, $fieldOrder = 'created_at')
  {
    $filter = $this->applyBaseFilter($fieldOrder);

    if ($searchTerm) {
      $filter->where('posts.title', 'LIKE', "%$searchTerm%");
    }

    return $this->executePostQuery($filter, self::POST_CARD_FIELDS, $pagination);
  }

  public function getPostsWithStats($pagination, $searchTerm = null)
  {
    $filter = (new Filters)->join("comments", "posts.id", "=", "comments.postId", "LEFT JOIN")->groupBy('posts.id, posts.title, posts.views')->orderBy('posts.created_at', 'DESC');

    if ($searchTerm) {
      $filter->where('posts.title', 'LIKE', "%$searchTerm%");
    }

    return $this->executePostQuery($filter, "posts.id, posts.title, posts.views, posts.created_at, COUNT(comments.id) as comments", $pagination);
  }

  public function getFeaturedPosts()
  {
    $filter = $this->applyBaseFilter('created_at')
      ->where('featured', '=', 1)
      ->limit(4);

    return $this->executePostQuery($filter, self::POST_CARD_FIELDS);
  }

  public function getRecentPosts()
  {
    $filter = $this->applyBaseFilter('created_at')
      ->limit(4);

    return $this->executePostQuery($filter, self::POST_CARD_FIELDS);
  }

  public function getMostViewedPosts()
  {
    $filter = $this->applyBaseFilter('views')
      ->limit(4);

    return $this->executePostQuery($filter, self::POST_CARD_FIELDS);
  }

  public function getPostsByCategory($pagination, $categorySlug)
  {
    $category = (new Category)->findBy('slug', $categorySlug);
    $filter = $this->applyBaseFilter('created_at')->where('categoryId', '=', $category->id);

    return $this->executePostQuery($filter, self::POST_CARD_FIELDS, $pagination);
  }

  public function getPostsByUser($pagination, $userId)
  {
    $filter = (new Filters)->where('userId', '=', $userId);

    return $this->executePostQuery($filter, 'id, title', $pagination);
  }

  public function getRelatedPosts($postId, $categoryId)
  {
    $filter = $this->applyBaseFilter('created_at')
      ->where('categoryId', '=', $categoryId, 'AND')
      ->where('posts.id', '!=', $postId)
      ->limit(3);

    return $this->executePostQuery($filter, self::POST_CARD_FIELDS);
  }

  public function getSinglePost(string $slug)
  {
    $filter = (new Filters)->join('categories', 'posts.categoryId', '=', 'categories.id')
      ->join('users', 'posts.userId', '=', 'users.id')
      ->join('comments', 'posts.id', '=', 'comments.postId', 'LEFT JOIN')
      ->where('posts.slug', '=', $slug)
      ->groupBy('posts.id');

    return $this->executePostQuery($filter, self::POST_ALL_FIELDS);
  }

  public function getCommentsForPost(int $id)
  {
    $filter = (new Filters)->join('users', 'comments.userId', '=', 'users.id')
      ->where('postId', '=', $id)
      ->orderBy('created_at', 'DESC');

    return (new Comment)
      ->setFields("comments.id, content, comments.created_at, name, userId, profile_pic")
      ->setFilters($filter)
      ->all();
  }

  public function getStatsForAllPosts()
  {
    $totalPosts = (new Post)->count();
    $totalViews = (new Post)->getTotalViews();
    $totalComments = (new Comment)->count();

    return compact(
      'totalViews',
      'totalPosts',
      'totalComments'
    );
  }

  public function createPost(array $data)
  {
    $data['slug'] = Slugify::slugify($data['title']);
    $data['userId'] = Auth::getUser()->id;

    $imageManager = new ImageManager('posts');
    $data['imagePath'] = $imageManager->uploadImage($data['postImage']);
    unset($data['postImage']);

    $this->post->create($data);
  }

  public function updatePost(int $id, array $data)
  {
    $post = $this->post->findBy('id', $id);

    if (!$post) {
      throw new Exception('Post não encontrado');
    }

    if (!empty($data['postImage'])) {
      $data = $this->handleImageUpdate($id, $data);
    }

    $data['slug'] = Slugify::slugify($data['title']);
    unset($data['postImage']);
    $this->post->update($id, $data);
  }

  public function deletePost($id)
  {
    $post = $this->post->findBy('id', $id);

    if (!$post) {
      throw new Exception('Post não encontrado');
    }

    $imageManager = new ImageManager('posts');

    if ($post->imagePath) {
      if (!$imageManager->deleteImage($post->imagePath)) {
        throw new Exception('Imagem não deletada');
      }
    }

    if (!$this->post->delete($post->id)) {
      throw new Exception('Falha ao deletar post');
    }
  }

  public function incrementViews($id)
  {
    $this->post->incrementViews($id);
  }

  private function handleImageUpdate($id, $data)
  {
    $imageManager = new ImageManager('posts');
    $foundPost = $this->post->setFields('id, imagePath')->findBy('id', $id);

    if ($foundPost && $foundPost->imagePath) {
      $imageManager->deleteImage($foundPost->imagePath);
    }

    $data['imagePath'] = $imageManager->uploadImage($data['postImage']);
    return $data;
  }
}
