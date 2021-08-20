<?php

namespace Tests\Unit;

use App\Models\Math;
use PHPUnit\Framework\TestCase;

class MathTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        // arrange
        $math = new Math();

        // act
        $result1 = $math->calculate('2+3-8/4'); // 3
        $result2 = $math->calculate('5*2/2-3'); // 2
        $result3 = $math->calculate('7-5*2/2'); // 2

        // assert
        $this->assertEquals($result1, 3);
        $this->assertEquals($result2, 2);
        $this->assertEquals($result3, 2);
    }
}
