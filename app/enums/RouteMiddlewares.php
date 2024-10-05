<?php

namespace app\enums;

use app\middlewares\Admin;

enum RouteMiddlewares: string
{
  case admin = Admin::class;
}