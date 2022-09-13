<?php

namespace Education\Sandbox;

class Money{
    private $amount;
    private $currency;

    public function __construct($amount, Currency $currency)
    {
        $this->setAmount($amount);
        $this->setCurrency($currency);
    }

    private function setAmount($value)
    {
        if(is_int($value) || is_float($value)){
            if($value > 0) {
                $this->amount = $value;
            } else {
                throw new \InvalidArgumentException('Incorrect value!');
            }
        } else {
            throw new \InvalidArgumentException('Incorrect type of value!');
        }
    }

    public function getAmount()
    {
        return $this->amount;
    }

    private function setCurrency(Currency $currency)
    {
        $this->currency = $currency;
    }

    public function getCurrency()
    {
        return $this->currency->getIsoCode();
    }

    public function equals(Money $another_money)
    {
        if(
            ($this->amount == $another_money->amount)
            && ($this->currency == $another_money->currency)
        ) {
            return true;
        } else {
            return false;
        }
    }

    public function add(Money $another_money)
    {
        if($this->currency->equals($another_money->currency)){
            $this->amount += $another_money->amount;
            echo $this->getAmount();
        } else {
            throw new \InvalidArgumentException('Currencies are not the same!');
        }
    }
}