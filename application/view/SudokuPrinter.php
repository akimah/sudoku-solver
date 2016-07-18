<?php

class SudokuPrinter
{
    static function print(Sudoku $sudoku, $title)
    {
        echo "<div class='container sub-container'>";
        echo "<h2>" . $title . "</h2>";
        echo "<table>";
        for ($vertical = 1; $vertical <= 9; $vertical++) {
            echo "<tr>";

            for ($horizontal = 1; $horizontal <= 9; $horizontal++) {
                echo "<td class='";
                if ($vertical == 3 || $vertical == 6 || $vertical == 9)
                    echo 'bottom-strong ';
                if ($horizontal == 3 || $horizontal == 6 || $horizontal == 9)
                    echo 'right-strong ';
                if ($horizontal == 1)
                    echo 'left-strong ';
                if ($vertical == 1)
                    echo 'top-strong ';
                echo "'>";

                // GET CURRENT CELL
                $currentCell = $sudoku->getCell(new Position($horizontal, $vertical));
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