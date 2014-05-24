  <div class = "boxOne">
  <ol class = "tabs">
  <li><a href="<?php echo RACINE_SITE; ?>about.php">About</a></li>
  <li><a href="<?php echo RACINE_SITE; ?>works.php">works</a></li>
  <li><a href="<?php echo RACINE_SITE; ?>news.php">news</a></li>
  <li><a href="<?php echo RACINE_SITE; ?>contact.php">contact</a></li>
  <?php
  if(isset($_SESSION['utilisateur']) && $_SESSION['utilisateur']['statut'] == 1){
		echo "<li><a href='".RACINE_SITE."admin/dashBoard.php'>admin</a></li>";
  }
  ?>
  </ol>