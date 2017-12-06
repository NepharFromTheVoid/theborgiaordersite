

							<?php 
								session_start();
								$titrepage = "azertyu" ;
								$_SESSION["titreDeLaPage"] = $titrepage; 



							?>

							<!DOCTYPE html>
						<html>
								<head>
									<title>azertyu</title>
								</head>

							<body>

								<p class = "titre">azertyu</p>
								<br>
								<p class = "texte">sfdsxcxvcxvxcsdqsdqdq</p>
								<br>
								<img class = "logo" src="image/Desert.jpg "  >
								<br>
								<p class = "auteur">fdsfdsdzez</p> 

								<?php 

									echo  "Fait le ".date("d/m/y h:i");    
									include("traitement_news/inclu_formulaire.php");
								?>


 							  	

							</body>

						</html>



						


							