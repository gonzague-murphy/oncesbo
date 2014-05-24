<?php
require_once("../inc/init.php");
if($_POST){
//on "nettoie" la saisie de l'utilisateur :
		$pseudo = htmlentities($_POST['pseudo'], ENT_QUOTES);
		$mdp = md5(htmlentities($_POST['mdp'], ENT_QUOTES));
//on vérifie que le pseudo fourni existe bien en base :
		$selection_membre = execute_requete("SELECT * FROM membre WHERE pseudo='$pseudo'");
		if($selection_membre->num_rows != 0)
		{
			// $msg .= "<div class='validation'>Pseudo OK</div>";
			$membre = $selection_membre->fetch_assoc();
			// debug($membre);
//
			if($membre['mdp'] == $mdp)
				{
					foreach($membre as $indice => $valeur)
						{
							if($indice !="mdp")
							{
								$_SESSION['utilisateur'][$indice] = $valeur;
							}
						}
					header("location:dashBoard.php");
				}
			else{
				$msg .= "<div class='erreur'>Erreur de mdp</div>"; 
			}
		}
		else{
				$msg .= "<div class='erreur'>Erreur de pseudo</div>"; 
		}

		debug($_SESSION);
	}
echo $msg;

?>
<div class='addForms'>
<form method="post" action="">
	<label>Pseudo :</label>
	<input type="text" name="pseudo" value="<?php if(isset($_POST['pseudo'])) echo $_POST['pseudo']?>"/>
	<label>Password :</label>
	<input type="password" name="mdp" />
	<input type="submit" value="Connexion" />
</form>
</div>