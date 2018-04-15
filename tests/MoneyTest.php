<?php
declare(strict_types=1);
namespace Money\Test;

use PHPUnit\Framework\TestCase;
use Money\Doller;


class MoneyTest extends TestCase
{
    public function testMultiplication()
    {
        $five = new Doller(5);
        $product = $five->times(2);
        $this->assertSame(10, $product->amount);
        $product = $five->times(3);
        $this->assertSame(15, $product->amount);
    }


    public function testequality()
    {
        $this->assertTrue((new Doller(3))->equals(new Doller(3)));
        $this->assertFalse((new Doller(5))->equals(new Doller(6)));
    }
}

