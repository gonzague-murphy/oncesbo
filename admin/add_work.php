<?php
require_once("../inc/init.php");

if(!isset($_SESSION['utilisateur'])){
	header("location :".RACINE_SITE."/admin/admin-path.php");
	exit();
}
if($_POST){
		if(isset($_FILES['photo']['name'])){
			$photo = $_SERVER['DOCUMENT_ROOT'].RACINE_SITE."img/".$_FILES['photo']['name'];
			copy($_FILES['photo']['tmp_name'], $photo);
		}
		else{
			echo "<div class='error'>Photo obligatoire!</div>";
		}
		$titre = htmlentities($_POST['title'], ENT_QUOTES);
		$message = htmlentities($_POST['desc'], ENT_QUOTES);
		$insertPhoto = RACINE_SITE."img/".$_FILES['photo']['name'];
		$query = execute_requete("INSERT INTO works (picture, title, description) VALUES ('$insertPhoto', '$titre', '$message')");
		if($query){
			header('location:dashBoard.php');
			exit();
	}
	else{
		echo "<div class='error'>Un problème est survenu lors de l'ajout de votre chef-d'oeuvre</div>";
	}
}
?>
<div class='addForms'>
<a href= <?php echo RACINE_SITE."admin/dashBoard.php";?>>&larr; Revenir à l'administration</a>
<h4>Nouveau chef-d'oeuvre :</h4>
<form method="post" action="" enctype='multipart/form-data'>
<label for="title">Titre :</label>
<input type="text" name="title" value="<?php if(isset($_POST['title']))  echo $_POST['title']?>" />
<label for="photo">Photo :</label>
<input type="file" name="photo" />
<label for="desc">Description :</label>
<textarea name='desc'></textarea>
<input type="submit" value="Ajouter"/>
</form>
</div>