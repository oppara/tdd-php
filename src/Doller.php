<?php
namespace Money;

class Doller extends Money
{
    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public function times(int $multiplier) : Doller
    {
        return new self($this->amount * $multiplier);
    }
}

