<?php require_once('../header_bo.php');?> <!--on récupère le header du back-office avec son menu latéral-->
<!--on récupère les données concernant les avis en base de données grâce à la requête suivante-->
<?php
			$sql = "SELECT * FROM avis ORDER BY id_avis DESC";
			$resultat= $connexion->select($sql);?>

<!--Ajouter avis-->
<div class="ajout_avis">
	<span class="mb-4">Nouvel Avis-Client</span>
	<form action="traitement_avis.php" method="post" class="container formul"> <!--traité en méthode post, les informations du formulaire seront traitées sur un fichier à part-->
		
			
		<p>Version française</p>
		<div class="form-row" id="txt2"> <!--ligne du formulaire-->
			<textarea rows="1" cols="60" wrap="hard" class=" col-md-8 contenu" name="avis" id="txta2"></textarea><!--Zone de texte avis client à remplir-->
		</div>
		<p>Version anglaise</p>
		<div class="form-row" id="txt2"> <!--ligne du formulaire-->	
			<textarea rows="1" cols="60" wrap="hard" class=" col-md-8 contenu" name="avis_EN" id="txta2"></textarea><!--Zone de texte avis client à remplir-->
		</div>
		<div class="form-row">
			<div class="col-sm-12 col-md-6 col-lg-6 mb-3">
				<input type="text" class="form-control" id="client" name="client" value="" placeholder="Nom du client"><!--Input Nom du client à remplir-->
			</div>
		</div>
		<div class="btn-group btn-group-toggle" data-toggle="buttons"><!--Boutons de sélection d'activation de l'avis sur le site-->
	  						<label class="btn btn-light" id="act">
	   						<input class="form-input" type="radio" name="options" value="1" checked>Activé</label>
	   						<!--Activé en value "1", booléen true-->
	  						<label class="btn btn-light" id="desact">
	    					<input class="form-input" type="radio" name="options" value="0">Désactivé</label>
	    					<!--Désactivé en value "0", booléen false-->
	  					</div>
		<div class="form-row">
			<button class="btn btn-dark boutons" type="submit" name="submit" value="ajouter" id="ajout_btn">Valider</button>
			<!--bouton de validation du formulaire-->
		</div>
	</form>		
</div>

		</div>

