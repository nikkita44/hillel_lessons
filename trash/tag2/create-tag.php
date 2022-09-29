<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/blade.php';
require_once __DIR__ . '/../../config/database.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $tag = new \Nico44\Models\Tag();
    $tag->title = $_POST['title'];
    $tag->slug = $_POST['slug'];
    $tag->save();
    header('Location: /tag2');
}

/** @var $blade */
echo $blade->make('tags/adding_form')->render();