<?php


require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/blade.php';

$title = 'category';

/** @var $blade */
echo $blade->make('pages/category', [
    'title' => $title
])->render();