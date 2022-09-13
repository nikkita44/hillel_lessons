<?php

namespace Education\Sandbox;

class Currency{
    private $isoCode;

    public function __construct($isoCode)
    {
        $this->setIsoCode($isoCode);
    }

    private function setIsoCode($value)
    {
        $currency = [
            'USD',
            'EUR',
            'UAH',
            'GBP',
            'JPY'
        ];
        if(!in_array($value, $currency)) {
            throw new \InvalidArgumentException('Invalid format!');
        } else {
            $this->isoCode = $value;
        }
    }

    public function getIsoCode()
    {
        return $this->isoCode;
    }

    public function equals(Currency $another_currency)
    {
        if($this->isoCode == $another_currency->isoCode) {
            return true;
        } else {
            return false;
        }
    }
}
