<?php 
session_start();

if (isset($_SESSION['EnLigne']) and $_SESSION['EnLigne'] == 1) {
	


if(isset($_POST['texte']) and $_POST['texte'] != NULL) {
	$id_news = $_SESSION["titreDeLaPage"];
	
	
	
	$texte = htmlspecialchars($_POST['texte']);
	echo "string";
	$bdd = new PDO('mysql:host=127.0.0.1;dbname=borgia;charset=utf8', 'root', '');
	



	$element = $bdd -> prepare('INSERT INTO blog(id_news, com, date_creation, pseudo) VALUES(?, ?, NOW(), ?)') or die(print_r($bdd->errorInfo()));
	$element -> execute(array($id_news, $texte, $_SESSION['pseudo']));






	}
}


if (isset($_SESSION['EnLigne']) == FALSE or $_SESSION['EnLigne'] != 1) {
	
}

 ?>