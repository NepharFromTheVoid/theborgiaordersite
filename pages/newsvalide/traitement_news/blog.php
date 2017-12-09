<?php 

// PHP , ne pas stylyser .

session_start();

	// Verifie sur l'utilisateur et connecter 

if (isset($_SESSION['power']) == TRUE or $_SESSION['power'] >= 1) {
	




		// Verifcation de securiter pour com in news

if (isset($_SESSION['power']) and $_SESSION['power'] >= 1) {
	
		// affichage max 1000 caractére

if(isset($_POST['texte']) and $_POST['texte'] != NULL and strlen($_POST['texte']) < 1000 ) {
	$id_news = $_SESSION["titreDeLaPage"];
	echo strlen($_POST['texte']);
	
		// protection du texte
	$texte = htmlspecialchars($_POST['texte']);
	echo "string";
	$bdd = new PDO('mysql:host=127.0.0.1;dbname=borgia;charset=utf8', 'root', '');
	


		// Inscription in bdd du com , avec comme repére (index) le champ id_news unique pour chaque news

	$element = $bdd -> prepare('INSERT INTO blog(id_news, com, date_creation, pseudo) VALUES(?, ?, NOW(), ?)') or die(print_r($bdd->errorInfo()));
	$element -> execute(array($id_news, $texte, $_SESSION['pseudo']));






		}
	}

}

  // if utilisateur not connected else  redirection page connection 

else{

	header('location:../../connect.php ');




}





 ?>