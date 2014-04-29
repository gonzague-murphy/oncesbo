<?php
function debug($arg , $mode = 1)
	{
	if($mode == 1)
	{
		echo "<pre>";print_r($arg);echo "</pre>";
	}
	else{
			var_dump($arg);
		}
	$trace = debug_backtrace();
	// echo "<pre>";print_r($trace);echo "</pre>";
	echo "Debug demandé: <br />Fichier:<i> " .  $trace[0]['file'] . "</i><br />Ligne:<b>". $trace[0]['line'] ."</b>";
	}
//::::::::::::::::::::::::::::::::::::::::::::::::::::
function execute_requete($req)
	{
		global $mysqli;
		$resultat = $mysqli->query($req);
		if(!$resultat)
			{
				die("Erreur de requete sql.<br />Message d'erreur: " . $mysqli-> error . "<br />Code: " . $req);
			}
		return $resultat;
	}
//::::::::::::::::::::::::::::::::::::::::::::::::::::	
function utilisateur_est_connecte()
	{
		if(!isset($_SESSION['utilisateur']))
			{
				return false;
			}	
		return true;
	}
	
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
//::::::::::::::	User connecté et admin  :::::::::::::::::::::::::::::
		
function utilisateur_est_connecte_et_admin(){
	if(utilisateur_est_connecte() && $_SESSION['utilisateur']['statut']==1){
		return true;
	}
	return false;
}

	
	
	
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
//::::::::::::::::::::Fonction Echo Champs saisis::::::::::::::::::::::::


	
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
//::::::::::::::::Verification extensions de fichiers::::::::::::::::::::

function verification_extension_photo(){
//on recup tous les caractères jusqu'au point :
	$extension = strrchr($_FILES['photo']['name'], ".");
//on met en minuscule et on lui enlève le 1er carac, le point :
	$extension = strtolower(substr($extension,1));
//on fait la whitelist des extensions tolérées :
	$tab_extension_valide = array("gif", "jpg", "jpeg", "png");
//on cherche si dans tab_extension_valide il y a bien l'$extension tolérée :
	$verif_extension = in_array($extension, $tab_extension_valide);
	return $verif_extension;
}
		
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
//:::::::::::::::::::::Récupérer un GET param::::::::::::::::::::::::::::
		
	function information_sur_article($id_article){
		$resultat = execute_requete("SELECT * FROM article WHERE id_article = $id_article");
		return $resultat;
	}
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
//::::::::::::::::::	CREATION PANIER:	:::::::::::::::::::::::::::::

function creation_panier(){
if(!isset($_SESSION['panier'])){
	$_SESSION['panier'] = array();
	$_SESSION['panier']['titre'] = array();
	$_SESSION['panier']['id_article'] = array();
	$_SESSION['panier']['quantite'] = array();
	$_SESSION['panier']['prix'] = array();
		}
	return true;
}

//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
//:::::::::::::::::::::::::AJOUTER AU PANIER:::::::::::::::::::::::::::::

function ajout_article_panier($titre, $id_article, $prix, $quantite){
//on cherche si l'article a deja été ajouté au panier et si oui, on incremente la quantité
	$position_article = array_search($id_article, $_SESSION['panier']['id_article']);
//position_article retourne comme son nom l'indique seulement la position donc soit un chiffre, soit false
	if($position_article !== false){
		$_SESSION['panier']['quantite'][$position_article] += $quantite;
	}
//sinon on l'ajoute simplement :
	else{
	$_SESSION['panier']['titre'][] = $titre;
	$_SESSION['panier']['id_article'][] = $id_article;
	$_SESSION['panier']['prix'][] = $prix;
	$_SESSION['panier']['quantite'][] = $quantite;
	}
	
	
}
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
		
function montant_total(){
	$total = 0;
	for($i = 0; $i< count($_SESSION['panier']['id_article']);$i++){
		$total += $_SESSION['panier']['prix'][$i] * $_SESSION['panier']['quantite'][$i];
	}
return round($total, 2);
}
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
//::::::::::::::::::::::RETIRER UN ARTICLE DU PANIER::::::::::::::::::::::::::::::::::
		
	function retirer_article_du_panier($id_article_a_supprimer){
//on determine la position de l'article :
		$position_article = array_search($id_article_a_supprimer, $_SESSION['panier']['id_article']);
		if($position_article !== false){
//array_splice supprime des articles et réorganise les indices
//3 arguments : tableau concerné, indice concerné, longueur de la coupe 			
			array_splice($_SESSION['panier']['titre'], $position_article, 1);
			array_splice($_SESSION['panier']['id_article'], $position_article, 1);
			array_splice($_SESSION['panier']['prix'], $position_article, 1);
			array_splice($_SESSION['panier']['quantite'], $position_article, 1);
		}
	}
		

		
	
	
	
	
	
	
	
	
	
	
	