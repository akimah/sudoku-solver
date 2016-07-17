<?php

class ExampleSudoku
{

    /**
     * @return array
     */
    public static function getSudoku():array
    {
        $sudoku = array();
        $sudoku [3][2] = "2";
        $sudoku [2][3] = "4";

        $sudoku [1][6] = "1";
        $sudoku [2][6] = "8";
        $sudoku [3][4] = "7";
        $sudoku [3][5] = "9";

        $sudoku [2][7] = "5";
        $sudoku [3][8] = "1";

        $sudoku [4][3] = "8";
        $sudoku [5][3] = "7";
        $sudoku [6][1] = "4";
        $sudoku [6][2] = "3";

        $sudoku [4][5] = "1";
        $sudoku [5][4] = "8";
        $sudoku [5][6] = "5";
        $sudoku [6][5] = "6";

        $sudoku [4][8] = "6";
        $sudoku [4][9] = "2";
        $sudoku [5][7] = "3";
        $sudoku [6][7] = "7";

        $sudoku [7][2] = "8";
        $sudoku [8][3] = "5";

        $sudoku [7][5] = "7";
        $sudoku [7][6] = "2";
        $sudoku [8][4] = "4";
        $sudoku [9][4] = "1";

        $sudoku [7][8] = "5";
        $sudoku [8][7] = "1";

        return $sudoku;
    }

}