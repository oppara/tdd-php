<?php
declare(strict_types=1);
namespace Money\Test;

use PHPUnit\Framework\TestCase;
use Money\Money;
use Money\Bank;
use Money\Sum;


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

    public function testSimpleAddtion()
    {
        $five = Money::doller(5);
        $sum = $five->plus($five);
        $bank = new Bank();
        $reduced = $bank->reduce($sum, 'USD');
        $this->assertEquals(Money::doller(10), $reduced);
    }

    public function testPlusReturnsSum()
    {
        $five = Money::doller(5);
        $sum = $five->plus($five);
        $this->assertEquals($five, $sum->augend);
        $this->assertEquals($five, $sum->addend);
    }

    public function testReduceSum()
    {
        $sum = new Sum(Money::doller(3), Money::doller(4));
        $bank = new Bank();
        $result = $bank->reduce($sum, 'USD');
        $this->assertEquals(Money::doller(7), $result);
    }

    public function testReduceMoney()
    {
        $bank = new Bank();
        $result = $bank->reduce(Money::doller(1), 'USD');
        $this->assertEquals(Money::doller(1), $result);
    }

    public function testReduceMoneyDeifferentCurrency()
    {
        $bank = new Bank();
        $bank->addRate('CHF', 'USD', 2);
        $result = $bank->reduce(Money::franc(2), 'USD');
        $this->assertEquals(Money::doller(1), $result);
    }

    public function testIdentifyRate()
    {
        $bank = new Bank();
        $this->assertEquals(1, $bank->rate('USD', 'USD'));
    }
}

