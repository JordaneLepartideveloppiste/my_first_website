<?php require_once('../header_bo.php');?>

<!--Module de téléchargement de fichier média-->
	<div class="container" id="mediaplus">
		<span>Ajouter un media</span>
		<form method="POST" action="traitement_upload.php" enctype="multipart/form-data">
			<input type="file" name="document" id="new_img">
				<img id="test" src="#" alt="">
        	<input type="hidden" name="MAX_FILE_SIZE" value="80000000"><!--input "hidden" pour induire la taille maximum du fichier autorisée-->
        	<input type="submit" name="upload" value="Envoyer le fichier">
    	</form>
	</div>