<?php
	$sudoku = array ();
	//RECIBO LOS DATOS
	for ($i=1; $i<=9; $i++) {
		for ($j = 1; $j <= 9; $j++) {
			if (isset ($_POST[$i . $j])) {
				$sudoku[$i][$j] = $_POST[$i . $j];
				//echo $sudoku[$i][$j];
			}
		}
	}
?>

<?php

$sudoku = array();
$sudoku [3][2] = "2";
$sudoku [2][3] = "4";

$sudoku [1][6] = "1";
$sudoku [2][6] = "8";
$sudoku [3][4] = "7";
$sudoku [3][5] = "9";

$sudoku [2][7] = "5";
$sudoku [3][8] = "1";

$sudoku [4][3] = "8";
$sudoku [5][3] = "7";
$sudoku [6][1] = "4";
$sudoku [6][2] = "3";

$sudoku [4][5] = "1";
$sudoku [5][4] = "8";
$sudoku [5][6] = "5";
$sudoku [6][5] = "6";

$sudoku [4][8] = "6";
$sudoku [4][9] = "2";
$sudoku [5][7] = "3";
$sudoku [6][7] = "7";

$sudoku [7][2] = "8";
$sudoku [8][3] = "5";

$sudoku [7][5] = "7";
$sudoku [7][6] = "2";
$sudoku [8][4] = "4";
$sudoku [9][4] = "1";

$sudoku [7][8] = "5";
$sudoku [8][7] = "1";

?>


