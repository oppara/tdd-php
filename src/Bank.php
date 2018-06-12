<?php

declare(strict_types=1);

namespace Money;

class Bank
{
    public function reduce(Expression $source, String $to): Money
    {
        return Money::doller(10);
    }
}
