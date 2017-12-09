<?php

session_start();
$verif = 0;
		// Fichier traitement de la connection 
$TonEmail = htmlspecialchars($_POST['TonEmail']);
$TonMdp = sha1($_POST['TonMdp']);
$bdd = new PDO('mysql:host=127.0.0.1;dbname=borgia;charset=utf8', 'root', '');

$element = $bdd -> query('SELECT mail, pass, pseudo, power FROM compte ');
while ($donne = $element -> fetch()) {
	if($TonMdp == $donne['pass'] and $TonEmail == $donne['mail']){
		$verif = 1;
		$_SESSION['pseudo'] = $donne['pseudo'];
 		$_SESSION['power'] = $donne['power']  ;



	}
	
}

if($verif != 1 ){
	header('location:../connect.php');



 }

 else{

 	header('location:../newsvalide/test.php');
 	
	


 }






  ?>