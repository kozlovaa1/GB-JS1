<?
	$x = rand(1,10);
	$y = rand(1,10);
	$z = $x+$y;
?>


<form enctype="multipart/form-data" action="server.php" method="POST">
	<p>Введите ФИО</p>
	<input type="text" name="fio">

	<p>Какие языки программирования вы знаете</p>
	<input type="checkbox" name="lang[]" value="php">php<br>
	<input type="checkbox" name="lang[]" value="js">js<br>
	<input type="checkbox" name="lang[]" value="java">java<br>

	<p>В каком городе вы живете</p>
	<select name="city">
		<option value="Москва">Москва</option>
		<option value="Питер">Питер</option>
		<option value="Казань">Казань</option>
	</select><br>

	<input type="date" name="dt"><br><br>	
	
	<p>Решите пример: <?=$x?>+<?=$y?>=<input style="width:20px" type="text" name='user_answer'></p>
	<br><br>	
	
	<input type="hidden" name="answer" value="<?=$z?>">
	
	<input type="file" multiple name="photo[]">
	
	
	<br><br>	
	
	<input type="submit">
	
	
</form>

<a href="server.php?id=1&name=Ivan">ТЕСТ</a>
