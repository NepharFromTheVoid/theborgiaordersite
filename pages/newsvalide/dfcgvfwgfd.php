

							<?php 
								session_start();
								$titrepage = "dfcgvfwgfd" ;
								$_SESSION["titreDeLaPage"] = $titrepage; 



							?>

							<!DOCTYPE html>
						<html>
								<head>
									<title>dfcgvfwgfd</title>
								</head>

							<body>

								<p class = "titre">dfcgvfwgfd</p>
								<br>
								<p class = "texte">dwgfddw</p>
								<br>
								<img class = "logo" src="image/Jellyfish.jpg "  >
								<br>
								<p class = "auteur">gdffqgr</p> 

								<?php 
											// recup in bdd , comantaire .
									$i = 0;

									echo  "Fait le ".date("d/m/y h:i");    
									include("traitement_news/inclu_formulaire.php");
									$bdd = new PDO("mysql:host=127.0.0.1;dbname=borgia;charset=utf8", "root", "");

									$element = $bdd -> query("SELECT id_news, com, pseudo, date_creation FROM blog WHERE id_news =   \"".$titrepage."\" GROUP BY date_creation DESC");

									while($donnea = $element -> fetch() ){

										$i = $i + 1 ; 

									}

									if( $i > 10) {
									
									$te = $i - 5 ;

									}

									else{

									$te = 0 ;


									}

									$element ->closeCursor();

									$element = $bdd -> query("SELECT id_news, com, pseudo, date_creation FROM blog WHERE id_news =   \"".$titrepage."\" GROUP BY date_creation DESC LIMIT ".$te." , ".$i."");

									while($donne = $element -> fetch() ){
										
											
											include("traitement_news/inclu_commentaire.php");


										
										


									} 
								?>


 							  	

							</body>

						</html>



						


							