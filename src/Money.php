<?php

declare(strict_types=1);

namespace Money;

class Money implements Expression
{
    public $amount;
    protected $currency;

    public function __construct(int $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function equals(Money $money): bool
    {
        return $this->amount === $money->amount
            && $this->currency() === $money->currency();
    }

    public function times(int $multiplier): Expression
    {
        return new Money($this->amount * $multiplier, $this->currency);
    }

    public function currency(): String
    {
        return $this->currency;
    }

    public function plus(Expression $addend): Expression
    {
        return new Sum($this, $addend);
    }

    public static function doller(int $amount) : Money
    {
        return new Money($amount, 'USD');
    }

    public static function franc(int $amount) : Money
    {
        return new Money($amount, 'CHF');
    }

    public function reduce(Bank $bank, String $to): Money
    {
        $rate = $bank->rate($this->currency, $to);
        return new Money($this->amount / $rate, $to);
    }
}
