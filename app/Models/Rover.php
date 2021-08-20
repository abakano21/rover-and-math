<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

class Rover extends Model
{
    use HasFactory;

    public int $x; // x coordinates of the current rover position
    public int $y; // y coordinates of the current rover position
    public string $direction; // cardinal direction of the current rover position

    public function __construct($location) // location 1 2 N
    {
        $this->x = explode(' ', $location)[0];
        $this->y = explode(' ', $location)[1];
        $this->direction = explode(' ', $location)[2];
    }

    public function SpinLeft() : void 
    {
        switch ($this->direction) {
            case 'N':
                $this->direction = "W";
                break;

            case 'E':
                $this->direction = "N";
                break;
        
            case 'S':
                $this->direction = "E";
                break;
            
            case 'W':
                $this->direction = "S";
                break;
            default:
                throw new InvalidArgumentException();
                break;
        }
    }

    public function SpinRight() : void 
    {
        // throw new Exception("Manual Error Processing Request", 1);
        switch ($this->direction) {
            case 'N':
                $this->direction = "E";
                break;

            case 'E':
                $this->direction = "S";
                break;
        
            case 'S':
                $this->direction = "W";
                break;
            
            case 'W':
                $this->direction = "N";
                break;
            default:
                throw new InvalidArgumentException();
                break;
        }
    }

    public function StepForward() : void 
    {
        switch ($this->direction) {
            case 'N':
                $this->y++;
                break;

            case 'E':                
                $this->x++;
                break;
        
            case 'S':
                $this->y--;
                break;
            
            case 'W':
                $this->x--;
                break;
            default:
                throw new InvalidArgumentException();
                break;
        }
    }

    public function Move(string $roverCommand) // "LMLMLMLMM" or "MMRMMRMRRM
    {
        // 
        $instructions = mb_str_split($roverCommand);
        
        // Loop through array. For each letter, call SpinLeft, SpinRight or StepForward as appropriate
        for($i = 0; $i < count($instructions); $i++)
        {
            switch ($instructions[$i]) {
                case 'L':
                    $this->SpinLeft();
                    break;

                case 'R':
                    $this->SpinRight();
                    break;

                case 'M':
                    $this->StepForward();
                    break;

                default:
                    throw new InvalidArgumentException();
                    break;
            }
        }
    }
}
