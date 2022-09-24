<?php

require_once __DIR__. '/../../vendor/autoload.php';
require_once __DIR__.'/../../config/blade.php';
require_once __DIR__.'/../../config/database.php';

$title = '<h1>Tags page</h1>';
$tags = \Nico44\Models\Tag::all();

/** @var $blade */
echo $blade->make('tags/index', compact('title', 'tags'))->render();