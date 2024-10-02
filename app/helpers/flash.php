<?php

use app\support\Flash;

function flash($index, $css = '')
{
  $message = Flash::get($index);

  return $message ? "<span class='$css'>$message</span>" : '';
}
