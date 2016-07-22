<?php

class SudokuCalculator implements Observer
{

    private $sudoku;
    private $hasChanged;

    function __construct(Sudoku $sudoku)
    {
        $this->sudoku = clone $sudoku;
        foreach ($this->sudoku->getCells() as $cell) {
            if ($cell instanceof Cell) {
                $cell->addObserver($this);
            }
        }
        $this->hasChanged = true;
    }

    function calculate()
    {
        $this->assign($this->sudoku);

        $n = 0;
        while ($this->sudoku->isIncompleted() && $n < 1000) {
            $this->randomSolution();
            $n++;
        }
    }

    private function assign(Sudoku &$sudoku)
    {
        while ($this->hasChanged) {
            $this->hasChanged = false;
            $this->assignSimple($sudoku);
            $this->assignByPossibilityHorizontal($sudoku);
            $this->assignByPossibilityVertical($sudoku);
            $this->assignByPossibilityQuadrant($sudoku);
        }
        $this->hasChanged = true;
    }

    private function assignSimple(Sudoku &$sudoku)
    {
        foreach ($sudoku->getCells() as $cell) {
            if ($cell instanceof Cell)
                $cell->setValueIfUnique();
        }
    }

    private function assignByPossibilityHorizontal(Sudoku &$sudoku)
    {
        foreach ($sudoku->getCells() as $cell) {
            if (!$cell instanceof Cell) return;
            $allPossibilities = PossibilitiesCalculator::getHorizontal($sudoku, $cell);
            foreach ($cell->getPossibility()->getPossibilities() as $possibility) {
                if ($allPossibilities->notExists($possibility)) {
                    $cell->setValue($possibility);
                    return;
                }
            }
        }
    }

    private function assignByPossibilityVertical(Sudoku &$sudoku)
    {
        foreach ($sudoku->getCells() as $cell) {
            if (!$cell instanceof Cell) return;
            $allPossibilities = PossibilitiesCalculator::getVertical($sudoku, $cell);
            foreach ($cell->getPossibility()->getPossibilities() as $possibility) {
                if ($allPossibilities->notExists($possibility)) {
                    $cell->setValue($possibility);
                    return;
                }
            }
        }
    }

    private function assignByPossibilityQuadrant(Sudoku &$sudoku)
    {
        foreach ($sudoku->getCells() as $cell) {
            if (!$cell instanceof Cell) return;
            $allPossibilities = PossibilitiesCalculator::getQuadrant($sudoku, $cell);
            foreach ($cell->getPossibility()->getPossibilities() as $possibility) {
                if ($allPossibilities->notExists($possibility)) {
                    $cell->setValue($possibility);
                    return;
                }
            }
        }
    }

    function update(Observable &$observable)
    {
        $this->hasChanged = true;
    }

    public function getSudoku()
    {
        return $this->sudoku;
    }

    private function randomSolution()
    {
        $sudoku = new Sudoku($this->sudoku->toArray());
        foreach ($sudoku->getCells() as $cell) {
            if (!$cell instanceof Cell) break;
            if ($cell->isEmpty()) {
                if ($cell->getPossibility()->count() == 0) return;
                $value = $cell->getPossibility()
                    ->getPossibility(rand(0, $cell->getPossibility()->count() - 1));
                $cell->setValue($value);
                $this->assign($sudoku);
            }
        }
        $cell = $sudoku->getCell(new Position(1, 4));
        if ($cell instanceof Cell)
            echo $cell->getValue();
        if ($sudoku->isCompleted()) {
            $this->sudoku = $sudoku;
        }
    }

}