<?php

namespace app\enums;

use app\middlewares\Admin;
use app\middlewares\Auth;
use app\middlewares\Guest;

enum RouteMiddlewares: string
{
  case admin = Admin::class;
  case auth = Auth::class;
  case guest = Guest::class;
}
