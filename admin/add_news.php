<?php
require_once("../inc/init.php");

if(!isset($_SESSION['utilisateur'])){
	header("location :".RACINE_SITE."/admin/admin-path.php");
	exit();
}
if($_POST){
	$titre = htmlentities($_POST['title'], ENT_QUOTES);
	$message = htmlentities($_POST['monarticle'], ENT_QUOTES);
	$query = execute_requete("INSERT INTO news (title, date, article) VALUES ('$titre', NOW(), '$message')");
	if($query){
		header('location:dashBoard.php');
		exit();
	}
	else{
		echo "<div class='error'>Un problème est survenu lors de l'ajout de votre news</div>";
	}
}
?>
<div class='addForms'>
<a href= <?php echo RACINE_SITE."admin/dashBoard.php";?>>&larr; Revenir à l'administration</a>
<h4>Nouvel article :</h4>
<form method="post" action="">
<label for="title">Titre :</label>
<input type="text" name="title" value="<?php if(isset($_POST['title']))  echo $_POST['title']?>" />
<label for="monarticle">Article :</label>
<textarea name="monarticle" value="<?php if(isset($_POST['monarticle'])) echo $_POST['monarticle']?>">
</textarea>
<input type="submit" value="Ajouter"/>
</form>
</div>