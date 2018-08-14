<?php

declare(strict_types=1);

namespace Money;

class Pair
{
    private $from;
    private $to;

    public static function create(String $from, String $to): String
    {
        return (string) new self($from, $to);
    }

    private function __construct(String $from, String $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function __toString(): String
    {
        return $this->from . $this->to;
    }
}
