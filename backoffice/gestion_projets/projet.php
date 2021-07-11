<?php require_once('../header_bo.php');?><!--configuration du back-office et menu latéral-->
<script type="text/javascript" src="<?php echo LOCAL_URL; ?>/assets/js/projet.js"></script><!--lien script vers le fichier javascript correspondant-->

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

<!--Ajouter Projet-->
<div class="container projet">
	<h1 id="custom_project" name="titre_projet" class="text-center">Ajouter un projet</h1><!--titre de la page-->
	<form action="traitement_projet.php" method="post" id="form_projet">
	<div class="row">	
		<div class="row proj_cli">
			<span class="col-md-2" id="title_projet">Projet-Client</span><!--on indique le nom du client-->
			<div class="form-group col-md-10" id="client">
				<label class="form-label" for="client">
				<input class="form-input" type="text" name="client" form="form_projet"></label>
			</div>
		</div>
	</div>

<!-- Choix de la position du projet dans la mosaîque de la page-->
  	<div class="row">
		<span class="col-md-2">Position</span>
		<!--première mosaîque-->
		<div class="col-md-5" id="premiere">
			<div class="row">
				<!--formulaire radio-select-->
				<div class="form-check radio_po col-md-12 mos1">
					<label class="btn btn-light posit" id="un">
					<input class="form-input" type="radio" name="position" id="pos1" form="form_projet" value="1"> 1. <em>Taille img: 1366x570</em><!--bouton radio pour une unique position-->
					</label>
				</div>
			</div>
			<div class="row">
				<div class="form-check radio_po col-md-5 mos1">
					<label class="btn btn-light posit" id="deu">
					<input class="form-input" type="radio" name="position" id="pos2" form="form_projet" value="2"> 2. <em>Taille img: 472x570</em><!--la position est stipulée en value pour javascript, en identifiant pou css et sur le bouton pour le visuel du back-office-->
					</label>
				</div>				
				<div class="form-check radio_po col-md-7 mos1">
					<label class="btn btn-light posit" id="trois">
					<input class="form-input" type="radio" name="position" id="pos3" form="form_projet" value="3"> 3. <em>Taille img: 894x570</em><!--à chaque position correspond une taille de média à respecter-->
					</label>
				</div>
			</div>
			<div class="row">
				<div class="form-check radio_po col-md-7 mos1">
					<label class="btn btn-light posit" id="quatre">
					<input class="form-input" type="radio" name="position" id="pos4" form="form_projet" value="4"> 4. <em>Taille img: 780x570</em> 
					</label>
				</div>
				<div class="form-check radio_po col-md-5 mos1">
					<label class="btn btn-light posit" id="cinq">
					<input class="form-input" type="radio" name="position" id="pos5" form="form_projet" value="5"> 5. <em>Taille img: 586x570</em> 
					</label>
				</div>
			</div>
		</div>
		<!--deuxième mosaïque-->
		<div class="col-md-5" id="deuxieme">
			<div class="row">
				<div class="form-check radio_po col-md-6 mos2"><!--class : "mos2" pour visuel (css)identique à la mosaïque en front-end-->
					<label class="btn btn-light posit" id="six">
					<input class="form-input" type="radio" name="position" id="pos6" form="form_projet" value="6"> 6. <em>Taille img: 639x570</em> 
						</label>
				</div>
				<div class="form-check radio_po col-md-6 mos2">
					<label class="btn btn-light posit" id="sept">
					<input class="form-input" type="radio" name="position" id="pos7" form="form_projet" value="7"> 7. <em>Taille img: 727x570</em> 
						</label>
				</div>
			</div>
			<div class="row">
				<div class="form-check radio_po col-md-4 mos2">
					<label class="btn btn-light posit" id="huit">
					<input class="form-input" type="radio" name="position" id="pos8" form="form_projet" value="8"> 8. <em>Taille img: 471x570</em> 
						</label>
				</div>
				<div class="form-check radio_po col-md-8 mos2">
					<label class="btn btn-light posit" id="neuf">
					<input class="form-input" type="radio" name="position" id="pos9" form="form_projet" value="9"> 9. <em>Taille img: 895x570</em> 
						</label>
				</div>
			</div>
			<div class="row">
				<div class="form-check radio_po col-md-12 mos2">
					<label class="btn btn-light posit" id="dix">
					<input class="form-input" type="radio" name="position" id="pos10" form="form_projet" value="10"> 10. <em>Taille img: 1366x570</em> 
						</label>
				</div>
			</div>
		</div>
	</div>
