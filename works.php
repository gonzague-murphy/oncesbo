<?php
require_once("inc/init.php");
?>
<div class='backoffice'>
		 <ul>
<?php
$pullWorks = execute_requete("SELECT * FROM works");
$works = $pullWorks->fetch_all(MYSQLI_ASSOC);
foreach($works as $key=>$value){
	echo "<li><h4>".$value['title']."</h4>";
	echo "<a href='/portfolio/project.php?id=".$value['id_works']."'><img src='".$value['picture']."' /></a>";
	echo "</li>";
}
?>
	     </ul>
</div>