<?php 


		session_start();

	// Fichier de traitement des news
	// Il ne faut pas toucher au fichier . 

	
if (isset($_POST['validation']) ){

	echo "bonjour";


}

		// Verification des variables 

if(isset($_POST['titre']) and $_POST['titre'] != NULL ){

	if (isset($_POST['auteur']) and $_POST['auteur'] != NULL ) {
	
		if (isset($_POST['texte']) and $_POST['texte'] != NULL) {

			if ( isset($_FILES['image']) and $_FILES['image']['error'] == 0 and $_FILES['image']['size'] <= 2000000){

					 move_uploaded_file($_FILES['image']['tmp_name'], '../previsualisation/image/' . basename($_FILES['image']['name']));



						$titre =$_POST['titre'];
						$auteur = $_POST['auteur'];
						$texte = $_POST['texte'];
						
					
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


							');

						fclose($monfichier);

						

						$chemin = "previsualisation/".$titre ;
						$chemin = '"'  .$chemin.'.'."php".'"';
						$cheminImage = "previsualisation/".$_FILES['image']['name'];
						$cheminImage = '"'.$cheminImage.'"';
						$_SESSION['supprimerimg'] = $cheminImage;
						$_SESSION['chemin'] = $chemin;
					


			}



		}

	}




}
?>



<?php 


header('location:../creation-article'); ?>

