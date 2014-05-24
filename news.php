<?php
require_once("inc/init.php");

echo $msg;
?>
<div class='backoffice'>
<h3>Les dernières news ajoutées :</h3>
<?php
$pullNews = execute_requete("SELECT * FROM news ORDER BY date DESC");
$news = $pullNews->fetch_all(MYSQLI_ASSOC);
foreach($news as $key=>$value){
	echo "<div class='postArticle'>";
	echo "<h4>".$value['title']."</h4>";
	echo "<span>Posté le: ".date("d/m/Y H:i:s",strtotime($value['date']))."</span>";	
	echo "<p>";
	$string = strip_tags(html_entity_decode($value['article']));
	if (strlen($string) > 300) {

    // truncate string
    $stringCut = substr($string, 0, 300);

    // make sure it ends in a word so assassinate doesn't become ass...
    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href="article.php?id='.$value['id_news'].'">Lire la suite</a>'; 
}
	echo $string;
	echo "</p>";
	echo "</div>";
}
?>
</div>