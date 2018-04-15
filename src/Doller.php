<?php
namespace Money;

class Doller
{
    public $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public function times(int $multiplier) : Doller
    {
        return new self($this->amount * $multiplier);
    }
}

