 <!DOCTYPE html>
 
 		<!-- Fichier pour connection  -->

 <html>
 	<head>
 		<link rel="stylesheet" href="style/styleConnect.css" type="text/css" media="screen" />
 		<meta charset="utf-8">
 		<title> Connection </title>


 	</head>


 	<body>

 	  <div class="box">

 		<h1> Connection </h1>

 		<hr>
 
 		<form class="form" action="traitement/trconnect.php" method="post">

			<label class="styleMail"> Email:  </label>

				<input type="email" name="TonEmail" for="styleMail">
			<br>
			<label class="stylePass">Mot de passe:</label>
				
				<input type="password" name="TonMdp" for = "stylePass">
				<input class="but" type="submit" value="envoyer">

		</form>

	 </div>



 	</body>





 </html>