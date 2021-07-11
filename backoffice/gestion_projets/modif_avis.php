<?php require_once('../header_bo.php');?><!--menu et head du back-office-->

<div class="ajout_avis">
	<span class="mb-4">Modifier Avis-Client</span>
	
		
	<?php 
	if (ISSET($_GET['submit'])){
	if($_GET['submit'] == "modifier"){
	//Ici on chercher toutes les informations des avis-clients en base de données//
	$id_avis = $_GET['id_avis'];
	$sql_avis = "SELECT * FROM avis WHERE id_avis = " . $id_avis;
	$resultat = $connexion->select($sql_avis);
	//on remplit ensuite le formulaire ///
	foreach ($resultat as $result)
	 {
	
	?>		
	
	<form action="traitement_avis.php" method="post" class="container formul">	
		<p>Version française</p>
		<div class="form-row" id="txt2">
			<textarea rows="1" cols="60" wrap="hard" class=" col-md-8 contenu" name="avis" id="txta2"><?php echo $result->content_avis;?></textarea>
		</div>
		<p>Version anglaise</p>
		<div class="form-row" id="txt2">		
			<textarea rows="1" cols="60" wrap="hard" class=" col-md-8 contenu" name="avis_EN" id="txta2"><?php echo $result->content_avis_EN;?></textarea>
		</div>
		<div class="form-row">
			<div class="col-sm-12 col-md-6 col-lg-6 mb-3">
				<input type="text" class="form-control" id="client" name="client" value="<?php echo $result->client_avis;?>" placeholder="">
			</div>
		</div>
		<!--Une fois rempli, on peut choisir de changer le contenu ou son état d'activation-->
		<div class="form-row btn-group btn-group-toggle" data-toggle="buttons">
	  						<label class="btn btn-light" id="act">
	   						<input class="form-input" type="radio" name="options"  <?php if($result->active_avis==1){echo "checked";}?> value="1">Activé</label>
	  						<label class="btn btn-light" id="desact">
	    					<input class="form-input" type="radio" name="options" <?php if($result->active_avis==0){echo "checked";}?> value="0">Désactivé</label><!--Tout comme à la création, on choisit d'activer ou non, l'avis modifié-->
	  	</div>
<?php
} } }
?>
		<div class="form-row">
			<input type="hidden" value="<?php echo $_GET['id_avis']?>" name="id_avis"><!-- on récupère l'identifiant de l'avis dans un input hidden pour modifier celui qui nous intéresse-->
			<button class="btn btn-dark boutons" type="submit" name="submit" value="modifier" id="ajout_btn">Valider</button>
		</div>
		
</form>	
</div>
