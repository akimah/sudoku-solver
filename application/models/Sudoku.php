<?php

class Sudoku
{

    private $cells;

    public function __construct($values)
    {
        $this->cells = array();
        for ($vertical = 1; $vertical <= 9; $vertical++) {
            for ($horizontal = 1; $horizontal <= 9; $horizontal++) {
                $position = new Position($horizontal, $vertical);
                if (isset($values[$vertical.$horizontal])) {
                    $cell = new Cell($position, $values[$vertical . $horizontal]);
                    array_push($this->cells, $cell);
                }
            }
        }
    }

}