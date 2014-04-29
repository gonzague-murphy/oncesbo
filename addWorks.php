<?php
require_once("inc/init.php");
if(!isset($_SESSION)){
	header("Location :".RACINE_SITE);
}
echo $msg;
?>
<a href='#'><span>+</span>Ajouter un item à mon portfolio</a>
<?php
$pullWorks = execute_requete("SELECT * FROM works");
$works = $pullWorks->fetch_all(MYSQLI_ASSOC);
foreach($works as $key=>$value){
	echo "<img src='".$value['picture']."' />";
	echo "<h4>".$value['title']."</h4>";
}