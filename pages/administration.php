
<?php 
		/* Page d'administation , php et html présent sur cette page  
				NE PAS TOUCHER AU PHP, modification possible pour
					les partie html, il faut STYLISER */
		



session_start();
	


	// affichage de base . 

if(isset($_SESSION['verif']) == false ){
	$_SESSION['verif'] = 0; // si 0 affiche la base, 1 affiche espace modo, si 2 admin, si 3 fondateur 
	
	
}

	// verification si l'utilisateur peux acces à la page 
	
if(isset($_SESSION['power']) and $_SESSION['power'] > 2 and $_SESSION['verif'] == 0 )
{
	echo $_SESSION['verif'] ;
	
	// verification
	
		// affichage pour les administrateur 
			// JwMy47S3x2
		// puissance minimun 5
		
		
	if (isset($_POST['fondateur']) and isset($_POST['motpfondateur']) and  empty($_POST['motpfondateur']) == false   ) {
		
			// Verification du mots passe et du rang
				// protection du mot pass 
				
		$mdp =htmlspecialchars($_POST['motpfondateur']);
		$mdp = sha1($mdp);
		
			//connection in bdd pour verification de l'existance du fondateur 
			
		$bdd = new PDO('mysql:host=127.0.0.1;dbname=borgia;metacharset=utf8', 'root', '');
		$element = $bdd -> query('SELECT pseudo, power, mdp FROM adminis WHERE pseudo =\''.$_SESSION["pseudo"].'\'');
		while($ligne = $element -> fetch())	{
			if ($mdp == $ligne['mdp']){
					
					// if mdp == ok alors refresh et affichage fondateur 
				echo "fdsfsdf";
				$_SESSION['verif'] = 1;
				 header('location:administration.php');
				
				
			}
			echo $_SESSION['verif'] ;
			
			
			
			
		}
		
	



}
	
	

	
	

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





if($_SESSION['verif'] == 1) {

 ?>
 
 
 
 
 <!DOCTYPE html>
<html>
	<head>

	<meta charset="utf-8">
	<title>Fondateur</title>

	</head>

	<body>
		<h1> Fondateur </h1>

			<p>La page d'administation pour les fondateurs. Coucou :)</p>
				
			<form method="post" action="administration.php" >
			
				<label id ="Bannir"> Bannisement </label>
					<input type= "submit" value="Bannisement !" >
			
			</form>


	</body>
</html>





 <?php 

 

 
 

}

 ?>