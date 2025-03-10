<?php
require 'vendor/autoload.php';

use MatthiasMullie\Minify;

$homeFiles = [
  'public/css/global/boilerplate.css',
  'public/css/global/layout.css',
  'public/css/global/fonts.css',
  'public/css/global/button.css',
  'public/css/global/form.css',
  'public/css/components/home/header.css',
  'public/css/components/home/hero.css',
  'public/css/components/home/about.css',
  'public/css/components/home/benefits.css',
  'public/css/components/home/feedback.css',
  'public/css/components/home/cta.css',
  'public/css/components/home/services.css',
  'public/css/components/home/home-blog.css',
  'public/css/components/home/contact.css',
  'public/css/components/home/footer.css'
];

$blogFiles = [
  'public/css/global/boilerplate.css',
  'public/css/global/layout.css',
  'public/css/global/fonts.css',
  'public/css/global/button.css',
  'public/css/global/form.css',
  'public/css/global/modal.css',
  'public/css/components/home/header.css',
  'public/css/components/blog/blog-posts.css',
  'public/css/components/blog/slider.css',
  'public/css/components/blog/single-post.css',
  'public/css/components/blog/comment.css',
  'public/css/components/blog/profile.css',
  'public/css/components/blog/dashboard.css',
  'public/css/components/blog/auth.css',
  'public/css/components/blog/manage-post.css',
  'public/css/components/blog/pagination.css',
  'public/css/components/blog/flash-messages.css',
  'public/css/components/home/footer.css'
];

$homeMinifier = new Minify\CSS();

foreach ($homeFiles as $file) {
  $homeMinifier->add($file);
}

$homeMinifier->minify('public/css/home.min.css');
echo "Home CSS files have been combined and minified into home.min.css!\n";

$blogMinifier = new Minify\CSS();

foreach ($blogFiles as $file) {
  $blogMinifier->add($file);
}

$blogMinifier->minify('public/css/blog.min.css');
echo "Blog CSS files have been combined and minified into blog.min.css!\n";
