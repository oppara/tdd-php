<?php
declare(strict_types=1);
namespace Money\Test;

use PHPUnit\Framework\TestCase;
use Money\Money;


class MoneyTest extends TestCase
{
    public function testMultiplication()
    {
        $five = Money::doller(5);
        $this->assertEquals(Money::doller(10), $five->times(2));
        $this->assertEquals(Money::doller(15), $five->times(3));
    }

    public function testEquality()
    {
        $this->assertTrue((Money::doller(3))->equals(Money::doller(3)));
        $this->assertFalse((Money::doller(5))->equals(Money::doller(6)));
        $this->assertTrue((Money::franc(3))->equals(Money::franc(3)));
        $this->assertFalse((Money::franc(5))->equals(Money::franc(6)));
        $this->assertFalse((Money::franc(5))->equals(Money::doller(5)));
    }

    public function testFrancMultiplication()
    {
        $five = Money::franc(5);
        $this->assertEquals(Money::franc(10), $five->times(2));
        $this->assertEquals(Money::franc(15), $five->times(3));
    }

    public function testCurrency()
    {
        $this->assertSame('USD', Money::doller(1)->currency());
        $this->assertSame('CHF', Money::franc(1)->currency());
    }
}

