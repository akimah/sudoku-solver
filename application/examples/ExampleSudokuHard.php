<?php

class ExampleSudokuHard
{

    /**
     * @return array
     */
    public static function getSudoku()
    {
        $sudoku = array();

        $sudoku [1][4] = "5";
        $sudoku [1][8] = "2";

        $sudoku [2][1] = "7";
        $sudoku [2][2] = "2";
        $sudoku [2][8] = "8";

        $sudoku [3][5] = "3";

        $sudoku [4][3] = "5";
        $sudoku [4][4] = "6";
        $sudoku [4][6] = "9";
        $sudoku [4][8] = "3";
        $sudoku [4][9] = "7";

        $sudoku [5][3] = "8";
        $sudoku [5][6] = "7";
        $sudoku [5][7] = "6";

        $sudoku [6][1] = "4";
        $sudoku [6][7] = "5";

        $sudoku [7][4] = "2";
        $sudoku [7][9] = "8";

        $sudoku [8][1] = "3";
        $sudoku [8][8] = "6";

        $sudoku [9][1] = "6";
        $sudoku [9][4] = "8";
        $sudoku [9][6] = "3";
        $sudoku [9][7] = "9";


        return $sudoku;
    }

}