<?
$login = (isset($_POST['login']))?strip_tags($_POST[login]):'';
$pass= (isset($_POST['pass']))?strip_tags($_POST[pass]):'';

$connect = mysqli_connect("localhost","root","","shop");
$sql = "select * from users where login='$login' and pass='$pass'";
$res = mysqli_query($connect,$sql);

if(mysqli_num_rows($res)>0){
	setcookie('login',$login);
	setcookie('pass',$pass);
	header("Location: index.php?success=1");
}
else{
	header("Location: index.php?success=0");
}