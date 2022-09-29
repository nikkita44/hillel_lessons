<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/blade.php';
require_once __DIR__ . '/../../config/database.php';

if(!isset($_GET['id'])){
    throw new Error('incorrect id value');
}

$tag = \Nico44\Models\Tag::find($_GET['id']);
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $tag->title = $_POST['title'];
    $tag->slug = $_POST['slug'];
    $tag->save();
    header('Location: /tag2');
}

/** @var $blade */
echo $blade->make('tags/updating_form', compact('tag'))->render();