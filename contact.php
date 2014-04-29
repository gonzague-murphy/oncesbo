 <?php
require_once("inc/init.php");
?>
 <div id = "contact">
  <form method = "post">
  <ol>
	<li>
	<label>Nom et prenom : </label>
	<input type= "text"/>
	</li>
	<li>
	<label>E-mail : </label>
	<input type= "email"/>
	</li>
	<li>
	<label>Votre message : </label>
	<textarea rows="15" cols="55">
		Enter your text here...
    </textarea>
	</li>
	<li>
	<input type= "submit" value = "Envoyer" />
	</li>
  </ol>
  </form>