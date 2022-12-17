<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class FirstTest extends TestCase
{
    public function test_multiplication_of_two_number(){
        $a=4;
        $b=5;
        $c=$a*$b;
        $this->assertEquals($c,20);
    }
}
