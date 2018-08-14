<?
//print_r($_POST);

//print_r($_GET);

//print_r($_FILES);

header("Location: http://yandex.ru");

for($i=0;$i<count($_FILES['photo']['name']);$i++){
	$path = "files/".$_FILES['photo']['name'][$i];
	if(move_uploaded_file($_FILES['photo']['tmp_name'][$i],$path)){
		echo "Файл ".$_FILES['photo']['name'][$i]." успешно загружен!";
	}
	
}


if($_POST['user_answer']==$_POST['answer']){
	echo "success!";
	echo strip_tags($_POST['fio']);
	echo htmlspecialchars($_POST['fio']);
	$id = (int)($_GET[id]);
}
else{
	echo "not success!";
}

