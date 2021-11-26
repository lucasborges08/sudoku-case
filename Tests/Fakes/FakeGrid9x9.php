<?php declare(strict_types=1);

namespace Tests\Fakes;

use Game\App\Core\Interfaces\GridBuilder;
use Game\App\Core\Square;

class FakeGrid9x9 implements GridBuilder{

    protected $firstNumber;

    public function getNewGrid(){
        return [
            [5,3,null,null,7,null,null,null,null],
            [6,null,null,1,9,5,null,null,null],
            [null,9,8,null,null,null,null,6,null],
            [8,null,null,null,6,null,null,null,3],
            [4,null,null,8,null,3,null,null,1],
            [7,null,null,null,2,null,null,null,6],
            [null,6,null,null,null,null,2,8,null],
            [null,null,null,4,1,9,null,null,5],
            [null,null,null,null,8,null,null,7,9]
        ];
    }
}