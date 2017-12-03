<?php 

			// Fichier de traitement des news
			// Il ne faut pas toucher au fichier ni à son emplacement . 


		header('location:../creation-article.php');
		session_start();

	

	

	//Si valider alors fichier crée definitivement	
if (isset($_POST['validation']) ){

	if(isset($_POST['titre']) and $_POST['titre'] != NULL ){

	if (isset($_POST['auteur']) and $_POST['auteur'] != NULL ) {
	
		if (isset($_POST['texte']) and $_POST['texte'] != NULL) {

			if ( isset($_FILES['image']) and $_FILES['image']['error'] == 0 and $_FILES['image']['size'] <= 2000000){

					 move_uploaded_file($_FILES['image']['tmp_name'], '../newsvalide/image/' . basename($_FILES['image']['name']));
					 	$CreatioNewsValide = 1;


						$titre =$_POST['titre'];
						$auteur = $_POST['auteur'];
						$texte = $_POST['texte'];
						$imageb = $_FILES['image']['name'];
						$_SESSION["titre"] = '"'.$titre;
					
								//Ecriture d'un fichier final en php


						$monfichier = fopen('../newsvalide/'.$titre.'.php', 'a');
						fputs($monfichier,'


							<!DOCTYPE html>
						<html>
								<head>
									<title>'.$titre.'</title>
								</head>

							<body>

								<p class = "titre">'.$titre.'</p>
								<br>
								<p class = "texte">'.$texte.'</p>
								<br>
								<img class = "logo" src="image/'.$_FILES['image']['name'].' "  >
								<br>
								<p class = "auteur">'.$auteur.'</p> 

								<?php 

									echo  "Fait le ".date("d/m/y h:i");    

								?>
 							  	

							</body>

						</html>



						


							');

						fclose($monfichier);
						
						$pseudo = 'volodia';

						// Inscription des donnes dans le bdd
						

					$bdd = new PDO("mysql:host=127.0.0.7;dbname=borgia;charset=utf8",'root','');
					$element = $bdd -> prepare('INSERT INTO news(pseudo, titre, texte, image, auteur, aj_date) VALUES (?, ?, ?, ?, ?, NOW() )') or die(print_r($bdd->errorInfo()));
					$element -> execute(array($pseudo, $titre, $texte, $imageb,$auteur ));

					echo "string";
						
					


			}



		}

	}




}
}
?>










<?php

	// Si previsualisatio fichier html temporaire 

		// Verification des variables 

if(isset($_POST['titre']) and $_POST['titre'] != NULL and isset($CreatioNewsValide)!= True ){

	if (isset($_POST['auteur']) and $_POST['auteur'] != NULL ) {
	
		if (isset($_POST['texte']) and $_POST['texte'] != NULL) {

			if ( isset($_FILES['image']) and $_FILES['image']['error'] == 0 and $_FILES['image']['size'] <= 2000000){

					 move_uploaded_file($_FILES['image']['tmp_name'], '../previsualisation/image/' . basename($_FILES['image']['name']));



						$titre =$_POST['titre'];
						$auteur = $_POST['auteur'];
						$texte = $_POST['texte'];
						$_SESSION['titref'] =$_POST['titre'];
						$_SESSION['auteur'] = $_POST['auteur'];
						$_SESSION['texte'] = $_POST['texte'];

						$_SESSION["titre"] = '"'.$titre;
					
								//Ecriture d'un fichier provisoir en php


						$monfichier = fopen('../previsualisation/'.$titre.'.php', 'a');
						fputs($monfichier,'


							<!DOCTYPE html>
						<html>
								<head>
									<title>'.$titre.'</title>
								</head>

							<body>

								<p class = "titre">'.$titre.'</p>
								<br>
								<p class = "texte">'.$texte.'</p>
								<br>
								<img class = "logo" src="image/'.$_FILES['image']['name'].' "  >
								<br>
								<p class = "auteur">'.$auteur.'</p> 

								<?php 

									echo  "Fait le ".date("d/m/y h:i");    

								?>
 							  	

							</body>

						</html>

						<?php @unlink('.$_SESSION["titre"].'.php");
						?>


						


							');

						fclose($monfichier);

						

						$chemin = "previsualisation/".$titre ;
						$chemin = "'".$chemin."'";
						$cheminImage = "previsualisation/".$_FILES['image']['name'];
						$cheminImage = '"'.$cheminImage.'"';
						$_SESSION['supprimerimg'] = $cheminImage;
						$_SESSION['chemin'] = $chemin;
						$_SESSION['chemin'] = $chemin;
						
						$_SESSION['verif'] = 1;
						
					


			}



		}

	}




}
?>