<?php
	if (isset ($sudoku))
	{
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

function printSudoku($title, $sudoku) {
	echo "<div class='container sub-container'>";
		echo "<h2>".$title."</h2>";
		echo "<table>";
		for ($i=1; $i<=9; $i++)
		{
			echo "<tr>";
				
			for ($j=1; $j<=9; $j++)
			{
				echo "<td class='";
				if ($i==3 || $i==6 || $i==9)
					echo 'bottom-strong ';
				if ($j==3 || $j==6 || $j==9)
					echo 'right-strong ';
				if ($j==1)
					echo 'left-strong ';
				if ($i==1)
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


// FUNCION CALCULAR SUDOKU NUMERO UNICO

function calculateSudoku ($sudoku) {
	$cellPosibilities = array();
	global $sudoku;
	global $cellPosibilities;
	global $numberFounded;
	//CALCULO SUDOKU
	$numberFounded = true;
	while ($numberFounded)
	{
		$numberFounded = false;
		//RECORRO TODAS LAS CELDAS
		for ($i=1; $i<=9; $i++)
		{
			for ($j=1; $j<=9; $j++)
			{

				if ( !isset ($sudoku[$i][$j]) || $sudoku[$i][$j] == 0)
				{
					//COMIENZO EL TESTEO
					$tempTest = array();
	
					//RECORRO TODA LA FILA EN BUSCA DE NUMEROS
					for ($f=1; $f<=9; $f++)
					{
						if ( isset ($sudoku[$f][$j]))
							$tempTest[$sudoku[$f][$j]] = $sudoku[$f][$j];
					}
	
					//RECORRO TODA LA COLUMNA EN BUSCA DE NUMEROS
					for ($c=1; $c<=9; $c++)
					{
						if ( isset ($sudoku[$i][$c]))
							$tempTest[$sudoku[$i][$c]] = $sudoku[$i][$c];
					}
	
					//RECORRO TODOS LOS CUADRANTES EN BUSCA DE NUMEROS
					// PRIMERA FILA
					if ($i<=3 && $j<=3)
					{
						for ($f=1; $f<=3; $f++)
						{
							for ($c=1; $c<=3; $c++)
							{
								if ( isset ($sudoku[$f][$c]))
									$tempTest[$sudoku[$f][$c]] = $sudoku[$f][$c];
							}
						}
					}
					if ($i<=3 && ($j>3 && $j<=6))
					{
						for ($f=1; $f<=3; $f++)
						{
							for ($c=4; $c<=6; $c++)
							{
								if ( isset ($sudoku[$f][$c]))
									$tempTest[$sudoku[$f][$c]] = $sudoku[$f][$c];
							}
						}
					}
					if ($i<=3 && ($j>6 && $j<=9))
					{
						for ($f=1; $f<=3; $f++)
						{
							for ($c=7; $c<=9; $c++)
							{
								if ( isset ($sudoku[$f][$c]))
									$tempTest[$sudoku[$f][$c]] = $sudoku[$f][$c];
							}
						}
					}
					//SEGUNDA FILA
					if (($i>3 && $i<=6) && $j<=3)
					{
						for ($f=4; $f<=6; $f++)
						{
							for ($c=1; $c<=3; $c++)
							{
								if ( isset ($sudoku[$f][$c]))
									$tempTest[$sudoku[$f][$c]] = $sudoku[$f][$c];
							}
						}
					}
					if (($i>3 && $i<=6) && ($j>3 && $j<=6))
					{
						for ($f=4; $f<=6; $f++)
						{
							for ($c=4; $c<=6; $c++)
							{
								if ( isset ($sudoku[$f][$c]))
									$tempTest[$sudoku[$f][$c]] = $sudoku[$f][$c];
							}
						}
					}
					if (($i>3 && $i<=6) && ($j>6 && $j<=9))
					{
						for ($f=4; $f<=6; $f++)
						{
							for ($c=7; $c<=9; $c++)
							{
								if ( isset ($sudoku[$f][$c]))
									$tempTest[$sudoku[$f][$c]] = $sudoku[$f][$c];
							}
						}
					}
					//TERCERA FILA
					if (($i>6 && $i<=9) && $j<=3)
					{
						for ($f=7; $f<=9; $f++)
						{
							for ($c=1; $c<=3; $c++)
							{
								if ( isset ($sudoku[$f][$c]))
									$tempTest[$sudoku[$f][$c]] = $sudoku[$f][$c];
							}
						}
					}
					if (($i>6 && $i<=9) && ($j>3 && $j<=6))
					{
						for ($f=7; $f<=9; $f++)
						{
							for ($c=4; $c<=6; $c++)
							{
								if ( isset ($sudoku[$f][$c]))
									$tempTest[$sudoku[$f][$c]] = $sudoku[$f][$c];
							}
						}
					}
					if (($i>6 && $i<=9) && ($j>6 && $j<=9))
					{
						for ($f=7; $f<=9; $f++)
						{
							for ($c=7; $c<=9; $c++)
							{
								if ( isset ($sudoku[$f][$c]))
									$tempTest[$sudoku[$f][$c]] = $sudoku[$f][$c];
							}
						}
					}
	
					//COMPRUEBO SI HE DADO CON ALGUN NUMERO
					$notfound=0;
					unset ($cellPosibilities[$i][$j]);
					for ($success=1; $success<=9; $success++)
					{
						if (array_search($success, $tempTest) == null)
						{
							$notfound++;
							$numbernotfound = $success;
							$cellPosibilities[$i][$j][] = $success;
						}
					}

					// ASIGNO NUMERO ENCONTRADO SI ES UNICO
					if ($notfound == 1)
					{
						$sudoku[$i][$j] = $numbernotfound;
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


function calculateSudoku2 ($sudoku, $cellPosibilities, $numberFounded) {

					
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


function calculateSudokuCol ($sudoku, $cellPosibilities, $numberFounded) {
	global $sudoku;
	global $cellPosibilities;
	global $numberFounded;

	for ($i=1; $i<=9; $i++)
	{
		for ($j=1; $j<=9; $j++)
		{
			if ( !isset ($sudoku[$i][$j]) || $sudoku[$i][$j] == 0)
			{
				for ($k=0; $k<count($cellPosibilities[$i][$j]); $k++)
				{
					
					//COMPROBAR COLUMNA			
					$notExclusive = false;
					for ($c=1; $c<=9; $c++)
					{
						if ($c != $j && $notExclusive == false && isset($cellPosibilities[$i][$c]))
							$notExclusive = in_array($cellPosibilities[$i][$j][$k], $cellPosibilities[$i][$c]);
					}
					if ($notExclusive == false)
					{
						$sudoku[$i][$j] = $cellPosibilities[$i][$j][$k];
						$numberFounded = true;
						unset($cellPosibilities[$i][$j]);
					}			
				}
			}
		}
	}
}

function calculateSudokuRow ($sudoku, $cellPosibilities, $numberFounded) {
	global $sudoku;
	global $cellPosibilities;
	global $numberFounded;

	for ($i=1; $i<=9; $i++)
	{
		for ($j=1; $j<=9; $j++)
		{
			if ( !isset ($sudoku[$i][$j]) || $sudoku[$i][$j] == 0)
			{
				for ($k=0; $k<count($cellPosibilities[$i][$j]); $k++)
				{
					
					//COMPROBAR FILA			
					$notExclusive = false;
					for ($f=1; $f<=9; $f++)
					{
						if ($f != $i && $notExclusive == false && isset($cellPosibilities[$f][$j]))
							$notExclusive = in_array($cellPosibilities[$i][$j][$k], $cellPosibilities[$f][$j]);
					}
					if ($notExclusive == false)
					{
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
