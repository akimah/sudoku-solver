<?php

SudokuForm::print();
$sudoku = new Sudoku(ExampleSudokuHardv2::getSudoku());
SudokuPrinter::print($sudoku, "Estado inicial");
$calculator = new SudokuCalculator($sudoku);
$calculator->calculate();
SudokuPrinter::print($sudoku, "Finalizado");