<?php require_once('../header_bo.php');?>
<!--on conserve l'esthétique et l'organisation du back-office-->
<script type="text/javascript" src="<?php echo LOCAL_URL; ?>/assets/js/modif_projet.js"></script>
<!--lien script vers le fichier javascript correspondant-->


<!--Modal Selection médias-->

<div class="modal fade" id="modalImg" tabindex="-1" role="dialog" aria-labelledby="modal_img" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered mw-100 w-100 h-100" role="document">
    	<div class="modal-content container">
      		<div class="modal-header row">
      		</div>
      		<div class="modal-body row" id="modal-body-img"><!--id : "modal-body-img" remplie à la volée par function all-img-json (ajax/javascript)-->
			</div>
			<div class="modal-footer row">
      </div>
    	</div>
  	</div>
</div>

<!--Modifier Projet-->
<div class="container projet">
	<h1 id="custom_project" name="titre_projet" class="text-center">Modifier un projet</h1>
<?php
//Ici, on vérifie que ce soit bien le bouton de modification dont le name est "changer" qui nous renvoie vers ce fichier
if (ISSET($_GET['submit'])){
	if($_GET['submit'] == "changer"){
//Ensuite on fait une requête pour préremplir les éléments du projet en fonction de son identifiant
 	$sql = "SELECT p.id_proj, p.title_proj, p.position_proj, p.id_media_bg, m1.url_media AS background, p.id_media_logo, m2.url_media AS logo, p.id_media_slide_1, m3.url_media AS slide1, p.content_slide_1, p.content_slide_1_EN, p.id_media_slide_2, m4.url_media AS slide2, p.content_slide_2, p.content_slide_2_EN, p.id_media_slide_3, m5.url_media AS slide3, p.content_slide_3, p.content_slide_3_EN, p.activ_proj FROM projects p INNER JOIN medias m1 ON m1.id_media = p.id_media_bg INNER JOIN medias m2 ON m2.id_media = p.id_media_logo INNER JOIN medias m3 ON m3.id_media = p.id_media_slide_1 INNER JOIN medias m4 ON m4.id_media = p.id_media_slide_2 INNER JOIN medias m5 ON m5.id_media = p.id_media_slide_3 WHERE p.id_proj=" . $_GET['id_projet'];
 //Ici, on utilise des alias numérotés (m1,m2,m3,etc...) pour la table média qui doit faire référence aux différentes images du projet
 	$resultat = $connexion->select($sql);
 		foreach ($resultat as $res) {
 		$position = $res->position_proj;
 		echo $position;
 		$actif = $res->activ_proj;
?>
	<form action="traitement_projet.php" method="post" id="form_modif_projet"> <!--Formulaire de modification des projets-->
	<div class="row">	
		<div class="row proj_cli">
			<span class="col-md-2" id="title_projet">Projet-Client</span>
			<div class="form-group col-md-10" id="client">
				<label class="form-label" for="client">
				<input class="form-input" type="text" name="client" value="<?php echo $res->title_proj;?>"></label>
				<input type="hidden" value="<?php echo $res->id_proj;?>" name="id_proj">
			</div>
		</div>
	</div>
<!-- Choix de la position du projet sur la page-->
  	<div class="row">
		<span class="col-md-2">Position</span>
		<!--Première mosaïque-->
		<div class="col-md-5" id="premiere">
			<div class="row">
				<div class="form-check radio_po col-md-12 mos1"><!--pour la position, on utilise un formulaire de checkbox radio car un projet n'est positionné que sur une seule position-->
					<label class="btn btn-light posit" id="un">
					<input class="form-input" type="radio" name="position" id="pos1" <?php if ($res->position_proj == 1) { 
							echo "checked"; 
						} ?> value="1"> 1. <em>Taille img: 1366x570</em><!--J'indique visuellement la taille de l'image pour que l'administrateur conserve les proportions de la mosaïque-->
					</label>
				</div>
			</div>
			<div class="row">
				<div class="form-check radio_po col-md-5 mos1">
					<label class="btn btn-light posit" id="deu">
					<input class="form-input" type="radio" name="position" id="pos2" <?php  if ($position == 2) { 
						 	echo "checked"; 
						} ?> value="2"> 2. <em>Taille img: 472x570</em><!--un bouton radio n'offre qu'une seule possibilité, qu'une réonse-->
					</label>
				</div>				
				<div class="form-check radio_po col-md-7 mos1">
					<label class="btn btn-light posit" id="trois">
					<input class="form-input" type="radio" name="position" id="pos3" <?php if ($position == 3) { 
						 	echo "checked"; 
						} ?> value="3"> 3. <em>Taille img: 894x570</em><!--J'indique la valeur du positionnement dans l'id pour le css, dans la value pour le php et visuellemnt pour l'administrateur--> 
					</label>
				</div>
			</div>
			<div class="row">
				<div class="form-check radio_po col-md-7 mos1">
					<label class="btn btn-light posit" id="quatre">
					<input class="form-input" type="radio" name="position" id="pos4" <?php if ($position == 4) { 
							echo "checked"; 
						} ?> value="4"> 4. <em>Taille img: 780x570</em> 
					</label>
				</div>
				<div class="form-check radio_po col-md-5 mos1">
					<label class="btn btn-light posit" id="cinq">
					<input class="form-input" type="radio" name="position" id="pos5" <?php if($position == 5) { 
						 	echo "checked"; 
						} ?> value="5"> 5. <em>Taille img: 586x570</em> 
					</label>
				</div>
			</div>
		</div>
		<!--Deuxième mosaïque-->
		<div class="col-md-5" id="deuxieme">
			<div class="row">
				<div class="form-check radio_po col-md-6 mos2">
					<label class="btn btn-light posit" id="six">
					<input class="form-input" type="radio" name="position" id="pos6" <?php if ($position == 6) { 
						 	echo "checked"; 
						 } ?> value="6"> 6. <em>Taille img: 639x570</em> 
						</label>
				</div>
				<div class="form-check radio_po col-md-6 mos2">
					<label class="btn btn-light posit" id="sept">
					<input class="form-input" type="radio" name="position" id="pos7" <?php if ($position == 7) { 
						 	echo "checked"; 
						 } ?> value="7"> 7. <em>Taille img: 727x570</em> 
						</label>
				</div>
			</div>
			<div class="row">
				<div class="form-check radio_po col-md-4 mos2">
					<label class="btn btn-light posit" id="huit">
					<input class="form-input" type="radio" name="position" id="pos8"<?php if ($position == 8) { 
						echo "checked"; 
					} ?> value="8"> 8. <em>Taille img: 471x570</em> 
						</label>
				</div>
				<div class="form-check radio_po col-md-8 mos2">
					<label class="btn btn-light posit" id="neuf">
					<input class="form-input" type="radio" name="position" id="pos9" <?php if ($position == 9) { 
						echo "checked"; 
					} ?> value="9"> 9. <em>Taille img: 895x570</em> 
						</label>
				</div>
			</div>
			<div class="row">
				<div class="form-check radio_po col-md-12 mos2">
					<label class="btn btn-light posit" id="dix">
					<input class="form-input" type="radio" name="position" id="pos10" <?php if ($position == 10) { 
						echo "checked"; 
					} ?> value="10"> 10. <em>Taille img: 1366x570</em> 
						</label>
				</div>
			</div>
		</div>
	</div>


<!--Formulaire Images projet-->

				<div class="row">
					<span class="col-md-4 titup">Logo client</span><!--la class "titup" est un repère css-->
					<div id="image_input1" class="input_image col-md-3">
						<img src="<?php echo $res->logo; ?>" class="modif_img" id="miniature_1">
						<input class="modif_id_img" type="text" name="id_media_1" value="<?php echo $res->id_media_logo; ?>"> 
					</div>
					<div class="btn btn-dark choix col-md-4" type="bouton"  bouton-num="1">Sélectionner</div><!--Bouton "Sélectionner" qui ouvre la modale des médias, de class : "choice", il est le déclencheur de la fonction all-img-json-->
					<div class="mediaplus col-md-1" id="media-1">
					</div>												
				</div>   		
	        	<div class="row">
					<span class="col-md-4 titup">Image projet</span>
					<div id="image_input2" class="input_image col-md-3">
						<img src="<?php echo $res->background; ?>" class="modif_img" id="miniature_2" >
						<input class="modif_id_img" type="text" name="id_media_2" value="<?php echo $res->id_media_bg; ?>">
					</div>
					<div class="btn btn-dark choix col-md-4" type="bouton"  bouton-num="2">Sélectionner</div><!--l'attribut "bouton-num" va nous permettre de cibler le médias correspondants en javascript-->
					<div class="mediaplus col-md-1" id="media-2">	
					</div>									
				</div>
				<div class="row">
					<span class="col-md-4 titup">Slide 1</span>
					<div id="image_input3" class="input_image col-md-3">
						<img src="<?php echo $res->slide1; ?>" class="modif_img" id="miniature_3" >
						<input class="modif_id_img" type="text" name="id_media_3" value="<?php echo $res->id_media_slide_1; ?>">
					</div>
					<div class="btn btn-dark choix col-md-4" type="bouton"  bouton-num="3">Sélectionner</div>
					<div class="mediaplus col-md-1" id="media-3">
					</div>				
				</div>
				<div class="row txt">
					<span class="col-md-4">Texte Slide 1</span>
					<textarea rows="1" cols="60" wrap="hard" class="txta col-md-7 contenu" name="text_slide1"><?php echo $res->content_slide_1; ?></textarea><!--Ici, les tex col-md-3tarea sont générés par tynimce-->
				</div>
				<div class="row txt">
					<span class="col-md-4">Texte Slide 1 EN</span>
					<textarea rows="1" cols="60" wrap="hard" class="txta col-md-7 contenu" name="text_slide1_EN"><?php echo $res->content_slide_1_EN; ?></textarea><!--Ici, les tex col-md-3tarea sont générés par tynimce-->
				</div>
	        	<div class="row">
					<span class="col-md-4 titup">Slide 2</span>
					<div id="image_input4" class="input_image col-md-3">
						<img src="<?php echo $res->slide2; ?>" class="modif_img" id="miniature_4" >
						<input class="modif_id_img" type="text" name="id_media_4" value="<?php echo $res->id_media_slide_2; ?>">
					</div>
					<div class="btn btn-dark choix col-md-4" type="bouton" bouton-num="4">Sélectionner</div><!--on gerde le bouton noir pour une cohérence d'esthétique avec le front-end-->
					<div class="mediaplus col-md-1" id="media-4">
					</div>				
				</div>
	        	<div class="row txt">
					<span class="col-md-4">Texte Slide 2</span>
					<textarea rows="1" cols="60" wrap="hard" class="txta col-md-7 contenu" name="text_slide2"><?php echo $res->content_slide_2; ?></textarea>
				</div>_EN
				<div class="row txt">
					<span class="col-md-4">Texte Slide 2 EN</span>
					<textarea rows="1" cols="60" wrap="hard" class="txta col-md-7 contenu" name="text_slide2_EN"><?php echo $res->content_slide_2_EN; ?></textarea>
				</div>
	        	<div class="row">
					<span class="col-md-4 titup">Slide 3</span>
					<div id="image_input5" class="input_image col-md-3">
						<img src="<?php echo $res->slide3; ?>" class="modif_img" id="miniature_5" >
						<input class="modif_id_img" type="text" name="id_media_5" value="<?php echo $res->id_media_slide_3; ?>">
					</div>
					<div class="btn btn-dark choix col-md-4" type="bouton" bouton-num="5">Sélectionner</div>
					<div class="mediaplus col-md-1" id="media-5">
						
					</div>								
				</div>
	        	<div class="row txt">
					<span class="col-md-4">Texte Slide 3</span>
					<textarea rows="1" cols="60" wrap="hard" class="txta col-md-7 contenu" name="text_slide3"><?php echo $res->content_slide_3; ?></textarea>
				</div>
				<div class="row txt">
					<span class="col-md-4">Texte Slide 3 EN</span>
					<textarea rows="1" cols="60" wrap="hard" class="txta col-md-7 contenu" name="text_slide3_EN"><?php echo $res->content_slide_3_EN; ?></textarea>
				</div>
				<!--comme pour la partie avis-client, ici, on propose d'activer ou non le projet-->
				<div class="row">
					<span class="col-md-2" id="activation">Activation</span>
					<div class="btn-group btn-group-toggle activate col-md-10" data-toggle="buttons">
							<label class="btn btn-light" id="act">
							<input class="form-input" type="radio" name="activation" value="1" <?php
							if ($actif == "1") { 
								echo "checked"; 
							} ?> form="form_modif_projet">Activé</label>
							<label class="btn btn-light" id="desact">
						<input class="form-input" type="radio" name="activation" value="0" <?php
							if ($actif == "0") { 
								echo "checked"; 
							} ?> form="form_modif_projet">Désactivé</label>
						</div>
					</div>
				<div class="row">
					<button class="btn btn-dark" type="submit" name="submit" value="modifier" id="nvprj" form="form_modif_projet">Modifier</button>
				</div>
		</div>
             <?php } } } ?>
		
	</div>
	</form>
</div>
<!--Script pour le fonctionnement de tynimce pour les textarea-->
<script type="text/javascript">
			tinymce.init({
			selector: '.contenu',
			language: 'fr_FR',
	        plugins: [
	        "link preview hr anchor pagebreak",
	        "searchreplace wordcount visualblocks visualchars code fullscreen",
	        "insertdatetime media nonbreaking contextmenu directionality",
	        "template paste textcolor colorpicker textpattern"
	        ],
	        toolbar1: "undo redo | bold italic | alignleft aligncenter alignright alignjustify |preview"
	    	});
		</script>