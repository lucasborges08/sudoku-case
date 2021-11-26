<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Game\App\Core\Grid9x9;
use Game\App\Core\Grid;
use Tests\Fakes\FakeGrid9x9;

class GameRulesTest extends TestCase{

    public function testNumberMustBeGreaterOrEqualToOne(){
        $this->expectExceptionMessage("Only numbers from 1 through to 9 can be used");
        $grid = new Grid(new Grid9x9());
        $grid->setSquare(0, 0, 1);
    }

    public function testNumberMustBeLowerOrEqualToNine(){
        $this->expectExceptionMessage("Only numbers from 1 through to 9 can be used");
        $grid = new Grid(new Grid9x9());
        $grid->setSquare(10, 0, 1);
    }

    public function testInitialNumbersCannotBeOverwritten(){
        $this->expectExceptionMessage("Cannot Overwrite a initial number");

        $fakeGrid9x9 = new FakeGrid9x9();
        $grid = new Grid($fakeGrid9x9);
        $initialNumbers = $grid->getInitialNumbers();
        $firstInitialNumber = each($initialNumbers);

        $rowCol = explode('-', $firstInitialNumber['key']);
        $grid->setSquare(8, intval($rowCol[1]), intval($rowCol[0]));
    }

    public function testSameNumberInColumnMustBeMarkedAsInvalid(){
        $fakeGrid9x9 = new FakeGrid9x9();
        $grid = new Grid($fakeGrid9x9);
        $initialNumbers = $grid->getInitialNumbers();
        $firstInitialNumber = each($initialNumbers);
        $rowCol = explode('-', $firstInitialNumber['key']);

        $col = intval($rowCol[1]);
        $selectedRow = null;
        for($row = 0; $row < 9; $row++){
            if(empty($grid->getGrid()[$row][$col])){
                $selectedRow = $row;
                break;
            }
        }

        $grid->setSquare($firstInitialNumber['value'], $col, $selectedRow);

        $invalidNumbers = $grid->getInvalidSquares();
        $this->assertTrue(array_key_exists("$selectedRow-$col", $invalidNumbers));
    }
}