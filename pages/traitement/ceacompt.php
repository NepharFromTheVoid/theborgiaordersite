<?php 

session_start();


$verif = 1;
		// Verifcation des champs 
	
	if (isset($_POST['TonEmail']) == 1 and  empty($_POST['TonEmail']) == false ){
			echo "string";

		if (filter_var($_POST['TonEmail'], FILTER_VALIDATE_EMAIL) == true){
			echo "string";

			if ($_POST['TonEmail'] == $_POST['TonEmail2'] ){
			
				if (isset($_POST['TonPseudo']) == 1 and empty($_POST['TonPseudo']) == false and strlen($_POST['TonPseudo']) > 5 ){

					if (isset($_POST['TonMdp']) == 1 and empty($_POST['TonMdp']) == false){

							// Si tous conditions ok alors reste du code 

								// Protections code 

						$TonEmail = htmlspecialchars($_POST['TonEmail']);
						$TonPseudo = htmlspecialchars($_POST['TonPseudo']);
						$TonMdp = htmlspecialchars($_POST['TonMdp']);
						$TonMdp = sha1($TonMdp);

						

								// verification si champs existe pas dans bdd

						try
						{

							$bdd = new PDO('mysql:host=127.0.0.1;dbname=borgia;charset=utf8','root','');

						}

						catch(Exception $e)
						{
								// En cas d'erreur, on affiche un message et on arrête tout
       							 die('Erreur : '.$e->getMessage());
						}


						$element = $bdd -> query('SELECT * FROM compte');
						while($donnees = $element -> fetch()){
							
							if ($TonEmail == $donnees['mail'] or $TonPseudo == $donnees['pseudo']){

								header('Location:../compte.php');
								$verif = 0;

							}


						}



						
				

						
								// Inscription dans bdd
						if ($verif != 0){
						$req = $bdd -> prepare('INSERT INTO compte(mail, pseudo, pass) VALUES (:mail, :pseudo, :pass)' );
						echo "string";
						$req  -> execute(array(

							'mail'=> $TonEmail ,

							'pseudo'=> $TonPseudo,

							'pass'=> $TonMdp



						));
					}
						









					}

					else{header("location:../compte.php");
						$_SESSION['pseudo'] = "<p>Votre mot de passe n'est pas valide </p>";

					}
				}

				else{
					header("location:../compte.php");
				$_SESSION['pseudo'] = "<p>Votre pseudo n'est pas valide</p>";


				}
			}
		
			else{
				header("location:../compte.php");
				$_SESSION['mailform'] = "<p>Vos email ne sont pas identique</p>";

			}



		}

		else{
			header("location:../compte.php");

		}


	}
	
	else{

		
		$_SESSION['mail'] = " <p id ='error'> Champ Email vide .</p>" ;
		header("location:../compte.php");

		}
	
		
	



?>