<?php

class PostConverter
{
    public static function toSudoku($values):Sudoku
    {
        $sudokuArray = array();

        for ($horizontal = 1; $horizontal <= 9; $horizontal++) {
            $sudokuArray[$horizontal] = array();
            array_push($sudokuArray[$horizontal], 0);
            for ($vertical = 1; $vertical <= 9; $vertical++) {
                if (isset($values[$horizontal . $vertical])) {
                    array_push($sudokuArray[$horizontal], $values[$horizontal . $vertical]);
                } else {
                    $sudokuArray[$vertical][$horizontal] = 0;
                }
            }
        }

        $sudoku = new Sudoku($sudokuArray);
        return $sudoku;
    }
}