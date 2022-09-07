<?php
    class Color{
        private $red;
        private $green;
        private $blue;

        public function __construct($red, $green, $blue){
            $this->setRed($red);
            $this->setGreen($green);
            $this->setBlue($blue);
        }

        private function setRed($red){
            if(is_int($red) || is_float($red)){
                if($red >= 0 && $red <= 255)
                    $this->red = $red;
                else
                    throw new InvalidArgumentException('Значеня красного не в діапазоні! (0-255)');
            }
            else
                $this->red = 0;
        }

        public function getRed(){
            return $this->red;
        }

        private function setGreen($green){
            if(is_int($green) || is_float($green)){
                if($green >= 0 && $green <= 255)
                    $this->green = $green;
                else
                    throw new InvalidArgumentException('Значеня зеленого не в діапазоні! (0-255)');
            }
            else
                $this->green = 0;
        }

        public function getGreen(){
            return $this->green;
        }

        private function setBlue($blue){
            if(is_int($blue) || is_float($blue)){
                if($blue >= 0 && $blue <= 255)
                    $this->blue = $blue;
                else
                    throw new InvalidArgumentException('Значеня синього не в діапазоні! (0-255)');
            }
            else
                $this->blue = 0;
        }

        public function getBlue(){
            return $this->blue;
        }

        public function equals(Color $another_color){
            if($this->red == $another_color->red && $this->green == $another_color->green && $this->blue == $another_color->blue)
                return true;
            else
                return false;
        }

        public static function random(){
            $red = rand(0, 255);
            $green = rand(0, 255);
            $blue = rand(0, 255);
            return new Color($red, $green, $blue);
        }

        public function mix(Color $another_color){
            $mixed_red = ($this->red + $another_color->red)/2;
            $mixed_green = ($this->green + $another_color->green)/2;
            $mixed_blue = ($this->blue + $another_color->blue)/2;

            return new Color($mixed_red, $mixed_green, $mixed_blue);
        }
    }

    $color1 = new Color(125, 134, 228);
    $color2 = new Color(12, 13, 22);

    /*var_dump($color1->equals($color2));*/
    /*var_dump(Color::random());*/
    var_dump($color1->mix($color2));

