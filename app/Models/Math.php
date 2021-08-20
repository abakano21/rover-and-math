<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Math extends Model
{
    use HasFactory;

    /**
     * input: 2+3-8/4
     * currentNumber: 2
     * operation: +
     * currentChar: 2
     * 
     */
    
    public function calculate($s)
    {
        $length = mb_strlen($s);

        if ($length == 0) return 0;
        
        $currentNumber = 0; $lastNumber = 0; $result = 0;
        $sign = '+';

        for ($i = 0; $i < $length; $i++) {

            $currentChar = $s[$i];

            if (intval($currentChar)) {
                $currentNumber = ($currentNumber * 10) + ($currentChar - '0');
            }

            if (!intval($currentChar) && !intval($currentChar) || $i == $length - 1) {
                if ($sign == '+' || $sign == '-') {
                    $result += $lastNumber;
                    $lastNumber = ($sign == '+') ? $currentNumber : -$currentNumber;
                } else if ($sign == '*') {
                    $lastNumber = $lastNumber * $currentNumber;
                } else if ($sign == '/') {
                    $lastNumber = $lastNumber / $currentNumber;
                }
                $sign = $currentChar;
                $currentNumber = 0;
            }
        }
        $result += $lastNumber;
        return $result;  
    }
}

