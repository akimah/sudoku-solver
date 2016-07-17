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


<!--  DIBUJO SUDOKU  -->
<table>
<?php 
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
			
				if (isset ($sudoku[$i][$j]))
					echo $sudoku[$i][$j];
			
			echo "</td>";
		}
		
		echo "</tr>";
	}
?>
</table>

<?php 

//COUNT 100
for ($count=0; $count<9; $count++)
{

	//RECORRO TODAS LAS CELDAS
	for ($i=1; $i<=9; $i++)
	{
		for ($j=1; $j<=9; $j++)
		{
			if ( !isset ($sudoku[$i][$j]))
			{
				//COMIENZO EL TESTEO
				//DECLARO VARIABLE TEMPORAL
				$tempTest = array();	
				
				echo "Numero encontrados: ";
				//RECORRO TODA LA FILA EN BUSCA DE NUMEROS
				for ($f=1; $f<=9; $f++)
				{
					if ( isset ($sudoku[$f][$j]))
					{
						$tempTest[$sudoku[$f][$j]] = $sudoku[$f][$j];
						echo $sudoku[$f][$j];	
					}
				}
				
				//RECORRO TODA LA COLUMNA EN BUSCA DE NUMEROS
				for ($c=1; $c<=9; $c++)
				{
					if ( isset ($sudoku[$i][$c]))
					{
						$tempTest[$sudoku[$i][$c]] = $sudoku[$i][$c];
						echo $sudoku[$i][$c];
					}
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
							{
								$tempTest[$sudoku[$f][$c]] = $sudoku[$f][$c];
								echo "<b>".$sudoku[$f][$c]."</b>";
							}
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
							{
								$tempTest[$sudoku[$f][$c]] = $sudoku[$f][$c];
								echo "<b>".$sudoku[$f][$c]."</b>";
							}
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
							{
								$tempTest[$sudoku[$f][$c]] = $sudoku[$f][$c];
								echo "<b>".$sudoku[$f][$c]."</b>";
							}
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
							{
								$tempTest[$sudoku[$f][$c]] = $sudoku[$f][$c];
								echo "<b>".$sudoku[$f][$c]."</b>";
							}
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
						{
							$tempTest[$sudoku[$f][$c]] = $sudoku[$f][$c];
							echo "<b>".$sudoku[$f][$c]."</b>";
						}
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
							{
								$tempTest[$sudoku[$f][$c]] = $sudoku[$f][$c];
								echo "<b>".$sudoku[$f][$c]."</b>";
							}
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
							{
								$tempTest[$sudoku[$f][$c]] = $sudoku[$f][$c];
								echo "<b>".$sudoku[$f][$c]."</b>";
							}
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
						{
							$tempTest[$sudoku[$f][$c]] = $sudoku[$f][$c];
							echo "<b>".$sudoku[$f][$c]."</b>";
						}
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
							{
								$tempTest[$sudoku[$f][$c]] = $sudoku[$f][$c];
								echo "<b>".$sudoku[$f][$c]."</b>";
							}
						}
					}
				}
				
				
				echo " - ";
				foreach ($tempTest as $ouh)
				{	
						echo $tempTest[$ouh];
				}
				//echo " - ";
				//COMPRUEBO SI HE DADO CON ALGUN NUMERO
				$notfound=0;
				for ($success=1; $success<=9; $success++)
				{//echo " SUC ".$success;
					if (array_search($success, $tempTest) == null)
					{
						$notfound++;
						$numbernotfound = $success;
				
						//echo "NOT ".$notfound." ";
					}
				}
				// ASIGNO NUMERO ENCONTRADO
				if ($notfound == 1)
				{
					$sudoku[$i][$j] = $numbernotfound;
				}
				
				echo " NotFound = ".$notfound;
				echo "<br/>";
				unset($notfound);
				

			
				//LIBERO VARIABLE
				unset ($tempTest);
				
			}
		}
	}

	//FIN COUNT 100
}
?>

<br><br>

<!--  DIBUJO SUDOKU  -->
<table>
<?php 
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
			
				if (isset ($sudoku[$i][$j]))
					echo $sudoku[$i][$j];
			
			echo "</td>";
		}
		
		echo "</tr>";
	}
?>
</table>

