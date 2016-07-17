<?php

class Possibility
{

    private $possibilities;

    public function __construct()
    {
        $this->possibilities = array(1,2,3,4,5,6,7,8,9);
    }

    public function isUnique():bool
    {
        return count($this->possibilities) == 1;
    }

    public function count():int
    {
        return count($this->possibilities);
    }

    public function getPossibilities(): array
    {
        return $this->possibilities;
    }

    public function addPossibility($number)
    {
        array_push($this->possibilities, $number);
    }

    public function removePossibility($number)
    {
        for ($i = 0; $i < count($this->possibilities); $i++) {
            if ($number == $this->possibilities[$i]){
                $offset = $i;
                break;
            }
        }
        if (!isset($offset)) return;
        array_splice($this->possibilities, $offset, 1);
    }

    public function getPossibility($position)
    {
        return $this->possibilities[$position];
    }

}