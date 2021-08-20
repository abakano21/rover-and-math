<?php

namespace Tests\Unit;

use App\Models\Rover;
use PHPUnit\Framework\TestCase;

class RoverShouldTests extends TestCase
{
    /** @test */
    public function spin_left()
    {
        // arrange
        $rover = new Rover("1 2 N");
        // act 
        $rover->SpinLeft();
        // assert
        $this->assertEquals('W', $rover->direction);
    }

    /** @test */
    public function spin_right()
    {
        // arrange
        $rover = new Rover("1 2 N");
        // act 
        $rover->SpinRight();
        // assert
        $this->assertEquals('E', $rover->direction);
    }

    /** @test */
    public function StepForward()
    {
        // arrange
        $rover = new Rover("1 2 S");
        
        // act 
        $rover->StepForward();

        // assert        
        $this->assertEquals(1, $rover->y);
    }

    /** @test */
    public function MoveTest()
    {
        // arrange 
        $rover = new Rover("3 3 E");

        // act 
        $rover->Move("MMRMMRMRRM");

        // Assert 
        $this->assertEquals("5 1 E", $rover->x . " " . $rover->y . " " . $rover->direction);
    }
}
