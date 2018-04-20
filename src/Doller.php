<?php
namespace Money;

class Doller extends Money
{
    public function __construct(int $amount, string $currency)
    {
        parent::__construct($amount, $currency);
    }

    public function times(int $multiplier) : Money
    {
        return Money::doller($this->amount * $multiplier);
    }
}

