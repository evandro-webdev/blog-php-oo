<?php

function formatDate($date)
{
  $date = new DateTime($date);
  $formatedDate = $date->format('d/m/Y');

  return $formatedDate;
}