<!--Formulaire Images projet-->
				<div class="row">
					<span class="col-md-4 titup">Logo client</span>
					<div class="btn btn-dark choice col-md-4" type="bouton"  bouton-num="1">Sélectionner</div><!--attribut "bouton-num" pour argument de la fonction bindMediaCilck()-->
					<div class="mediaplus" id="media-1"></div>
				</div>   		
	        	<div class="row">
					<span class="col-md-4 titup">Image projet</span>
					<div class="btn btn-dark choice col-md-4" type="bouton"  bouton-num="2">Sélectionner</div><!-- class : "choice" pour évènement javascript-->
					<div class="mediaplus" id="media-2"></div>
				</div>
				<!--Contenus modale projet-->
				<div class="row">
					<!--un carrousel jusqu'à trois slides-->
					<span class="col-md-4 titup">Slide 1</span>
					<div class="btn btn-dark choice col-md-4" type="bouton"  bouton-num="3">Sélectionner</div><!--bouton noir (bootstrap)-->
					<div class="mediaplus" id="media-3"></div><!--img slide 1-->				
				</div>
				<div class="row txt">
					<span class="col-md-4">Texte Slide 1</span>
					<textarea rows="1" cols="60" wrap="hard" class="txta col-md-8 contenu" form="form_projet" name="text_slide1"></textarea><!--Texte explicatif slide 1 / Tynimce-->
				</div>
				<div class="row txt">
					<span class="col-md-4">Texte Slide 1 EN</span>
					<textarea rows="1" cols="60" wrap="hard" class="txta col-md-8 contenu" form="form_projet" name="text_slide1_EN"></textarea><!--Texte explicatif slide 1 / Tynimce-->
				</div>
	        	<div class="row">
					<span class="col-md-4 titup">Slide 2</span>
					<div class="btn btn-dark choice col-md-4" type="bouton" bouton-num="4">Sélectionner</div>
					<div class="mediaplus" id="media-4"></div>				
				</div>
	        	<div class="row txt">
					<span class="col-md-4">Texte Slide 2</span>
					<textarea rows="1" cols="60" wrap="hard" class="txta col-md-8 contenu" form="form_projet" name="text_slide2"></textarea>
				</div>
				<div class="row txt">
					<span class="col-md-4">Texte Slide 2 EN</span>
					<textarea rows="1" cols="60" wrap="hard" class="txta col-md-8 contenu" form="form_projet" name="text_slide2_EN"></textarea>
				</div>
	        	<div class="row">
					<span class="col-md-4 titup">Slide 3</span>
					<div class="btn btn-dark choice col-md-4" type="bouton" bouton-num="5">Sélectionner</div>
					<div class="mediaplus" id="media-5"></div>								
				</div>
	        	<div class="row txt">
					<span class="col-md-4">Texte Slide 3</span>
					<textarea rows="1" cols="60" wrap="hard" class="txta col-md-8 contenu" form="form_projet" name="text_slide3"></textarea>
				</div>
				<div class="row txt">
					<span class="col-md-4">Texte Slide 3 EN</span>
					<textarea rows="1" cols="60" wrap="hard" class="txta col-md-8 contenu" form="form_projet" name="text_slide3_EN"></textarea>
				</div>
<!-- Activation du projet-->
				<div class="row">
					<span class="col-md-2" id="activation">Activation</span>
					<div class="btn-group btn-group-toggle activate col-md-10" data-toggle="buttons">
							<label class="btn btn-light" id="act">
							<input class="form-input" type="radio" name="activation" value="1" checked form="form_projet">Activé</label>
							<!--par défaut le bouton "activé" est coché-->
							<label class="btn btn-light" id="desact">
							<input class="form-input" type="radio" name="activation" value="0" form="form_projet">Désactivé</label>
						</div>
					</div>
				<div class="row">
					<button class="btn btn-dark" type="submit" name="submit" value="enregistrer" id="nvprj" form="form_projet">Enregistrer</button>
				</div><!-- submit "enregistrer" cf traitement-projet.php-->
		</div>
<!--script TinyMCE-->
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
	</div>
	</form>
</div>