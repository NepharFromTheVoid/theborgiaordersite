

							<?php 
								session_start();
								$titrepage = "tusai" ;
								$_SESSION["titreDeLaPage"] = $titrepage; 



							?>

							<!DOCTYPE html>
						<html>
								<head>
									<title>tusai</title>
								</head>

							<body>

								<p class = "titre">tusai</p>
								<br>
								<p class = "texte">sqdqsdqs</p>
								<br>
								<img class = "logo" src="image/Hydrangeas.jpg "  >
								<br>
								<p class = "auteur">dsq</p> 

								<?php 
											// recup in bdd , comantaire .

									echo  "Fait le ".date("d/m/y h:i");    
									include("traitement_news/inclu_formulaire.php");
									$bdd = new PDO("mysql:host=127.0.0.1;dbname=borgia;charset=utf8", "root", "");

									$element = $bdd -> query("SELECT id_news, com, pseudo, date_creation FROM blog WHERE id_news =   \"".$titrepage."\"");
									while($donne = $element -> fetch() ){
										
											
											include("traitement_news/inclu_commentaire.php");


										
										


									} 
								?>


 							  	

							</body>

						</html>



						


							