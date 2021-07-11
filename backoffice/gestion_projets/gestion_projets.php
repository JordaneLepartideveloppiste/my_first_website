<?php require_once('../header_bo.php');?><!--on récupère toutes les données liées au header du back-office-->

<div class="container">
	<h1 id="gestion_proj" class="text-center">Gestion des projets</h1>
	<!--Ici on affiche un tableau regroupant tous les projets clients afin de les modifier et/ou de les (dés)activer-->
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<table class="table table-sm table-striped text-center" id="table_modifProj"> <!--la couleur de fond sera alternée d'une ligne à l'autre (bootstrap : table-striped)-->
					<thead id="thead_modifProj">
						<tr class="text-center" id="tr_modifProj">
							<th></th>
							<th class="col-md-4">Nom</th>
							<th class="col-md-2">Position</th>
							<th class="col-md-2">Image mosaïque</th>
							<th class="col-md-2">État</th>
							<th class="col-md-2">Modifier</th>
						</tr>
					</thead>
					<tbody>
								<!--Les valeurs du formulaire seront renvoyées vers modif_projet.php-->
						<?php
						//on remplit les lignes du tableau grâce à la requête suivante : //
						$sql="SELECT p.id_proj, p.title_proj, p.position_proj, p.activ_proj, p.id_media_bg, m.url_media AS background FROM projects p INNER JOIN medias m ON p.id_media_bg = m.id_media ORDER BY id_proj ASC";
						$resultat = $connexion->select($sql);
						foreach($resultat as $res){
							//Pour chaque projet, $res représente chaque info/case du tableau qui résulte de la requête//?>
						<form action="<?php echo LOCAL_URL; ?>/backoffice/gestion_projets/modif_projet.php" method="get">
						<tr class="text-center">
								<td><input type="hidden" name="id_projet" value="<?php echo $res->id_proj;?>"><?php echo $res->id_proj;?></td><!--l'identifiant du projet-->
								<td class="text-center col-md-4" name="client"><?php echo $res->title_proj;?></td><!--Son titre/ nom du client-->
								<td colonne="position" class="col-md-2" name="position_proj"><input type="hidden" name="position_projet" value="<?php echo $res->position_proj;?>"><?php echo $res->position_proj; ?></td><!--Sa position dans la mosaïque-->
								<td colonne="image" class="col-md-2"><img src="<?php echo $res->background;?>" width="30%"></td><!--L'image de la mosaïque-->
								<td colonne="etat" class="col-md-2"><?php if($res->activ_proj == 0){ echo "<p>Inactif</p>";} else{ echo "<p>Actif</p>";} ?></td>
								<td colonne="modif" class="col-md-2"><button class="btn btn-dark" type="submit" name="submit" value="changer" id="modprj"><i class="fas fa-pencil-alt"></i></button></td><!--le bouton est représenté par un icone "crayon" pour la modification (font-awesome)-->
						</tr>
						</form>
						<?php } ?>
					</tbody>
				</table>
			</div>
				<a href="<?php echo LOCAL_URL; ?>/backoffice/gestion_projets/projet.php" class="btn btn-dark" id="ajoprj">Ajouter un nouveau projet</a>
			</div>