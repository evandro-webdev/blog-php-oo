<?php

namespace app\database;

use app\library\Request;

class Pagination
{
  private int $currentPage;
  private int $totalPages;
  private int $linksPerPage = 5;
  private int $itemsPerPage = 10;
  private int $totalItems;
  private string $pageIdentifier = 'page';

  public function setTotalItems(int $totalItems)
  {
    $this->totalItems = $totalItems;
  }

  public function setPageIdentifier(string $identifier)
  {
    $this->pageIdentifier = $identifier;
  }

  public function setItemsPerPage(int $itemsPerPage)
  {
    $this->itemsPerPage = $itemsPerPage;
  }

  private function calculate()
  {
    $this->currentPage = Request::query($this->pageIdentifier) ?? 1;

    $offset = ($this->currentPage - 1) * $this->itemsPerPage;
    $this->totalPages = ceil($this->totalItems / $this->itemsPerPage);

    return "LIMIT $this->itemsPerPage OFFSET $offset";
  }

  public function dump()
  {
    return $this->calculate();
  }

  public function links()
  {
    $links = "<ul class='paginations'>";
    if ($this->currentPage > 1) {
      $previous = $this->currentPage - 1;
      $linkPage = http_build_query(array_merge($_GET, [$this->pageIdentifier => $previous]));
      $first = http_build_query(array_merge($_GET, [$this->pageIdentifier => 1]));
      $links .= "<li class='page-item'><a href='$first'>$first</a></li>";
      $links .= "<li class='page-item'><a href='$linkPage'>Anterior</a></li>";
    }

    for ($i = $this->currentPage - $this->linksPerPage; $i <= $this->currentPage + $this->linksPerPage; $i++) {
      if ($i > 0 && $i <= $this->totalPages) {
        $class = $this->currentPage === $i ? 'active' : '';
        $linkPage = http_build_query(array_merge($_GET, [$this->pageIdentifier => $i]));
        $links .= "<li class='page-item $class'><a href='?$linkPage' class='page-link'></a></li>";
      }
    }

    if ($this->currentPage < $this->totalPages) {
      $next = $this->currentPage + 1;
      $linkPage = http_build_query(array_merge($_GET, [$this->pageIdentifier => $next]));
      $last = http_build_query(array_merge($_GET, [$this->pageIdentifier => $this->totalPages]));
      $links .= "<li class='page-item'><a href='$linkPage'>Próxima</a></li>";
      $links .= "<li class='page-item'><a href='$last'>$last</a></li>";
    }
    $links .= "</ul>";

    return $links;
  }
}
