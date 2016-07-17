<form action="/" method="post">

<table>
<?php 
	for ($i=1; $i<=9; $i++)
	{
		echo "<tr>";
		for ($j=1; $j<=9; $j++)
		{
			echo "<td id='".$i.$j."' class='";
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
				if (!isset ($sudoku[$i][$j]))
				{
					echo "<select name='".$i.$j."'>";
					for ($o=0; $o<=9; $o++)
					{
						if ($o==0)
							echo "<option value='0'></option>";
						else
							echo "<option  value='".$o."'>".$o."</option>";
					}
				}
			echo "</td>";
		}	
		echo "</tr>";
	}
?>
</table>
<br/>
<button type="submit">ENVIAR SUDOKU</button>
<button type="reset">RESET</button>

</form>
<br/>