<?php
namespace Money;

class Doller
{
    private $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public function times(int $multiplier) : Doller
    {
        return new self($this->amount * $multiplier);
    }

    public function equals(Doller $doller) : bool
    {
        return $this->amount === $doller->amount;
    }
}

