<?php

class SudokuCalculator
{

    private $sudoku;

    function __construct(Sudoku &$sudoku)
    {
        $this->sudoku = $sudoku;
    }

    function updatePossibilities(Cell &$cellToCheck)
    {
        $this->removeNumbersInRow($cellToCheck);
        $this->removeNumbersInColumn($cellToCheck);
        $this->removeNumbersInQuadrant($cellToCheck);
    }

    function removeNumbersInRow(Cell &$cell)
    {
        $currentVertical = $cell->getPosition()->getVertical();
        for ($horizontal = Sudoku::LIMIT_LEFT; $horizontal <= Sudoku::LIMIT_RIGHT; $horizontal++) {
            $currentPosition = new Position($horizontal, $currentVertical);
            $currentCell = $this->sudoku->getCell($currentPosition);
            if ($currentCell->isFilled()) {
                $cell->getPossibility()->removePossibility($currentCell->getValue());
            }
        }
    }

    function removeNumbersInColumn(Cell &$cell)
    {
        $currentHorizontal = $cell->getPosition()->getHorizontal();
        for ($vertical = Sudoku::LIMIT_TOP; $vertical <= Sudoku::LIMIT_BOTTOM; $vertical++) {
            $currentPosition = new Position($currentHorizontal, $vertical);
            $currentCell = $this->sudoku->getCell($currentPosition);
            if ($currentCell->isFilled()) {
                $cell->getPossibility()->removePossibility($currentCell->getValue());
            }
        }
    }

    function removeNumbersInQuadrant(Cell &$cell)
    {
        $quadrant = $cell->getPosition()->getQuadrant();

        for ($horizontal = $quadrant->getLimitLeft(); $horizontal <= $quadrant->getLimitRight(); $horizontal++) {
            for ($vertical = $quadrant->getLimitTop(); $vertical <= $quadrant->getLimitBottom(); $vertical++) {
                $currrentPosition = new Position($horizontal, $vertical);
                $currentCell = $this->sudoku->getCell($currrentPosition);
                if ($currentCell->isFilled()) {
                    $cell->getPossibility()->removePossibility($currentCell->getValue());
                }
            }
        }
    }

    function isOnlyOnePossibility($array):bool
    {
        return count($array) == 8;
    }

    function getMissingNumber($array):int
    {
        for ($i = 1; $i <= 9; $i++) {
            if (!in_array($i, $array)) {
                return $i;
            }
        }
        return -1;
    }

    function addNumberFound(&$array, $number)
    {
        if (!in_array($number, $array)) {
            array_push($array, $number);
        }
    }

    function calculate()
    {
        //CALCULO SUDOKU
        $numberFounded = true;
        while ($numberFounded) {
            $numberFounded = false;
            //RECORRO TODAS LAS CELDAS
            for ($horizontal = Sudoku::LIMIT_LEFT; $horizontal <= Sudoku::LIMIT_RIGHT; $horizontal++) {
                for ($vertical = Sudoku::LIMIT_TOP; $vertical <= Sudoku::LIMIT_BOTTOM; $vertical++) {

                    $currentPosition = new Position($horizontal, $vertical);
                    $cellToCheck = $this->sudoku->getCell($currentPosition);

                    if ($cellToCheck->isEmpty()) {

                        // ACTUALIZO LAS POSIBILIDADES DE LA CELDA
                        $this->updatePossibilities($cellToCheck);

                        if ($cellToCheck->getPossibility()->isUnique())
                            $numberFounded = true;
                        $cellToCheck->setValueIfUnique();

                    }
                }
            }

        }
    }

}