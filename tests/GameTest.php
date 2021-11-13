<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

class Grid{
    function setSquare(int $value, int $col, int $row){
        if($value < 1 || $value > 9){
            throw new \Exception("Only numbers from 1 through to 9 can be used");
        }
    }
}

class GameTest extends TestCase{

    public function testNumberMustBeGreaterOrEqualToOne(){
        $this->expectExceptionMessage("Only numbers from 1 through to 9 can be used");
        $grid = new Grid();
        $grid->setSquare(0, 0, 1);
    }

    public function testNumberMustBeLowerOrEqualToNine(){
        $this->expectExceptionMessage("Only numbers from 1 through to 9 can be used");
        $grid = new Grid();
        $grid->setSquare(10, 0, 1);
    }
}