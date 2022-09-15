<?php
    class A
    {
        protected $a;

        public function __construct($a)
        {
            $this->setA($a);
        }

        protected function setA($value)
        {
            $this->a = $value;
        }

        public function getA()
        {
            return $this->a;
        }
    }

    class B extends A
    {
        private $b;

        public function __construct($a, $b)
        {
            parent::__construct($a);
            $this->setB($b);
        }

        protected function setB($value)
        {
            $this->b = $value;
        }

        public function getB()
        {
            return $this->b;
        }
    }
    $model1 = new A(0);
    $model = new B(10, 20);

    var_dump($model->getA());
    var_dump($model->getB());
    var_dump($model1->getA());