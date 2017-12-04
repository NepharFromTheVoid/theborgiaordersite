<?php 


					//Fichier à styliser , formulaire pour creation de news 
					// Ne pas modifier le php 
session_start();


if (isset($_SESSION['verif'])== false ) {
	$_SESSION['verif'] = 0;
	
}



if(isset($_SESSION['connect']) and $_SESSION['connect'] == 1)
{


?>

<!DOCTYPE html>

<html>
	<head>

	<title></title>

	</head>

	<body>
		<form method="post" action="traitement/traitement-news.php" enctype="multipart/form-data" >

		 <label class="titreL"> Le titre  </label>
			<input type="texte" name="titre" for="titreL" value= <?php echo @$_SESSION['titref'];?> >

		<label class="imageL"> images  </label>
			<input type="file" name="image" for="imageL">

		<label class="auteurL"> L'auteur   </label>
			<input type="text" name="auteur" for="imageL" value=<?php echo @$_SESSION['auteur'];?>  >

		<label class="auteurL"> Votre texte </label>
			<textarea for="auteur" name = "texte" ><?php echo @$_SESSION['texte'];?></textarea>


		<input type="submit" value="Visiualisation" name="Visiualisation">
		<input type="submit" value="valider" name="validation">




		</form>
	</body>

		




</html>


<?php  

if ( $_SESSION['verif']  ==  1  ) {
	# code...
echo $_SESSION['verif'];


?>

<script > window.open(<?php echo $_SESSION["chemin"];?>, "_blank");</script>

<?php 

echo 'previsualisation/'.$_SESSION['titre'].'.php';
echo $_SESSION['titre'];

}

$_SESSION["chemin"] = NULL;
$_SESSION['titre'] = NULL;


 ?>

 <?php 

}


  ?>