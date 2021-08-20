<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Rover: Position and Location => (x, y, Z), where Z in {N, E, W, S}
// Plateau: Grid of positions => (x, y, Z), where (0, 0, N) => (x=0, y=0, Z=N)
//          MaximumCoordinates => (maxX maxY) = (5 5)
//          
// Message: (aaaaaa) => a in (L=SpinLeft, R=SpinRight, M=MoveForward)
// Input = 5 lines:
// 1. Plateau Size (5 5) 
// 2. Array of RoverInstruction object, where RoverInstruction object contains:
//      a. RoverPosition => (first line)
//      b. RoverCommand => (second line)

// Expected Behaviours:
// 1. Rover should spin left
// 2. Rover should spin right
// 3. Rover should step forward
// 4. Rover Should Move 


class MarsRoverController extends Controller
{

}
