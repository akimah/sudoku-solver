<?php

class SudokuCalculator
{

    private $sudoku;

    private $changes = true;

    function __construct(Sudoku &$sudoku)
    {
        $this->sudoku = $sudoku;
    }

    function calculate()
    {
        while ($this->changes) {
            $this->changes = false;
            for ($horizontal = Sudoku::LIMIT_LEFT; $horizontal <= Sudoku::LIMIT_RIGHT; $horizontal++) {
                for ($vertical = Sudoku::LIMIT_TOP; $vertical <= Sudoku::LIMIT_BOTTOM; $vertical++) {

                    $currentPosition = new Position($horizontal, $vertical);
                    $currentCell = $this->sudoku->getCell($currentPosition);

                    $this->assignByDiscard($currentCell);

                }
            }
        }

        $this->printInformation();

    }

    private function printInformation()
    {
        echo "<table style='font-size: 14px'>";
        foreach ($this->sudoku->getCells() as $cell) {
            if ($cell instanceof Cell) {
                echo "<tr>";
                echo "<td style='width: 100px;'>" . "Valor: " . $cell->getValue() . "</td>";
                echo "<td style='width: 150px;'>" . " Posicion: [ " . $cell->getPosition()->getHorizontal() . ", " . $cell->getPosition()->getVertical() . " ] " . "</td>";
                echo "<td style='width: 300px; text-align: left; padding-left: 10px'>" . " Posibilidades: ";
                foreach ($cell->getPossibility()->getPossibilities() as $p) {
                    echo $p . ", ";
                }
                echo  "</td>";
                echo "</tr>";
            }
        }
        echo "</table>";

    }

    private function assignByDiscard(Cell &$cell)
    {
        if ($cell->getPossibility()->isUnique()) {
            $this->changes = true;
            $cell->setValueIfUnique();
            SudokuPrinter::print($this->sudoku, "Por descarte (Simple)");
        }
    }

}