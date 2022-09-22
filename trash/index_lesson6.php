<?php

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__ . '/config/database.php';

echo __DIR__.'/vendor/autoload.php';

//use Education\Sandbox;
//use Education\Sandbox\Currency;

//require_once 'autoload.php';

//$cat = Category::all();
$new_currency1 = new \Education\Sandbox\Currency('USD');
$new_currency2 = new \Education\Sandbox\Currency('EUR');
/*var_dump($new_currency1->equals($new_currency2));*/

$new_money1 = new \Education\Sandbox\Money(200, $new_currency1);
$new_money2 = new \Education\Sandbox\Money(250, $new_currency1);

/*var_dump($new_money1->equals($new_money2));*/

$new_money1->add($new_money2);
