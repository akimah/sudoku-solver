<?php

class ExampleSudokuExtreme
{

    /**
     * @return array
     */
    public static function getSudoku()
    {
        $sudoku = array();

        $sudoku [1][1] = "3";
        $sudoku [1][9] = "9";

        $sudoku [2][2] = "7";
        $sudoku [2][5] = "4";
        $sudoku [2][8] = "3";

        $sudoku [3][3] = "6";
        $sudoku [3][4] = "1";
        $sudoku [3][6] = "3";
        $sudoku [3][7] = "5";

        $sudoku [4][3] = "7";
        $sudoku [4][5] = "3";
        $sudoku [4][7] = "8";

        $sudoku [5][2] = "8";
        $sudoku [5][4] = "2";
        $sudoku [5][6] = "4";
        $sudoku [5][8] = "1";

        $sudoku [6][3] = "5";
        $sudoku [6][5] = "7";
        $sudoku [6][7] = "6";

        $sudoku [7][3] = "2";
        $sudoku [7][4] = "3";
        $sudoku [7][6] = "7";
        $sudoku [7][7] = "4";

        $sudoku [8][2] = "1";
        $sudoku [8][5] = "6";
        $sudoku [8][8] = "2";

        $sudoku [9][1] = "8";
        $sudoku [9][9] = "7";

        return $sudoku;
    }

}