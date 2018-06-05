<?php
namespace Money;

class Money
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
            && $this->currency() === $money->currency();
    }

    public function times(int $multiplier) : Money
    {
        return new Money($this->amount * $multiplier, $this->currency);
    }

    public function currency() : String
    {
        return $this->currency;
    }

    public static function doller(int $amount) : Money
    {
        return new Money($amount, 'USD');
    }

    public static function franc(int $amount) : Money
    {
        return new Money($amount, 'CHF');
    }

}

