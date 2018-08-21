<?php

declare(strict_types=1);

namespace Money;

class Bank
{
    private $rates;
    public function __construct()
    {
        $this->rates = new FakeHashMap();
    }

    public function reduce(Expression $source, String $to): Money
    {
        return $source->reduce($this, $to);
    }

    public function addRate(String $from, String $to, Int $rate): void
    {
        $this->rates->put(Pair::create($from, $to), $rate);
    }

    public function rate(String $from, String $to): Int
    {
        if ($from === $to) {
            return 1;
        }

        return $this->rates->get(Pair::create($from, $to));
    }
}
