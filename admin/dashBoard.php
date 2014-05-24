<?php
require_once("../inc/init.php");

if(!isset($_SESSION['utilisateur'])){
	header("location :".RACINE_SITE."/index.php");
	exit();
}
echo $msg;
if(isset($_GET['action']) && is_numeric($_GET['id'])){
	if($_GET['action'] == 'deleteWork'){
		$idWork = htmlentities($_GET['id'], ENT_QUOTES);
		$delWork = execute_requete("DELETE FROM works WHERE id_works='$idWork'");
		/*if($delWork){
			header('location : dashBoard.php');
			exit();
		}*/

	}
	elseif($_GET['action'] == 'deleteArticle'){
		$idArt = htmlentities($_GET['id'], ENT_QUOTES);
		$delWork = execute_requete("DELETE FROM news WHERE id_news='$idArt'");
	}
}

?>
<div class='backoffice'>
<a href='add_work.php'><span>+</span>Ajouter un item à mon portfolio</a>
<a href='add_news.php'><span>+</span>Ajouter une news</a>
<h3>Mes derniers travaux ajoutés :</h3>
<ul>
<?php
$pullWorks = execute_requete("SELECT * FROM works");
$works = $pullWorks->fetch_all(MYSQLI_ASSOC);
foreach($works as $key=>$value){
	echo "<li><h4>".$value['title']."</h4>";
	echo "<a href='?action=deleteWork&id=".$value['id_works']."' class='suppr'>✘ Supprimer ce projet</a><br/>";
	echo "<img src='".$value['picture']."' />";
	
	echo "</li>";
}
?>
</ul>
<h3>Les dernières news ajoutées :</h3>
<ul class='articles'>
<?php
$pullNews = execute_requete("SELECT * FROM news ORDER BY date ASC");
$news = $pullNews->fetch_all(MYSQLI_ASSOC);
foreach($news as $key=>$value){
	echo "<li class='postArticle'>";
	echo"<h4>".$value['title']."</h4>";
	echo "<a href='?action=deleteArticle&id=".$value['id_news']."' class='suppr'>✘ Supprimer cet article</a><br/>";
	echo "<span>Posté le: ".date("d/m/Y H:i:s",strtotime($value['date']))."</span>";	
	echo "<p>";
	$string = strip_tags($value['article']);
	if (strlen($string) > 100) {

    // truncate string
    $stringCut = substr($string, 0, 100);

    // make sure it ends in a word so assassinate doesn't become ass...
    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href="/this/story">Lire la suite</a>'; 
}
	echo $string;
	echo "</p>";
	
	echo "</li>";
}
?>
</ul>
</div>