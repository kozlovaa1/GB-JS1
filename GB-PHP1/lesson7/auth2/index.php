<script src="jquery.js"></script>
<script>
	function send(){
		var login = $("#login").val();
		var pass = $("#pass").val();
		
		$.ajax({
			type: "POST",
			url: "server2.php",
			data: { login: login, pass: pass }
		}).done(function( msg ) {
			$("h1").append(msg);
			});
	}
</script>

<h1></h1>
	
<form action ="server.php" method="POST">
	<p>Введите Логин</p>
	<input id="login" type="text" name="login">
	
	<p>Введите пароль</p>
	<input id="pass" type="password" name="pass"><br><br>
	
	<a href="#" onclick="send()">Войти</a>
</form>
