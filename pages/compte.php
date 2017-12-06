<?php 

session_start();

		


 ?>

<!DOCTYPE html>

<html>

	<head>
		<link rel="stylesheet" href="style/style1.css" type="text/css" media="screen" />
		<meta charset="utf-8" >
		<title>Inscription</title>
	
	</head>


	<body>
		
	<div class="box">
		<h1> Inscription </h1>
		
		<hr>

	             <!-- Cette partie gére l'inscription
	             		les données sont envoyé à 
	             		  traitement pour verif -->

     	
		<form class="form" action="traitement/ceacompt.php" method="post">

			<label class="styleMail"> Email:  </label>

				<input type="email" name="TonEmail" for="styleMail">
			<br>
				<label class="styleMail2"> Verification Email:  </label>
				<input type="email" name="TonEmail2" for="styleMail2">
			<br>
			<label class="stylePseudo"> Pseudo: </label>
				<input type="text" name="TonPseudo" for = "stylePseudo">
			<br>
			<label class="stylePass">Mot de passe:</label>
				<input type="password" name="TonMdp" for = "stylePass">
			<br>
			<input class="but" type="submit" value="envoyer">

		

	 

		</form>
			<hr>
			<?php 

				

				if(isset($_SESSION['mail'])){

						echo $_SESSION['mail'] ;
						$_SESSION['mail'] = "";

				}

				if(isset($_SESSION['mailform'])){

						echo $_SESSION['mailform'] ;
						$_SESSION['mailform'] = "";

				}

				if(isset($_SESSION['pseudo'])){

						echo $_SESSION['pseudo'] ;
						$_SESSION['pseudo'] = "";

				}
			


		 ?>

		</div>



		


	</body>



</html>

