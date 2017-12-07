
<?php 
session_start();

// affichage pour les administrateur 

if (isset($_POST['fondateur']) ) {
	



}










	// affichage de base . 

if(isset($verif) == false ){
	$verif = 0; // si 0 affiche la base, 1 affiche espace modo, si 2 admin, si 3 fondateur 
}
if(isset($_SESSION['power']) and $_SESSION['power'] > 2 and $verif == 0 )
{
	// verification
	

?>

<!DOCTYPE html>
<html>
	<head>

	<meta charset="utf-8">
	<title>Administration</title>

	</head>

	<body>
		<h1> Administration </h1>

			<form method="post" action="Administration.php">

				<label id ="mdpfondateur"> Mot de passe fondateur </label>
				<input type="password" name="motpfondateur" for="mdpfondateur">
				<input type="submit" name="fondateur" value="Envoyer">


				<label id ="mdpadmin"> Mot de passe administrateur </label>
				<input type="password" name="motpasseadmin" for="mdpadmin">
				<input type="submit" name="administrateur" value="Envoyer">

				<label id ="mdpmodo"> Mot de passe moderateur </label>
				<input type="password" name="motpassemodo" for="mdpmodo">
				<input type="submit" name="moderateur" value="Envoyer">
			</form>


	</body>
</html>

<?php 

}







else{
	header('location:../accueil.html');

}


 ?>