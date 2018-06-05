<?php
declare(strict_types=1);
namespace Money\Test;

use PHPUnit\Framework\TestCase;
use Money\Money;
use Money\Franc;


class MoneyTest extends TestCase
{
    public function testMultiplication()
    {
        $five = Money::doller(5);
        $this->assertTrue((Money::doller(10))->equals($five->times(2)));
        $this->assertTrue((Money::doller(15))->equals($five->times(3)));
    }

    public function testEquality()
    {
        $this->assertTrue((Money::doller(3))->equals(Money::doller(3)));
        $this->assertFalse((Money::doller(5))->equals(Money::doller(6)));
        $this->assertFalse((Money::franc(5))->equals(Money::doller(5)));
    }

    public function testCurrency()
    {
        $this->assertSame('USD', Money::doller(1)->currency());
        $this->assertSame('CHF', Money::franc(1)->currency());
    }

}

