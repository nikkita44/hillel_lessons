<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/blade.php';
require_once __DIR__ . '/../../config/database.php';

$title = '<h1>Categories page</h1>';
$categories = \Nico44\Models\Category::all();

/** @var $blade */
echo $blade->make('categories/index', compact('title', 'categories'))->render();