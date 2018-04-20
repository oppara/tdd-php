<?php
namespace Money;

abstract class Money
{
    protected $amount;
    protected $currency;

    public function __construct(int $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function equals(Money $money) : bool
    {
        return $this->amount === $money->amount
            && get_class($this) === get_class($money);
    }

    public abstract function times(int $multiplier) : Money;

    public function currency() : String
    {
        return $this->currency;
    }

    public static function doller(int $amount) : Money
    {
        return new Doller($amount, 'USD');
    }

    public static function franc(int $amount) : Money
    {
        return new Franc($amount, 'CHF');
    }
}

