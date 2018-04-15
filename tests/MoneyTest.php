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
        $this->assertEquals(new Doller(10), $five->times(2));
        $this->assertEquals(new Doller(15), $five->times(3));
    }


    public function testequality()
    {
        $this->assertTrue((new Doller(3))->equals(new Doller(3)));
        $this->assertFalse((new Doller(5))->equals(new Doller(6)));
    }
}

