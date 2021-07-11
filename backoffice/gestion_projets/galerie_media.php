<?php require_once('../header_bo.php');?> <!--Menu latéral back-office et head-->
<!--Upload / Ici on ajoute un média à la base de données-->
<div class="container" id="mediaplus">
		<span>Ajouter un media</span>
		<form method="POST" action="traitement_upload.php" enctype="multipart/form-data"><!--enctype permet d'indiquer la notion d'encodage des fichiers chargés, ici, des médias-->
			<input type="file" name="document" id="new_img"><!--parcourir-->
				<img id="test" src="#" alt="">
        	<input type="hidden" name="MAX_FILE_SIZE" value="5000000"><!--input hidden de contrôle de taille de fichier-->
        	<input type="submit" name="upload" value="Envoyer le fichier">
    	</form>
	</div>
<!--Galerie / Ici on supprime éventuellement un média de la base de données-->

<div class="container" id="galerie">
	<span class="mb-3">Galerie des médias</span>
	<form action="<?php echo LOCAL_URL; ?>/backoffice/gestion_projets/projet.php" method="post">
		<div class="row les_medias">

		<?php
		//Ici la requ^te nous permet de récupérer tous les médias de la bdd//	
		$sql = "SELECT * FROM medias ORDER BY id_media DESC";
		$resultat = $connexion->select($sql);
		foreach ($resultat as $result) { ?>
			<!--pour chaque image de la base de données, on affiche une miniature dans un select radio identifié par l'id_media-->
			<div class="form-check col-md-4 gal_img">	
					<h6 class="ident_med"><?php echo $result->id_media?><h6>
					<img class="med" src="<?php echo $result->url_media?>" alt="<?php echo $result->title_media?>" title="<?php echo $result->title_media?>" width="40%">	
			</div>
	<?php
			}
		?>
		</div>
	</form>
</div>

