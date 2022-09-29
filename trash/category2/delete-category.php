<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/blade.php';
require_once __DIR__ . '/../../config/database.php';

if(!isset($_GET['id'])){
    throw new Error('incorrect id value');
}

$category = \Nico44\Models\Category::find($_GET['id']);
$category->delete();

header('Location: /category2');

