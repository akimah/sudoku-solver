<?php

class ExampleSudoku
{

    /**
     * @return array
     */
    public static function getSudoku():array
    {
        $sudoku = array();
        $sudoku [2][3] = "2";
        $sudoku [3][2] = "4";

        $sudoku [6][1] = "1";
        $sudoku [6][2] = "8";
        $sudoku [4][3] = "7";
        $sudoku [5][3] = "9";

        $sudoku [7][2] = "5";
        $sudoku [8][3] = "1";

        $sudoku [3][4] = "8";
        $sudoku [3][5] = "7";
        $sudoku [1][6] = "4";
        $sudoku [2][6] = "3";

        $sudoku [5][4] = "1";
        $sudoku [4][5] = "8";
        $sudoku [6][5] = "5";
        $sudoku [5][6] = "6";

        $sudoku [8][4] = "6";
        $sudoku [9][4] = "2";
        $sudoku [7][5] = "3";
        $sudoku [7][6] = "7";

        $sudoku [2][7] = "8";
        $sudoku [3][8] = "5";

        $sudoku [5][7] = "7";
        $sudoku [6][7] = "2";
        $sudoku [4][8] = "4";
        $sudoku [4][9] = "1";

        $sudoku [8][7] = "5";
        $sudoku [7][8] = "1";

        return $sudoku;
    }

}