<?php
require_once("inc/init.php");
if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
	header('news.php');
	exit();
}
$id= htmlentities($_GET['id'], ENT_QUOTES);
$article = execute_requete("SELECT * FROM news WHERE id_news='$id'");
$news = $article->fetch_array(MYSQLI_ASSOC);
//var_dump($news);
echo "<div class='detailArticle'>";
	echo "<h2>".$news['title']."</h2>";
	echo "<span>Posté le : ".date("d/m/Y H:i:s",strtotime($news['date']))."</span>";
	echo "<p>".$news['article']."</p>";

echo "</div>";
?>