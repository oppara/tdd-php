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
        $five->times(2);
        $this->assertSame(10, $five->amount);
    }


}

