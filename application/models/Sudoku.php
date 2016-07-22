<?php

class Sudoku implements Observer
{
    const LIMIT_LEFT = 1;
    const LIMIT_RIGHT = 9;
    const LIMIT_TOP = 1;
    const LIMIT_BOTTOM = 9;

    /**
     * @var Cell[]
     */
    private $cells;

    public function __construct(array $values = array())
    {
        $this->cells = array();
        for ($vertical = $this::LIMIT_TOP; $vertical <= $this::LIMIT_BOTTOM; $vertical++) {
            for ($horizontal = $this::LIMIT_LEFT; $horizontal <= $this::LIMIT_RIGHT; $horizontal++) {

                if (!isset($values[$horizontal][$vertical]))
                    $values[$horizontal][$vertical] = 0;

                $position = new Position($horizontal, $vertical);
                $cell = new Cell($position, $values[$horizontal][$vertical]);
                $cell->addObserver($this);
                array_push($this->cells, $cell);

            }
        }

        for ($i = 0; $i < count($this->cells); $i++)
            PossibilityUpdater::updatePossibilities($this, $this->cells[$i]);

    }

    public function __clone()
    {
        $this->cells = array_merge(array(), $this->cells);
    }

    /**
     * @return Cell[]
     */
    public function getCells()
    {
        return $this->cells;
    }

    public function getCell(Position $position)
    {
        foreach ($this->cells as $cell) {
            if ($cell->getPosition()->getHorizontal() == $position->getHorizontal() &&
            $cell->getPosition()->getVertical() == $position->getVertical()) {
                return $cell;
            }
        }
        return null;
    }

    public function getValue(Position $position)
    {
        $cell = $this->getCell($position);
        return $cell->getValue();
    }

    public function isCompleted()
    {
        foreach ($this->cells as $cell){
            if ($cell->isEmpty()) return false;
        }
        return true;
    }

    public function isIncompleted()
    {
        return !$this->isCompleted();
    }

    function update(Observable &$observable)
    {
        if ($observable instanceof Cell) {
            PossibilityUpdater::updatePossibilities($this, $observable);
        }
    }

    public function toArray()
    {
        $sudokuArray = array();
        for ($vertical = 1; $vertical <= 9; $vertical++) {
            $sudokuArray[$vertical] = array();
            for ($horizontal = 1; $horizontal <= 9; $horizontal++) {
                foreach ($this->getCells() as $cell){
                    if ($cell->getPosition()->getVertical() == $vertical &&
                        $cell->getPosition()->getHorizontal() == $horizontal)
                        $currentCell = $cell;
                }
                if (!isset($currentCell)) $currentCell = null;
                $sudokuArray[$vertical][$horizontal] = $currentCell->getValue();
            }
        }
        return $sudokuArray;
    }

}