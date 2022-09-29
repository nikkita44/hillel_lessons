<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/database.php';

use Nico44\Models\Category;
use Nico44\Models\Post;
use Nico44\Models\Tag;

/* 1
$category1 = new Category();
$category1->title = "Blog";
$category1->slug = "Category for blogs..";
$category1->save();

$category2 = new Category();
$category2->title = "Sci-fi";
$category2->slug = "Category for science fictions..";
$category2->save();

$category3 = new Category();
$category3->title = "Story";
$category3->slug = "Category for stories..";
$category3->save();

$category4 = new Category();
$category4->title = "Advice";
$category4->slug = "Category for advices..";
$category4->save();

$category5 = new Category();
$category5->title = "Comedy";
$category5->slug = "Category for comedies..";
$category5->save();
*/

/* 2
$category2 = Category::find(5);
$category2->title = "Stories & Fanfics";
$category2->slug = "Category for stories and fanfics..";
$category2->save();
*/

/* 3
$category2 = Category::find(7);
$category2->delete();
*/

/* 4
function postCreation($title, $slug, $body, $cat_id)
{
    $post = new Post();
    $post->title = $title;
    $post->slug = $slug;
    $post->body = $body;
    $post->category_id = $cat_id;
    $post->save();
}

postCreation("Blog #1", "Blog post", "Some post.. kinda blog..", 3);
postCreation("Advice #1", "Advice post", "Some new advices", 6);
postCreation("Blog #2", "Blog post", "New blog post", 3);
postCreation("Fanfic #1", "Fanfic post", "Fresh fanfic", 5);
postCreation("Fanfic #2", "Fanfic post", "Fresh fanfic X2", 5);
postCreation("Blog #3", "Blog post", "Extra blog", 3);
postCreation("Story #2", "Story post", "Some story", 5);
postCreation("Sci-Fi #1", "Sci-Fi post", "Smart staff", 4);
postCreation("Blog #4", "Blog post", "One more blog", 3);
postCreation("Sci-Fi #2", "Sci-Fi post", "+sci-fi", 4);
*/

/* 5
$post = Post::find(24);
$post->title = 'Advice #2';
$post->slug = 'Advice Post';
$post->body = 'Some new advices';
$post->category_id = 6;
$post->save();
*/

/* 6
$post = Post::find(27);
$post->delete();
*/

/* 7
function tagCreation($title, $slug)
{
    $tag2 = new Tag();
    $tag2->title = $title;
    $tag2->slug = $slug;
    $tag2->save();
}

tagCreation('Animals', 'Tag about animals');
tagCreation('News', 'Tag about news');
tagCreation('Sport', 'Tag about sport');
tagCreation('Education', 'Tag about education');
tagCreation('Films', 'Tag about films');
tagCreation('Superheroes', 'Tag about superheroes');
tagCreation('Music', 'Tag about music');
tagCreation('Medicine', 'Tag about medicine');
tagCreation('IT', 'Tag about IT (Top!!!)');
tagCreation('Technologies', 'Tag about technologies');
*/

/* 8
$posts = Post::all();
foreach($posts as $post){
    $tag_a = rand(14, 23);
    $tag_b = rand(14, 23);
    $tag_c = rand(14, 23);
    $post->tags()->attach([$tag_a, $tag_b, $tag_c]);
}
*/


