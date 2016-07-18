<?php

class Possibility
{

    private $possibilities;

    public function __construct(array $possibilities = array())
    {
        $this->possibilities = $possibilities;
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

    public function addPossibility($value)
    {
        if ($this->existsPossilibity($value)) return;
        array_push($this->possibilities, $value);
    }

    public function addPossibilites(array $values)
    {
        foreach ($values as $value) {
            $this->addPossibility($value);
        }
    }

    public function removePossibility($value)
    {
        if (!$this->existsPossilibity($value)) return;
        for ($i = 0; $i < count($this->possibilities); $i++) {
            if ($value == $this->possibilities[$i]){
                $offset = $i;
                break;
            }
        }
        if (!isset($offset)) return;
        array_splice($this->possibilities, $offset, 1);
    }

    public function removePossibilities()
    {
        for ($value = 1; $value <= 9; $value++) {
            $this->removePossibility($value);
        }
    }

    public function getPossibility($position)
    {
        return $this->possibilities[$position];
    }

    public function existsPossilibity($value)
    {
        for ($i = 0; $i < count($this->possibilities); $i++) {
            if ($value == $this->possibilities[$i]) {
                return true;
            }
        }
        return false;
    }

}