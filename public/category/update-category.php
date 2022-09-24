<?php

require_once __DIR__. '/../../vendor/autoload.php';
require_once __DIR__.'/../../config/blade.php';
require_once __DIR__.'/../../config/database.php';

if(!isset($_GET['id'])){
    throw new Error('incorrect id value');
}

$category = \Nico44\Models\Category::find($_GET['id']);
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $category->title = $_POST['title'];
    $category->slug = $_POST['slug'];
    $category->save();
    header('Location: /category');
}

/** @var $blade */
echo $blade->make('categories/updating_form', compact('category'))->render();