
<?php 
		/* Page d'administation , php et html présent sur cette page  
				NE PAS TOUCHER AU PHP, modification possible pour
					les partie html, il faut STYLISER */
		
// Power : 1 Utilistaeur 
// Power : 2 Redacteur 
// Power : 3 Moderateur
// Power : 4 Administrateur 
// Power : 5 Fondateur 
session_start();
$temps = time();
					
					// chaine de caractére pour creation de mots de passe 
$generationMotDePass = "Ayo726KNVO8W74MOondak958452rzdsKDFIJDSGGERpok744";
	


	// affichage de base . 
$verifco = 1;
if(isset($_SESSION['verif']) == false ){
	$_SESSION['verif'] = 0; // si 0 affiche la base, 1 affiche espace modo, si 2 admin, si 3 fondateur 
	
	
	
}

	// verification si l'utilisateur peux acces à la page 
if(isset($_SESSION['pseudo']) != 1) {
	
		// l'utilisateur est pas connecter donc redirigez sur connection 
	header('location:connect.php');	
	$verifco = 0;
}

	// si l'utilisateur n'as pas le power redirection vers la gage d'acceuil 
if($_SESSION['power'] <= 1  and $verifco ==  1 ){
	header('location:../accueil.html');	
	
	
}
	
if(isset($_SESSION['power']) and $_SESSION['power'] > 1 and $_SESSION['verif'] == 0 )
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
			if ($mdp == $ligne['mdp'] and  5 == $ligne['power']){
					
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

	<!-- Page d'accueil pour le staff -->

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

echo $temps;

 ?>
 
 
 
 
 <!DOCTYPE html>
<html>

	<!-- Affichage pour les fondateur  -->

	<head>

	<meta charset="utf-8">
	<title>Fondateur</title>

	</head>

	<body>
		<h1> Fondateur </h1>

			<p>La page d'administation pour les fondateurs. Coucou :)</p>
				
			<form method="post" action="administration.php" >
							<!-- Bannisement -->
							
				<label id ="Bannir"> Bannisement </label>
					<input type ="text" placeholder="pseudo" name="pseudoBanni">
				<label id="raison ">Les raisons ?</label>
					<textarea for= "raison" name ="raison"></textarea>
					<input type= "submit" value="Bannisement !" name = "subbanni" >
				<br>
				<br>
				<br>
				
								<!-- PROMOTION -->
								
				<label id ="promotion"> Promotion</label>
					<input type ="text" placeholder="pseudo" name="pseudoPromo">
							<label for="utilisateur"> Utilisateur </label>
						<input type ="radio" name="promotion" value ="1" id="utilisateur"> 
							<label for="redacteur"> Redacteur </label>
						<input type ="radio" name="promotion" value ="2" id="redacteur"> 
							<label for = "moderateur"> Moderateur </label>
						<input type ="radio" name="promotion" value ="3" id="moderateur">
							<label for="administrateur"> Administrateur </label>
						<input type = "radio" name="promotion" value = "4" id="administrateur">
						<input type = "submit" name ="butpromo" value="Promotion !"> 
			
			</form>


	</body>

 <?php 

 // gestion du bannisement 
 
	// verification des champs 
 if(isset($_POST['subbanni'])){
	if(isset($_POST['pseudoBanni']) and isset($_POST['raison'])) {
		if(empty($_POST['pseudoBanni']) == false and empty($_POST['raison']) == false ){
			
			 // verification de l'existance de l'utilisateur dans le bdd 
			 $verifBanni = 0 ;
			 $bdd = new PDO ('mysql:host=127.0.0.1;dbname=borgia;metacharset=utf8','root', '');
			 $recherche = $bdd -> query('SELECT * FROM compte WHERE pseudo = \''.$_POST['pseudoBanni'].'\'	');
			 while($donne = $recherche -> fetch()){
				 if($donne['pseudo'] == $_POST['pseudoBanni']) {
					 
					 $verifBanni = 1 ;
					 
				 }
				 
				 
				 
			 }
			

			
			if($verifBanni == 1) {
			
				$element = $bdd -> exec('UPDATE compte SET power = 0 WHERE pseudo = \''.$_POST['pseudoBanni'].'\'');
				echo "l'utilisateur ".$_POST['pseudoBanni']." a était banni";
			}
			
			 // si banni alors power 0 
			
			if($verifBanni == 0) {
				
				echo "L'utilisateur n'a pas était trouver dans la basse de donnée ";
				
				
			}
			
			// verifcation si l'utilisateur et in staff 
			
			$recherche = $bdd -> query('SELECT * FROM adminis  WHERE pseudo = \''.$_POST['pseudoBanni'].'\'	');
				$donne = $recherche -> fetch();
				
				if($donne['pseudo'] == $_POST['pseudoBanni']) {
					 
					 $bdd -> exec('DELETE FROM adminis WHERE pseudo = \''.$_POST['pseudoBanni'].'\' ');
					 
					 
				 }
				 
				 
				 
			 
			
			
			
		
		
			
		
		}
	}
 }
 
	// Gestion de la promotion 
	
if(isset($_POST['butpromo'])){
	
	if (isset($_POST['promotion']) and isset($_POST['pseudoPromo']) and empty($_POST['pseudoPromo']) == false ) {
		
		$verifpromo = 0 ;
	
		$bdd = new PDO('mysql:host=127.0.0.1;dbname=borgia;metacharset=utf8', 'root', '');
		$try = $bdd -> query('SELECT * FROM compte WHERE pseudo = \''.$_POST['pseudoPromo'].'\'');
		$recup = $try -> fetch();
		if($recup['pseudo'] == $_POST['pseudoPromo']){
			
			$verifpromo = 1;
			
			
		}
		
		$try -> closeCursor();
		
		if ($verifpromo == 1){
			
			$changePower = $bdd -> exec('UPDATE compte SET power = \''.$_POST['promotion'].'\' WHERE pseudo = \''.$_POST['pseudoPromo'].'\'');
			echo  $_POST['pseudoPromo']." à une puissance de niveau ".$_POST['promotion'];
			$verifpromo = 2 ; 
		}
		
		if($verifpromo == 0){
			
			echo "L'utilisateur ".$_POST['pseudoPromo']." N'a pas était trouvé"; 
			
			
		}
		
		if($verifpromo == 2 ){
				// inscription dans la table adminis ou modification si exsite deja 
				
			$recherche = $bdd -> query ('SELECT * FROM adminis');
			while($trouve = $recherche -> fetch() ){
						
						// si inscrit alors update de la table 
						
				if ($trouve['pseudo'] == $_POST['pseudoPromo'] ) {
					
					if ($_POST['promotion'] != 1){
					$changePower = $bdd -> exec('UPDATE adminis SET power = \''.$_POST['promotion'].'\' WHERE pseudo = \''.$_POST['pseudoPromo'].'\'');
					$verifpromo = 3 ;
						
					}
							// alors c'est une retrogation en utilsateur donc supprimer in bdd 
					else {
					  $bdd -> exec('DELETE FROM adminis WHERE pseudo = \''.$_POST['pseudoPromo'].'\' ');
						$verifpromo = -1;
						
					}
					
				}
				
				
				
				
			}
			
			if ($verifpromo == 2) {
				
				$crea = $bdd -> prepare('INSERT INTO adminis(pseudo, power, mdp) VALUES(?,?,?)');
				$MotDePass = str_shuffle($generationMotDePass);
				$MotDePass = substr($MotDePass,0,18);
				echo $MotDePass;
				$MotDePass = sha1($MotDePass);
				$crea -> execute(array($_POST['pseudoPromo'],$_POST['promotion'],$MotDePass));
				
				
			}
			
			
		}
		
		
		
			
			
			
		
		
	}
	
	
	
}

 
 
 
 
 
 
 
 

}



 ?>