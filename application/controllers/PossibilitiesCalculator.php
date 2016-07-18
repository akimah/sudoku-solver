<?php

class PossibilitiesCalculator
{
    public static function getHorizontal(Sudoku $sudoku, Cell &$cell): Possibility
    {
        $allPossibilities = new Possibility();
        for ($horizontal = Sudoku::LIMIT_LEFT; $horizontal <= Sudoku::LIMIT_RIGHT; $horizontal++) {
            if ($horizontal == $cell->getPosition()->getHorizontal()) $horizontal++;
            if ($horizontal > Sudoku::LIMIT_RIGHT) break;
            $currentPosition = new Position($horizontal, $cell->getPosition()->getVertical());
            $currentCell = $sudoku->getCell($currentPosition);
            $allPossibilities->addPossibilites($currentCell->getPossibility()->getPossibilities());
        }
        return $allPossibilities;
    }

    public static function getVertical(Sudoku $sudoku, Cell &$cell): Possibility
    {
        $allPossibilities = new Possibility();
        for ($vertical = Sudoku::LIMIT_TOP; $vertical <= Sudoku::LIMIT_BOTTOM; $vertical++) {
            if ($vertical == $cell->getPosition()->getVertical()) $vertical++;
            if ($vertical > Sudoku::LIMIT_RIGHT) break;
            $currentPosition = new Position($cell->getPosition()->getHorizontal(), $vertical);
            $currentCell = $sudoku->getCell($currentPosition);
            $allPossibilities->addPossibilites($currentCell->getPossibility()->getPossibilities());
        }
        return $allPossibilities;
    }

    public static function getQuadrant(Sudoku $sudoku, Cell &$cell): Possibility
    {
        $allPossibilities = new Possibility();
        $quadrant = $cell->getPosition()->getQuadrant();
        for ($vertical = $quadrant->getLimitTop(); $vertical <= $quadrant->getLimitBottom(); $vertical++) {
            for ($horizontal = $quadrant->getLimitLeft(); $horizontal <= $quadrant->getLimitRight(); $horizontal++) {
                if ($vertical != $cell->getPosition()->getVertical() || $horizontal != $cell->getPosition()->getHorizontal()) {
                    $currentPosition = new Position($cell->getPosition()->getHorizontal(), $vertical);
                    $currentCell = $sudoku->getCell($currentPosition);
                    $allPossibilities->addPossibilites($currentCell->getPossibility()->getPossibilities());
                }
            }
        }
        return $allPossibilities;
    }
}