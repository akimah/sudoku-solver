<?php

class Sudoku
{
    const LIMIT_LEFT = 1;
    const LIMIT_RIGHT = 9;
    const LIMIT_TOP = 1;
    const LIMIT_BOTTOM = 9;

    private $cells;

    public function __construct(array $values = array())
    {
        $this->cells = array();
        for ($vertical = 1; $vertical <= 9; $vertical++) {
            for ($horizontal = 1; $horizontal <= 9; $horizontal++) {
                if (!isset($values[$horizontal][$vertical])) $values[$horizontal][$vertical] = 0;
                $position = new Position($horizontal, $vertical);
                $cell = new Cell($position, $values[$horizontal][$vertical]);
                array_push($this->cells, $cell);
            }
        }
    }

    public function getCells(): array
    {
        return $this->cells;
    }

    public function getCell(Position $position): Cell
    {
        foreach ($this->cells as $cell) {
            if ($cell instanceof Cell) {
                if ($cell->getPosition()->getHorizontal() == $position->getHorizontal() &&
                $cell->getPosition()->getVertical() == $position->getVertical()) {
                    return $cell;
                }
            }
        }
        return null;
    }

    public function getValue(Position $position):int
    {
        $cell = $this->getCell($position);
        return $cell->getValue();
    }

    function printSudokuWithClass($title)
    {
        echo "<div class='container sub-container'>";
        echo "<h2>" . $title . "</h2>";
        echo "<table>";
        for ($i = 1; $i <= 9; $i++) {
            echo "<tr>";

            for ($j = 1; $j <= 9; $j++) {
                echo "<td class='";
                if ($i == 3 || $i == 6 || $i == 9)
                    echo 'bottom-strong ';
                if ($j == 3 || $j == 6 || $j == 9)
                    echo 'right-strong ';
                if ($j == 1)
                    echo 'left-strong ';
                if ($i == 1)
                    echo 'top-strong ';
                echo "'>";

                // GET CURRENT CELL
                $currentCell = $this->getCell(new Position($i, $j));
                if ($currentCell->isFilled())
                    echo $currentCell->getValue();
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    }

}