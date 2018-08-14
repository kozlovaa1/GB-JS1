
<form action=""	method="POST">
<label>Переменная 1:</label>
<input type="number" name="var1">
<label>Переменная 2:</label>
<input type="number" name="var2">

<div style="overflow: hidden">
<input type="submit" name="operation" value="+" style="clear: both; float: left; padding: 2px; margin: 2px;">
<input type="submit" name="operation" value="-" style="float: left; padding: 2px; margin: 2px;">
<input type="submit" name="operation" value="*" style="clear: both; float: left; padding: 2px; margin: 2px;">
<input type="submit" name="operation" value="/" style="float: left; padding: 2px; margin: 2px;">
</div>
</form>
<?
$a = (int)($_POST['var1']);
$b = (int)($_POST['var2']);
if(isset($_POST['operation'])) {
	if($a==="" || $b==="") {
		$result = "Введите корректные переменные";
	}
	else {
		switch ($_POST['operation']) {
			case '+':
				$result = $a + $b;
				break;
			case '-':
				$result = $a - $b;
				break;
			case '*':
				$result = $a * $b;
				break;
			case '/':
				if ($b == 0) {
					$result = "На ноль делить нельзя!";
				}
				else {
					$result = $a / $b;
				}	
				break;
			default:
				$result = "Something went wrong....";
				break;
		}
	}
}
?>
<div style="clear: both; font-weight: bold; font-size: 16px">Результат: <?=$result ?></div>