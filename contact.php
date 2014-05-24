 <?php
require_once("inc/init.php");
if($_POST){
$msg ='';
	foreach($_POST as $key=>$value){
		htmlentities($value, ENT_QUOTES);
		trim($value);
		if($value == ''){
			$msg =  "<div class='error'>Tous les champs sont obligatoires!</div>";
			}
		}
		if($msg == ''){
			$to = 'soph.tual@hotmail.fr';
			$message = '<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>PortfolioContact</title>
			</head>
			<body>
			'.$_POST['contactmessage'].'
			</body>
			</html>';

			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

			$headers .= 'From: ' .$_POST['nom'].' <'.$_POST['email']. ">\r\n";
			$mail = mail($to, 'PortfolioContact', $message, $headers);
			if($mail){
				echo "<div class='valid'>Merci, votre message a été envoyé</div>";
				}
		}
		else{
			echo $msg;
		}
	
	
}
?>
 <div class='addForms'>
  <form method="post" action="">
	<label>Nom et prenom : </label>
	<input type= "text" name='nom'/>
	<label>E-mail : </label>
	<input type= "email" name='email'/>
	<label>Votre message : </label>
	<textarea rows="15" cols="55" placehoder="Votre message" name="contactmessage">
    </textarea>
	<input type= "submit" value = "Envoyer" />
  </form>
  </div>