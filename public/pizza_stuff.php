<?php

interface PizzaInterface
{
    /**
     * @return float
     */
    public function getCost(): float;

    /**
     * @return array
     */
    public function getIngredients(): array;

    /**
     * @return string
     */
    public function getTitle(): string;
}

class ChickenGrill implements PizzaInterface
{
    private $title = 'Chicken Grill';
    private $price = 194;
    private $ingridients = [
        'Сирний соус',
        'Куряче стегно',
        'Смажені печериці',
        'Томати чері',
        'Цибуля фрі',
        'Сир моцарела',
        'Пармезан'
    ];

    public function getCost(): float
    {
        return $this->price;
    }

    public function getIngredients(): array
    {
        return $this->ingridients;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}

class Mexican implements PizzaInterface
{
    private $title = 'Мексиканська';
    private $price = 175;
    private $ingridients = [
        'Вершково-сирний соус',
        'Куряче стегно',
        'Сир моцарела',
        'Сальса з ананасу та кукурузи',
        'Гуакамолє',
        'Чіпси начос',
        'Зелений перець чілі',
        'Кінза'
    ];

    public function getCost(): float
    {
        return $this->price;
    }

    public function getIngredients(): array
    {
        return $this->ingridients;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}

class Munich implements PizzaInterface
{
    private $title = 'Мюнхенська';
    private $price = 285;
    private $ingridients = [
        'Мюнхенські і баварські ковбаски',
        'Пепероні',
        'Томати чері',
        'Солоні огірки',
        'Цибуля',
        'Гострий перець чілі',
        'Сир моцарела і емменталь',
        'Соус пілатті'
    ];

    public function getCost(): float
    {
        return $this->price;
    }

    public function getIngredients(): array
    {
        return $this->ingridients;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}

class PizzaCalculator
{
    public array $order = [];

    public function add(PizzaInterface $pizza)
    {
        array_push($this->order, $pizza);
    }

    public function price()
    {
        $total_price = 0;
        foreach($this->order as $pizza){
            $total_price += $pizza->getCost();
        }
        return 'Total price: ' . $total_price;
    }

    public function ingredients(){
        $ingredients_array = [];
        foreach($this->order as $pizza){
            foreach($pizza->getIngredients() as $ingredient){
                array_push($ingredients_array, $ingredient);
            }
        }
        $ingredients_array_unique = array_unique($ingredients_array);
        return $ingredients_array_unique;
    }
}

$calc = new PizzaCalculator();

$mex1 = new Mexican();
$mex2 = new Mexican();
$chick1 = new ChickenGrill();

$calc->add($mex1);
$calc->add($chick1);
$calc->add($mex2);

//print_r($calc->price());
print_r($calc->ingredients());

