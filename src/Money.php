<?php
namespace Money;

abstract class Money
{
    protected $amount;

    public function equals(Money $money) : bool
    {
        return $this->amount === $money->amount
            && get_class($this) === get_class($money);
    }

    public abstract function times(int $multiplier) : Money;

    public static function doller(int $amount) : Money
    {
        return new Doller($amount);
    }

    public static function franc(int $amount) : Money
    {
        return new Franc($amount);
    }
}

