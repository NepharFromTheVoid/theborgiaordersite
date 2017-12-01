<!DOCTYPE html>
<html>
	<head>

	<title></title>

	</head>

	<body>
		<form method="post" action="creation-article.php" enctype="multipart/form-data" >

		 <label class="titreL"> Le titre  </label>
			<input type="texte" name="titre" for="titreL" value= <?php echo '"'.@$_POST['titre'].'"'; ?>>

		<label class="imageL"> images  </label>
			<input type="file" name="image" for="imageL">

		<label class="auteurL"> Auteur  </label>
			<input type="text" name="auteur" for="imageL" value= <?php echo '"'.@$_POST['auteur'].'"'; ?>>

		<label class="auteurL"> Votre texte </label>
			<textarea for="auteur" name = "texte" ><?php echo @$_POST['texte']; ?></textarea>


		<input type="submit" value="Visiualisation">



		</form>
	</body>


<?php 



if(isset($_POST['titre']) and $_POST['titre'] != NULL ){

	if (isset($_POST['auteur']) and $_POST['auteur'] != NULL ) {
	
		if (isset($_POST['texte']) and $_POST['texte'] != NULL) {

			if ( isset($_FILES['image']) and $_FILES['image']['error'] == 0 and $_FILES['image']['size'] <= 2000000){

					 move_uploaded_file($_FILES['image']['tmp_name'], 'previsualisation/image/' . basename($_FILES['image']['name']));

						$titre =$_POST['titre'];
						$auteur = $_POST['auteur'];
						$texte = $_POST['texte'];
						



						$monfichier = fopen('previsualisation/'.$titre.'.php', 'a+');
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
						$chemin = '"'.$chemin.'"';
						


						 



			}



		}

	}




}
?>

<script > window.open(<?php echo $chemin; ?>, "_blank");</script>




</html>


