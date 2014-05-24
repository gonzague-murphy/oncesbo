<?php
require_once("inc/init.php");
if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
	header('location : /portfolio/works.php');
	exit();
}
$id= htmlentities($_GET['id'], ENT_QUOTES);
$article = execute_requete("SELECT * FROM works WHERE id_works='$id'");
$news = $article->fetch_array(MYSQLI_ASSOC);
//var_dump($news);
echo "<div class='desc'>";
echo "<p>".html_entity_decode($news['description'])."</p>";
echo "</div>";
echo "<div class='detailArticle'>";
	echo "<h2>".$news['title']."</h2>";
	echo "<img src='".$news['picture']."' />";
echo "</div>";

?>