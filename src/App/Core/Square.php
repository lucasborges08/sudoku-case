<?php declare(strict_types=1);

namespace Game\App\Core;

class Square{
    
    private $col;
    private $row;
    private $number;

    public function __construct(int $number, int $col, int $row){
        $this->number = $number;
        $this->col = $col;
        $this->row = $row;
    }

    public function getCol(){
        return $this->col;
    }    

    public function getRow(){
        return $this->row;
    }

    public function setNumber(int $number){
        $this->number = $number;
    }

    public function getNumber(){
        return $this->number;
    }    
}