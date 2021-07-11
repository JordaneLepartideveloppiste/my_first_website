<?php require_once('../header_bo.php');?><!--on récupère toutes les données liées au header du back-office-->

<div class="container">
	<h1 id="gestion_proj" class="text-center">Gestion des avis-clients</h1>
	<!--Ici on affiche un tableau regroupant tous les projets clients afin de les modifier et/ou de les (dés)activer-->
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<table class="table table-sm table-striped text-center" id="table_modifAvis"> <!--la couleur de fond sera alternée d'une ligne à l'autre (bootstrap : table-striped)-->
					<thead id="thead_modifAvis">
						<tr class="text-center" id="tr_modifProj">
						  <th></th>	
					      <th scope="col">Avis</th>
					      <th scope="col">Avis EN</th>
					      <th scope="col">Client</th>
					      <th scope="col">Activation</th>
					      <th scope="col">Modifier</th>
					      <th></th>	
					      <th scope="col">Supprimer</th>
						</tr>
					</thead>
					<tbody>
					
<!--Les valeurs du formulaire seront renvoyées vers modif_projet.php-->
						<?php
//on remplit les lignes du tableau grâce à la requête suivante : //
						$sql="SELECT * FROM avis ORDER BY id_avis ASC";
						$resultat = $connexion->select($sql);
						foreach($resultat as $res){
//Pour chaque projet, $res représente chaque info/case du tableau qui résulte de la requ^te//
						?>
						<tr class="text-center">
<!--l'identifiant de l'avis-->
							<form action="<?php echo LOCAL_URL; ?>/backoffice/gestion_projets/modif_avis.php" method="get" id="form_id_avis">
								<td><input type="hidden" name="id_avis" value="<?php echo $res->id_avis;?>"></td><!--l'identifiant de l'avis-->
								<td colonne="avis" class="col-md-2" name="content_avis"><?php echo $res->content_avis; ?></td><!--L'avis en français-->
								<td colonne="avis_EN" class="col-md-2" name="content_avis_EN"><?php echo $res->content_avis_EN; ?></td><!--L'avis en anglais-->
								<td class="text-center col-md-2" name="client"><?php echo $res->client_avis;?></td><!--Le nom du client-->
								<td colonne="etat" class="col-md-2"><?php if($res->active_avis == 0){ echo "<p>Inactif</p>";} else{ echo "<p>Actif</p>";} ?></td>
								<td colonne="modif" class="col-md-2"><button class="btn btn-dark" type="submit" name="submit" value="modifier" id="modavis"><i class="fas fa-pencil-alt"></i></button></td><!--le bouton est représenté par un icone "crayon" pour la modification (font-awesome)-->
							</form>
							<form action="<?php echo LOCAL_URL; ?>/backoffice/gestion_projets/traitement_avis.php" method="post" id="form_supp_id_avis">
								<td><input type="hidden" name="id_avis" value="<?php echo $res->id_avis;?>"></td><!--l'identifiant de l'avis-->
								<td colonne="suppr" class="col-md-2"><button class="btn btn-dark" type="submit" name="submit" value="supprimer" id="suppravis"><i class="fas fa-trash-alt"></i></button></td><!--le bouton est représenté par un icone "poubelle" pour la suppression (font-awesome)-->
							</form>
						</tr>
						<?php } ?>
					</form>
					</tbody>
				</table>
			</div>
				<a href="<?php echo LOCAL_URL; ?>/backoffice/gestion_projets/avis_client.php" class="btn btn-dark" id="ajoavis">Ajouter un nouvel avis</a>
			</div>