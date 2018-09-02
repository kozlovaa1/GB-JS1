<?
	if(isset($_GET['success']) && $_GET['success']==1){
		echo "Пользователь успешно авторизован!";
	}else{
?>
<form action ="server.php" method="POST">
	<p>Введите Логин</p>
	<input value="<?=$_COOKIE[login]?>" type="text" name="login">
	
	<p>Введите пароль</p>
	<input value="<?=$_COOKIE[pass]?>" type="password" name="pass"><br><br>
	
	<input type="submit" name="go" value="go">
</form>
<?}?>