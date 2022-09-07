<?php

class Pen{
    private $ink_color;
    private $ink_level = 100;

    public function __construct($color){
        $this->setInkColor($color);
    }

    private function setInkColor($ink_color){
        if(is_string($ink_color) && ($ink_color == 'Black' || $ink_color == 'Blue' || $ink_color == 'Red'))
            $this->ink_color = $ink_color;
        else if(is_string($ink_color) && !($ink_color == 'Black' || $ink_color == 'Blue' || $ink_color == 'Red')){
            echo 'This ink color is not allowed! You can use only Black, Blue or Red!';
            throw new InvalidArgumentException('Wrong ink_color value!');
        }
        else
            throw new InvalidArgumentException('Wrong ink_color value!');
    }

    public function getInkColor(){
        return $this->ink_color;
    }

    private function refill(){
        $this->ink_level = 100;
        echo 'Your pen is refilled!<br><br>';
    }

    public function changeColor($new_color){
        if($this->ink_color == $new_color)
            echo "Your inks are already $new_color..<br>------<br><br>";
        else {
            $this->setInkColor($new_color);
            echo "Now your pen color is $new_color!<br>------<br><br>";
        }
    }

    public function write($words){
        if(is_int($words)){
            $inks_left = $this->ink_level;
            $this->ink_level -= $words; //1 слово = 1% чорнил
            echo "Writing $words words...<br><br>";
            if($this->ink_level >= 0)
                echo "You`ve successfully written $words words, now your ink level is $this->ink_level%!<br>------<br><br>";
            else {
                echo "You`ve successfully written $inks_left words, now your ink level is 0%! <br>";
                echo "Oops.. seems like your pen is out of inks.. I will refill it one moment! <br>";
                $this->refill();

                $words_left = $words - $inks_left;
                echo "Keep writing $words_left more words..<br>";
                $this->write($words_left);
            }
        }
        else{
            throw new InvalidArgumentException('Wrong quantity of words value!');
        }
    }
}

$pen = new Pen('Blue');
/*var_dump($pen->getInkColor());*/
$pen->write(190);
$pen->changeColor('Red');

$pen->write(20);
