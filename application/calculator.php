<?php
$sudoku = array();

$sudokuWithClass = new Sudoku($_POST);

//RECIBO LOS DATOS
for ($i = 1; $i <= 9; $i++) {
    for ($j = 1; $j <= 9; $j++) {
        if (isset ($_POST[$i . $j])) {
            $sudoku[$i][$j] = $_POST[$i . $j];
            //echo $sudoku[$i][$j];
        }
    }
}
?>

<?php $sudoku = ExampleSudoku::getSudoku(); ?>

<?php
if (isset ($sudoku)) {
    // DIBUJO SUDOKU SIN PROCESAR
    printSudoku("Sudoku Incompleto", $sudoku);

    // CALCULO SUDOKU
    calculateSudoku($sudoku);

    // DIBUJO SUDOKU TRAS PROCESARLO
    printSudoku("Sudoku Terminado", $sudoku);
}
?>


<?php

// FUNCION DIBUJAR SUDOKU

function printSudoku($title, $sudoku)
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

            if (isset ($sudoku[$i][$j]) && $sudoku[$i][$j] != 0)
                echo $sudoku[$i][$j];
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
}

function addNumberFound($array, $number)
{
    if (!in_array($number, $array)) {
        array_push($array, $number);
    }
    return $array;
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

// FUNCION CALCULAR SUDOKU NUMERO UNICO

function calculateSudoku($sudoku)
{

    global $sudoku;
    global $cellPosibilities;
    global $numberFounded;
    //CALCULO SUDOKU
    $numberFounded = true;
    while ($numberFounded) {
        $numberFounded = false;
        //RECORRO TODAS LAS CELDAS
        for ($i = 1; $i <= 9; $i++) {
            for ($j = 1; $j <= 9; $j++) {

                $currentPosition = new Position($i, $j);
                if (!isset ($sudoku[$i][$j]) || $sudoku[$i][$j] == 0) {
                    //COMIENZO EL TESTEO
                    $tempTest = array();
                    $numbersFound = array();

                    //RECORRO TODA LA FILA EN BUSCA DE NUMEROS
                    for ($f = 1; $f <= 9; $f++) {
                        if (isset ($sudoku[$f][$j])) {
                            $tempTest[$sudoku[$f][$j]] = $sudoku[$f][$j];
                            $numbersFound = addNumberFound($numbersFound, $sudoku[$f][$j]);
                        }
                    }

                    //RECORRO TODA LA COLUMNA EN BUSCA DE NUMEROS
                    for ($c = 1; $c <= 9; $c++) {
                        if (isset ($sudoku[$i][$c])) {
                            $tempTest[$sudoku[$i][$c]] = $sudoku[$i][$c];
                            $numbersFound = addNumberFound($numbersFound, $sudoku[$i][$c]);
                        }
                    }


                    // COMPRUEBO EL CUADRANTE Y AGREGO DICHOS NUMEROS
                    $quadrant = $currentPosition->getQuadrant();

                    for ($f = $quadrant->getLimitLeft(); $f <= $quadrant->getLimitRight(); $f++) {
                        for ($c = $quadrant->getLimitTop(); $c <= $quadrant->getLimitBottom(); $c++) {
                            if (isset ($sudoku[$f][$c])) {
                                $tempTest[$sudoku[$f][$c]] = $sudoku[$f][$c];
                                $numbersFound = addNumberFound($numbersFound, $sudoku[$f][$c]);
                            }
                        }
                    }


                    //COMPRUEBO SI HE DADO CON ALGUN NUMERO
                    unset ($cellPosibilities[$i][$j]);
                    for ($success = 1; $success <= 9; $success++) {
                        if (array_search($success, $tempTest) == null) {
                            $cellPosibilities[$i][$j][] = $success;
                        }
                    }

                    // COMPRUEBO SI HE DADO CON ALGUN NUMERO v2
                    if (isOnlyOnePossibility($numbersFound)) {
                        $sudoku[$i][$j] = getMissingNumber($numbersFound);
                        // TEMPORAL
                        $numberFounded = true;
                        unset($cellPosibilities[$i][$j]);
                    }

                    //LIBERO VARIABLES
                    unset($notfound);
                    unset ($tempTest);
                }
            }
        }

        //calculateSudoku2($sudoku, $cellPosibilities, $numberFounded);
        if ($numberFounded == false)
            calculateSudokuCol($sudoku, $cellPosibilities, $numberFounded);
        if ($numberFounded == false)
            calculateSudokuRow($sudoku, $cellPosibilities, $numberFounded);
    }
}


function calculateSudoku2($sudoku, $cellPosibilities, $numberFounded)
{


    //COMPROBAR CUADRANTES
    /*
    if (isset($cellPosibilities[$i][$j]))
    {
        $notExclusive = false;
        if (($i>6 && $i<=9) && ($j>6 && $j<=9))
        {
            for ($f=7; $f<=9; $f++)
            {
                for ($c=7; $c<=9; $c++)
                {
                    if ($f != $i && $notExclusive == false && isset($cellPosibilities[$f][$c]))
                    {
                        $notExclusive = in_array($cellPosibilities[$i][$j][$k], $cellPosibilities[$f][$c]);
                        echo "Celda ".$f.$c." ";
                        echo print_r($cellPosibilities[$f][$c])."<br>";
                    }
                }
            }
            if ($notExclusive == false && isset($cellPosibilities[$i][$j][$k]))
            {
                echo "EXITO";
                $sudoku[$i][$j] = $cellPosibilities[$i][$j][$k];
                $numberFounded = true;
                unset($cellPosibilities[$i][$j]);
            }
        }
    }*/
}


function calculateSudokuCol($sudoku, $cellPosibilities, $numberFounded)
{
    global $sudoku;
    global $cellPosibilities;
    global $numberFounded;

    for ($i = 1; $i <= 9; $i++) {
        for ($j = 1; $j <= 9; $j++) {
            if (!isset ($sudoku[$i][$j]) || $sudoku[$i][$j] == 0) {
                for ($k = 0; $k < count($cellPosibilities[$i][$j]); $k++) {

                    //COMPROBAR COLUMNA
                    $notExclusive = false;
                    for ($c = 1; $c <= 9; $c++) {
                        if ($c != $j && $notExclusive == false && isset($cellPosibilities[$i][$c]))
                            $notExclusive = in_array($cellPosibilities[$i][$j][$k], $cellPosibilities[$i][$c]);
                    }
                    if ($notExclusive == false) {
                        $sudoku[$i][$j] = $cellPosibilities[$i][$j][$k];
                        $numberFounded = true;
                        unset($cellPosibilities[$i][$j]);
                    }
                }
            }
        }
    }
}

function calculateSudokuRow($sudoku, $cellPosibilities, $numberFounded)
{
    global $sudoku;
    global $cellPosibilities;
    global $numberFounded;

    for ($i = 1; $i <= 9; $i++) {
        for ($j = 1; $j <= 9; $j++) {
            if (!isset ($sudoku[$i][$j]) || $sudoku[$i][$j] == 0) {
                for ($k = 0; $k < count($cellPosibilities[$i][$j]); $k++) {

                    //COMPROBAR FILA
                    $notExclusive = false;
                    for ($f = 1; $f <= 9; $f++) {
                        if ($f != $i && $notExclusive == false && isset($cellPosibilities[$f][$j]))
                            $notExclusive = in_array($cellPosibilities[$i][$j][$k], $cellPosibilities[$f][$j]);
                    }
                    if ($notExclusive == false) {
                        $sudoku[$i][$j] = $cellPosibilities[$i][$j][$k];
                        $numberFounded = true;
                        unset($cellPosibilities[$i][$j]);
                    }
                }
            }
        }
    }
}

?>
