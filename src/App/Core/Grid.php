<?php declare(strict_types=1); 
namespace Game\App\Core;

use Game\App\Core\Interfaces\GridBuilder;
use Game\App\Core\Square;

class Grid{

    protected $grid;
    protected $initialNumbers;
    protected $invalidSquares;

    function __construct(GridBuilder $gridBuilder){
        $this->initialNumbers = array();
        $this->invalidSquares = array();
        $this->grid = $gridBuilder->getNewGrid();
        $this->storeInitialNumbers();
    }

    private function storeInitialNumbers(){
        $totalRows = count($this->grid);
        $totalCols = count($this->grid[0]);

        for($row = 0; $row < $totalRows; $row++){
            for($col = 0; $col < $totalCols; $col++){
                if($this->grid[$row][$col]){
                    $this->initialNumbers["$row-$col"] = $this->grid[$row][$col];
                }                
            } 
        }
    }

    function getInitialNumbers(){
        return $this->initialNumbers;
    }

    function getGrid(): array{
        return $this->grid;
    }

    function getInvalidSquares(): array{
        return $this->invalidSquares;
    }

    private function markInvalidInColumn(int $col){
        $occurrences = array();
        $rowCount = 0;
        foreach($this->grid as $row){
            $squareNumber = strval($row[$col]);
            if(!$squareNumber){
                continue;
            }
            if(!array_key_exists($squareNumber, $occurrences)){
                $occurrences[$squareNumber] = [];    
            }
            array_push($occurrences[$squareNumber], ['row'=>$rowCount, 'col'=>$col]);
            unset($this->invalidSquares["$rowCount-$col"]);
            $rowCount += 1;
        }

        foreach($occurrences as $occurrence){
            if(count($occurrence) > 1){
                foreach($occurrence as $i){
                    $this->invalidSquares["{$i['row']}-{$i['col']}"] = true;
                }                
            }
        }
    }

    function setSquare(int $value, int $col, int $row){
        if($value < 1 || $value > 9){
            throw new \Exception("Only numbers from 1 through to 9 can be used");
        }

        if(array_key_exists("$row-$col", $this->initialNumbers)){
            throw new \Exception("Cannot Overwrite a initial number");
        }

        $this->grid[$row][$col] = $value;
        $this->markInvalidInColumn($col);
    }
}