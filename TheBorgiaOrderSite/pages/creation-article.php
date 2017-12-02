<?php 


					//Fichier à styliser , formulaire pour creation de news 
session_start();

if (isset($_SESSION['chemin'])== false) {
	echo $_SESSION['chemin'] ;
	$_SESSION['chemin'] = 0;
	echo $_SESSION['chemin'] ;
	# code...
}

echo $_SESSION['chemin'] ;



 ?>


<!DOCTYPE html>
<html>
	<head>

	<title></title>

	</head>

	<body>
		<form method="post" action="traitement/traitement-news.php" enctype="multipart/form-data" >

		 <label class="titreL"> Le titre  </label>
			<input type="texte" name="titre" for="titreL" value=  >

		<label class="imageL"> images  </label>
			<input type="file" name="image" for="imageL">

		<label class="auteurL"> Auteur  </label>
			<input type="text" name="auteur" for="imageL" value=  >

		<label class="auteurL"> Votre texte </label>
			<textarea for="auteur" name = "texte" ></textarea>


		<input type="submit" value="Visiualisation" name="Visiualisation">
		<input type="submit" value="valider" name="validation">



		</form>
	</body>

		





</html>
<?php  

if($_SESSION['chemin'] != 0){

		echo  '<script > window.open(<?php echo '.$_SESSION["chemin"].'?>, "_blank");</script>' ; 

}



  ?>