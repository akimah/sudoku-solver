<?php

class PossibilityUpdater
{

    static function updatePossibilities(Sudoku &$sudoku, Cell &$cell)
    {
        self::updateHorizontal($sudoku, $cell);
        self::updateVertical($sudoku, $cell);
        self::updateQuadrant($sudoku, $cell);
        self::updateCell($cell);
    }

    private static function updateHorizontal(Sudoku &$sudoku, Cell &$cell)
    {
        $horizontal = $cell->getPosition()->getHorizontal();
        for ($vertical = Sudoku::LIMIT_TOP; $vertical <= Sudoku::LIMIT_BOTTOM; $vertical++) {
            $sudoku->getCell(new Position($horizontal, $vertical))->getPossibility()->removePossibility($cell->getValue());
        }
    }

    private static function updateVertical(Sudoku &$sudoku, Cell &$cell)
    {
        $vertical = $cell->getPosition()->getVertical();
        for ($horizontal = Sudoku::LIMIT_TOP; $horizontal <= Sudoku::LIMIT_BOTTOM; $horizontal++) {
            $sudoku->getCell(new Position($horizontal, $vertical))->getPossibility()->removePossibility($cell->getValue());
        }
    }

    private static function updateQuadrant(Sudoku &$sudoku, Cell &$cell)
    {
        $quadrant = $cell->getPosition()->getQuadrant();
        for ($vertical = $quadrant->getLimitTop(); $vertical <= $quadrant->getLimitBottom(); $vertical++) {
            for ($horizontal = $quadrant->getLimitLeft(); $horizontal <= $quadrant->getLimitRight(); $horizontal++) {
                $sudoku->getCell(new Position($horizontal, $vertical))->getPossibility()->removePossibility($cell->getValue());
            }
        }
    }

    private static function updateCell(Cell &$cell)
    {
        if ($cell->isFilled())
            $cell->getPossibility()->removePossibilities();
    }

}