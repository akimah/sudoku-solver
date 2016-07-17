<?php
    $sudokuWithClass = new Sudoku(ExampleSudoku::getSudoku());
    $sudokuWithClass->printSudokuWithClass("Sudoku con Clase!");
    $calculator = new SudokuCalculator($sudokuWithClass);
    $calculator->calculate();
    $sudokuWithClass->printSudokuWithClass("Sudoku con Clase Procesado!");
?>


<?php

function calculateSudoku2($sudoku, $cellPosibilities, $numberFounded)
{
    //COMPROBAR CUADRANTES
    /*
    if (isset($cellPosibilities[$i][$j]))
    {
        $notExclusive = false;
        if (($i>6 && $i<=9) && ($j>6 && $j<=9))
        {
            for ($f=7; $f<=9; $f++)
            {
                for ($c=7; $c<=9; $c++)
                {
                    if ($f != $i && $notExclusive == false && isset($cellPosibilities[$f][$c]))
                    {
                        $notExclusive = in_array($cellPosibilities[$i][$j][$k], $cellPosibilities[$f][$c]);
                        echo "Celda ".$f.$c." ";
                        echo print_r($cellPosibilities[$f][$c])."<br>";
                    }
                }
            }
            if ($notExclusive == false && isset($cellPosibilities[$i][$j][$k]))
            {
                echo "EXITO";
                $sudoku[$i][$j] = $cellPosibilities[$i][$j][$k];
                $numberFounded = true;
                unset($cellPosibilities[$i][$j]);
            }
        }
    }*/
}

function calculateSudokuCol($sudoku, $cellPosibilities, $numberFounded)
{
    global $sudoku;
    global $cellPosibilities;
    global $numberFounded;

    for ($i = 1; $i <= 9; $i++) {
        for ($j = 1; $j <= 9; $j++) {
            if (!isset ($sudoku[$i][$j]) || $sudoku[$i][$j] == 0) {
                for ($k = 0; $k < count($cellPosibilities[$i][$j]); $k++) {

                    //COMPROBAR COLUMNA
                    $notExclusive = false;
                    for ($c = 1; $c <= 9; $c++) {
                        if ($c != $j && $notExclusive == false && isset($cellPosibilities[$i][$c]))
                            $notExclusive = in_array($cellPosibilities[$i][$j][$k], $cellPosibilities[$i][$c]);
                    }
                    if ($notExclusive == false) {
                        $sudoku[$i][$j] = $cellPosibilities[$i][$j][$k];
                        $numberFounded = true;
                        unset($cellPosibilities[$i][$j]);
                    }
                }
            }
        }
    }
}

function calculateSudokuRow($sudoku, $cellPosibilities, $numberFounded)
{
    global $sudoku;
    global $cellPosibilities;
    global $numberFounded;

    for ($i = 1; $i <= 9; $i++) {
        for ($j = 1; $j <= 9; $j++) {
            if (!isset ($sudoku[$i][$j]) || $sudoku[$i][$j] == 0) {
                for ($k = 0; $k < count($cellPosibilities[$i][$j]); $k++) {

                    //COMPROBAR FILA
                    $notExclusive = false;
                    for ($f = 1; $f <= 9; $f++) {
                        if ($f != $i && $notExclusive == false && isset($cellPosibilities[$f][$j]))
                            $notExclusive = in_array($cellPosibilities[$i][$j][$k], $cellPosibilities[$f][$j]);
                    }
                    if ($notExclusive == false) {
                        $sudoku[$i][$j] = $cellPosibilities[$i][$j][$k];
                        $numberFounded = true;
                        unset($cellPosibilities[$i][$j]);
                    }
                }
            }
        }
    }
}

?>
