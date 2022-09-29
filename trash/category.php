<?php


require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/blade.php';

$title = 'category2';

/** @var $blade */
echo $blade->make('pages/category2', [
    'title' => $title
])->render();