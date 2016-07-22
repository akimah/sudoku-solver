<?php

require_once '../autoload.php';
require_once '../vendor/autoload.php';

$hasPost = isset($_POST[11]);

$loader = new Twig_Loader_Filesystem('../application/view');
$twig = new Twig_Environment($loader);

if ($hasPost) {
    $sudoku = PostConverter::toSudoku($_POST);
    $sudokuEmpty = $sudoku->toArray();
    $sudokuEmpty = $sudokuEmpty->toArray();
    $calculator = new SudokuCalculator($sudoku);
    $calculator->calculate();
    $sudoku = $calculator->getSudoku();
    $sudokuCompleted = $sudoku->toArray();
}

$params = array();
if ($hasPost) {
    $params = ['sudokuEmpty' => $sudokuEmpty, 'sudokuCompleted' => $sudokuCompleted];
    if ($sudoku->isIncompleted())
        $params["error"] = "error";
}

echo $twig->render('index.twig' , $params);