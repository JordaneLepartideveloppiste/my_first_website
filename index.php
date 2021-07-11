<?php require_once('./header.php');?>
<?php
	//la fonction appelProjet() me permet de faire une requête complète pour afficher chaque élément de la mosaïque en fonction de son état actif et de sa position dans la mosaîque	
		function appelProjet($position){
			require_once('./class/connexion.php');
      		$connexion = new Connexion(NOM_BDD);
		$sql="SELECT p.id_proj, p.title_proj, p.position_proj, p.id_media_bg, m1.url_media AS background, p.id_media_logo, m2.url_media AS logo FROM projects p INNER JOIN medias m1 ON m1.id_media = p.id_media_bg INNER JOIN medias m2 ON m2.id_media = p.id_media_logo WHERE activ_proj=1 AND p.position_proj= " . $position;
		//je récupère les informations du projet ainsi que l'image de fond et le logo du client//
		$magie=$connexion->select($sql);
		return $magie;
	}
?>

<div id="drapeau">
	<?php if($lang=="_EN"){
	echo "<a href='http://localhost/neuvieme/' id='a_flag'>
			<img src='./assets/img/fr_neuvieme.png' id='flag'></a>";
		}else{ 
			echo "<a href='http://localhost/neuvieme/?lang=_EN' id='a_flag'><img src='./assets/img/en_neuvieme.png' id='flag'></a>";} ?>	
	</a>
</div>

<!--Nom de l'agence-->
<div class="titre">
	<figure id="titre_a_cheval">
		<figcaption id="neuvieme">
			<img src="<?php echo LOCAL_URL;?>/assets/img/logotxt_neuvieme_blanc.png" id="tampon"><!--je mets le logo dans un figcaption pour pouvoir le positionné par dessus la vidéo-->
		</figcaption>
		<!--Vidéo de présentation-->
		<video autoplay="autoplay" width="100%" muted preload="auto" loop><!--muted : enlève son et lecteur, autoplay : lance dès chargement de la page, loop : met en boucle-->
		    <source type="video/mp4" src="./assets/img/neuvième.mp4">
		</video>
	</figure>
</div>

<!--Présentation entreprise-->
	<!--Texte d'introduction-->
<div class="container" id="intro">
	<div class="row">
		<div class="presentation col-md-8 m-auto">
			<?php if($lang=="_EN"){ echo "<p>Neuvième is an <em>overall</em> communication agency, specialised in image and brand marketing. Our role?</p>";}else{ echo "<p>Neuvième est une agence de communication <em>globale,</em><br> spécialisée dans l'image et la stratégie de marque. Notre rôle?</p>";} ?>
			
		</div>
	</div>
	<!--Slogan de l'agence-->
	<div class="row">
		<div class="slogan">
			<span id="comprendre" class=" col-sm-4 col-md-4 col-lg-4"><?php if($lang=="_EN"){ echo "Understand. ";}else{ echo "Comprendre. ";} ?></span><span id="creer" class=" col-sm-4 col-md-4 col-lg-4"><?php if($lang=="_EN"){ echo "Create. ";}else{ echo "Créer. ";} ?></span><span id="diffuser" class=" col-sm-4 col-md-4 col-lg-4"><?php if($lang=="_EN"){ echo "Propagate.";}else{ echo "Diffuser.";} ?></span><!--responsive bootstrap pour conserver l'alignement des items du slogan-->
		</div>
	</div>
	<!--Flèche descendante-->
	<img src="<?php echo LOCAL_URL;?>/assets/img/down-arrow(1).png" class="fleche" id="fleche_pres" width="60px">	
</div>

<!--Tampon tournant-->
<div id="spinner">
	<!--Ici, l'image est fixe, elle sera animé dans style.css-->
	<img src="<?php echo LOCAL_URL;?>/assets/img/tampon_blanc.png" id="nine">
</div>

<!--Première mosaïque interactive-->
<div class="container">
	<div class="row mosaik">
<!--Prrojets de 1 à 5-->
						<?php
					for ($i=1; $i<=5; $i++){ 
						$projet=appelProjet($i);
						foreach ($projet as $proj) { 
							$position = $proj->position_proj;	
						?>
		<div <?php switch($position){
						case 1:
							echo "class='mosaique col-sm-12 col-md-12 col-lg-12'";
						break;
						case 2:
							echo "class='mosaique col-sm-12 col-md-4 col-lg-4'";
						break;
						case 3:
							echo "class='mosaique col-sm-12 col-md-8 col-lg-8'";
						break;
						case 4:
							echo "class='mosaique col-sm-12 col-md-7 col-lg-7'";
						break;
						case 5:
							echo "class='mosaique col-sm-12 col-md-5 col-lg-5'";
						break;
			} ?> position="<?php echo $position; ?>" >
							
			<figure>
				<figcaption <?php if($position == 5){
							echo "class='fig_blanc'";} ?>>
					<h4 class="nom_client font-weight-light"><?php echo $proj->title_proj;?></h4>
				</figcaption>
				<a class="modal_projet" anchor_num="<?php echo $i; ?>" role="button">
<!--image de la mosaïque-->
					<img class="client" src="<?php echo $proj->background;?>" id="image-<?php echo $i; ?>">
					<div class="cache btn-modal">
<!--logo du client-->
						<img class="logo_client" id="logo-<?php echo $i; ?>" src="<?php echo $proj->logo;?>">
<!--lien "découvrir"-->
						<span id="lien-<?php echo $i; ?>"><?php if($lang=="_EN"){ echo "discover >";}else{ echo "découvrir >";}?></span>
					</div>
				</a>
			</figure>
		</div>
						<?php
						 }
						  }
						?>
		</div>
	</div>
	

<!--Modal - Présentation Projet Client-->
<div class="modal fade bd-example-modal" id="modalClient" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" id="dialog_carousel" role="document">
    <div class="modal-content" id="contenu_modal_client">
      
    </div>
  </div>
</div>



<!--Présentation des services-->
<div class="container" id="services">
	<div class="row bobox">
		<h3><?php if($lang=="_EN"){ echo "Our services";}else{ echo "Nos services";}?></h3>
     	<div class="row box">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">  
<!--Service réseaux sociaux-->             
				<div class="box-part text-center">
                    <img src="<?php echo LOCAL_URL;?>/assets/img/socialmedia.png" id="soci">
					<div class="title">
						<h4>Social Média</h4>
					</div>               
					<div class="text">
						<span><?php if($lang=="_EN"){ echo "Social media strategy,<br>internet page management,<br>administrative watch ";}else{ echo "Stratégie social média,<br>gestion de votre page, veille<br>(veille et administration)";}?></span>
					</div>                 
				</div>
			</div>	 
<!--Service photo/video-->
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            	<div class="box-part text-center">     
                	<img src="<?php echo LOCAL_URL;?>/assets/img/photovideo.png" id="phot">
					<div class="title">
						<h4>Photo . Vidéo</h4>
					</div>                        
					<div class="text">
						<span><?php if($lang=="_EN"){ echo "Report, documentary,<br>corporate photo/video,<br>cass photos... ";}else{ echo "Reportage, documentaire,<br> video/photo corporate,<br> photos de classe...";}?></span>
					</div>
				</div>
			</div>	
<!--Servoce branding-->
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">        
				<div class="box-part text-center">
					<img src="<?php echo LOCAL_URL;?>/assets/img/empreinte.png" id="empr">                       
					<div class="title">
						<h4>Branding</h4>
					</div>                        
					<div class="text">
						<span><?php if($lang=="_EN"){ echo "Visual identity, Logo<br>creation, variants<br>for all printing supports...";}else{ echo "Identité visuelle, création<br> de logo, déclinaisons<br> sur tous vos supports print...";}?></span>
					</div>  
				</div>
			</div>	 		
		</div>	
	</div>
</div>


<!--Seconde mosaïque interactive-->
<div class="container">
	<div class="container">
	<div class="row mosaik">
<!--Prrojets de 6 à 10-->
						<?php
					for ($i=6; $i<=10; $i++){ 
						$projet=appelProjet($i);
						foreach ($projet as $proj) { 
							$position = $proj->position_proj;	
						?>
		<div <?php switch($position){
						case 6: echo "class='mosaique col-sm-12 col-md-6 col-lg-6'";
						break;
						case 7: echo "class='mosaique col-sm-12 col-md-6 col-lg-6'";
						break;
						case 8: echo "class='mosaique col-sm-12 col-md-4 col-lg-4'";
						break;
						case 9: echo "class='mosaique col-sm-12 col-md-8 col-lg-8'";
						break;
						case 10: echo "class='mosaique col-sm-12 col-md-12 col-lg-12'";
						break;
			} ?> position="<?php echo $position; ?>" >
							
			<figure>
				<figcaption <?php if($position == 7 || $position == 8 || $position == 9){
							echo "class='fig_blanc'";} ?>>
					<h4 class="nom_client font-weight-light"><?php echo $proj->title_proj;?></h4>
				</figcaption>
				<a class="modal_projet" anchor_num="<?php echo $i; ?>" role="button">
					<img class="client" src="<?php echo $proj->background;?>" id="image-<?php echo $i; ?>">
					<div class="cache btn-modal">
						<img class="logo_client" id="logo-<?php echo $i; ?>" src="<?php echo $proj->logo;?>">
						<span id="lien-<?php echo $i; ?>"><?php if($lang=="_EN"){ echo "discover >";}else{ echo "découvrir >";}?></span>
					</div>
				</a>
			</figure>
		</div>
		<?php }
				 } ?>
		</div>
	</div>

<!--Section Notre équipe-->
<div id="equipe">
	<h3 class="text-center"><?php if($lang=="_EN"){ echo "Our team";}else{ echo "Notre équipe";}?></h3>
	<img src="<?php echo LOCAL_URL;?>/assets/img/equipe.png" id="dessin">
	<!--Compteur dynamique-->
	<div class="container" id="comptr">
		<div class="row" id="stat">
	<!--Premier compteur "Création"-->
            <div class="col-md-4 col-sm-12">
                <div class="counter" >
                	<span class="stat-count" id="creation">1789</span>
                    <p class="details"><?php if($lang=="_EN"){ echo "Since";}else{ echo "Création";}?></p>
                </div>
            </div>
    <!--Deuxième compteur "Clients"-->
            <div class="col-md-4 col-sm-12">
                <div class="counter" >
                    <span class="stat-count" id="clients">0</span> 
                    <p class="details">Clients</p>
                </div>
            </div>
    <!--Troisième compteur "Collaborateurs"-->
            <div class="col-md-4 col-sm-12">
                <div class="counter" >
                    <span class="stat-count" id="collab">0</span>
                    <p class="details"><?php if($lang=="_EN"){ echo "Staff";}else{ echo "Collaborateurs";}?></p>
                </div>
            </div>
            <p id="barre">ici on va mettre une barre de séparation et feinter avec un texte transparent</p><!--j'aurais pu mettre aussi un <hr>-->
		</div>
	</div>
</div>	

<!--Carrousel Avis-clients-->
<div id="carouselExampleCaptions" class="carousel slide col-sm-12 col-md-12 col-lg-12" data-ride="carousel">
	<div class=" text-center">
        <h3 class="content-center" id="avis"><?php if($lang=="_EN"){ echo "Our customers notifications";}else{ echo "L'avis de nos clients";}?></h3>
    </div>
    <div class="carousel-inner">
<!--Premier avis-->    	
    	
			    <?php
			    for ($i=0; $i<4; $i++){
		    		$sql_avis = "SELECT id_avis, content_avis". $lang ." AS contentavis, client_avis, active_avis FROM avis WHERE active_avis=1 ORDER BY id_avis ASC LIMIT ".$i.", 1 ";
		    		$resultat = $connexion->select($sql_avis);
		    		foreach ($resultat as $result) {

		    	?>  
		    <div class="carousel-item<?php if($i == 0){ echo ' active'; } ?>">
		    	<!--Pour chaque ligne du tableau retourné par ma requête, je remplis-->
<!--le contenu de l'avis, animé en fondu droite-->	
            <p class="animated fadeInRightBig text-center avis_content slide-delay-1"><?php echo $result->contentavis; ?></p>
<!--et le nom de l'auteur de l'avis, animé en fondu haut-->
            <h5 class="animated fadeInUpBig text-center slide-delay-3"><?php echo $result->client_avis; ?></h5>
        	</div>
<!--Ici, je ferme ma boucle foreach-->
					<?php } } ?>
      	</div>

<!--order-list pour les boutons d'indication des slides-->
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
    </ol> 
<!--flèches qui passent à la suivante/précédente slide-->
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="sr-only">Next</span>
    </a>
</div>
<!--Formulaire de contact-->
  
<div class="contact" id="title_contact">
	<h3><?php if($lang=="_EN"){ echo "Please feel free!";}else{ echo "N'hésitez pas!";}?></h3>
	<img src="<?php echo LOCAL_URL;?>/assets/img/down-arrow(2).png" class="fleche" width="60px" id="fleche_contact">
</div>
<div class="container-fluid contact_form">
	<div class="container">
		<div class="formBox">
			<form id="contact_form" action="" method="post">
				<div class="row ligne-form">
					<div class="col-sm-6">
						<div class="inputBox ">
<!--Prénom-->
							<div class="inputText">
								<label class="formu"><?php if($lang=="_EN"){ echo "First name *";}else{ echo "Prénom *";}?></label>
									<input type="text" name="prenom" class="input" form="contact_form" value="<?php if
(isset($_POST['prenom'])){ echo htmlspecialchars($_POST['prenom']);}?>" required>
								
							</div>
						</div>
					</div>
<!--Nom-->
					<div class="col-sm-6">
						<div class="inputBox">
							<div class="inputText">
								<label class="formu"><?php if($lang=="_EN"){ echo "Name *";}else{ echo "Nom *";}?></label>
									<input type="text" name="nom" class="input" form="contact_form" value="<?php if (
isset($_POST['nom'])){ echo htmlspecialchars($_POST['nom']);}?>" required>
								
							</div>
						</div>
					</div>
				</div>
<!--E-mail-->
				<div class="row ligne-form">
					<div class="col-sm-12">
						<div class="inputBox">
							<div class="inputText mail">
								<label class="formu"><?php if($lang=="_EN"){ echo "Mail adress *";}else{ echo "E-mail *";}?></label>
									<input type="text" name="mail" class="input" form="contact_form" value="<?php if(isset($_POST['email'])){ echo htmlspecialchars($_POST['email']);}?>" required>
								
							</div>
						</div>
					</div>
				</div>	
<!--Message-->
				<div class="row ligne-form">
					<div class="col-sm-12">
						<div class="inputBox">
							<div class="inputText">
								<label class="formu"><?php if($lang=="_EN"){ echo "You have a project? Tell us more *";}else{ echo "Un projet? Dites-nous en un peu plus *";}?>
								</label>
								<textarea class="input textr" rows="5" cols="50" wrap="hard" name="message" form="contact_form" required><?php if(isset($_POST['message'])){ echo htmlspecialchars($_POST['message']);}?></textarea>
							</div>
						</div>
					</div>
				</div>
<!--Selecteur Services-->
				<div class="row serv_form">
					<div class="col-sm-12">
							<p class="formu"><?php if($lang=="_EN"){ echo "Which services are you interested in?";}else{ echo "Par quel(s) service(s) êtes-vous intéressé(e)?";}?></p>
					</div>
				</div>
  				<div class="form-group formu">
  					<div class="row form-check" form="contact_form">
	  					<label class="check"><?php if($lang=="_EN"){ echo "Marketing strategy";}else{ echo "Stratégie marketing";}?>
	    					<input type="checkbox"  name="services[]" form="contact_form">
	  						<span class="checkmark"></span>
						</label>
					</div>
					<div class="row form-check" form="contact_form">
						<label class="check"><?php if($lang=="_EN"){ echo "Logo / Redesign";}else{ echo "Logo / Refonte Logo";}?>
	    					<input type="checkbox"  name="services[]" form="contact_form">
	  						<span class="checkmark"></span>
						</label>
					</div>
					<div class="row form-check" form="contact_form">
						<label class="check"><?php if($lang=="_EN"){ echo "Overall communication";}else{ echo "Communication global";}?>
	    					<input type="checkbox"  name="services[]" form="contact_form">
	  						<span class="checkmark"></span>
						</label>
					</div>
					<div class="row form-check" form="contact_form">
						<label class="check"><?php if($lang=="_EN"){ echo "Edition (leaflet, poster...";}else{ echo "Edition (brochure, affiche...";}?>
	    					<input type="checkbox"  name="services[]" form="contact_form">
	  						<span class="checkmark"></span>
						</label>
					</div>
					<div class="row form-check" form="contact_form">
						<label class="check"><?php if($lang=="_EN"){ echo "Social networks";}else{ echo "Réseaux sociaux";}?>
	    					<input type="checkbox"  name="services[]" form="contact_form">
	  						<span class="checkmark"></span>
						</label>
					</div>
					<div class="row form-check">
						<label class="check">Photo / Vidéo
	    					<input type="checkbox"  name="services[]" form="contact_form">
	  						<span class="checkmark"></span>
						</label>
					</div>
					<div class="row form-check">
						<label class="check"><?php if($lang=="_EN"){ echo "Other";}else{ echo "Autre";}?>
	    					<input type="checkbox"  name="services[]" form="contact_form">
	  						<span class="checkmark"></span>
						</label>
					</div>
				</div>
<!--Envoyer-->
				<div class="row bouton">
					<input type="submit" class="btn" form="contact_form" value="<?php if($lang=="_EN"){ echo 'Send';} else{ echo 'Envoyer';}?>">
				</div>
			</form>
		</div>
  	</div>
</div>                             

<?php
if(isset($_POST['submit'])) {
 	if($_POST['submit'] == "Envoyer"){
    $email_to = "contact@neuvieme.dj";
    $email_subject = "Message provenant du site";
 
    function died($error) {
    	if($lang=="_EN"){ 
    	echo "The form you want to send is invalid. ";
        echo "Please fix following errors :<br /><br />";
        echo $error."<br /><br />";
        echo "Thanks for your understanding.<br /><br />";
    }else{ 
// fonction qui répertorie les messages d'erreur d'invalidation du formulaire de contact
        echo "Le formulaire que vous souhaitez envoyé est invalide. ";
        echo "Veuillez corriger les erreurs ci-dessous :<br /><br />";
        echo $error."<br /><br />";
        echo "Merci pour votre compréhension.<br /><br />";
    }
        die();
    }
 
 
// si la validation des données attendues existe
     if(!isset($_POST['nom']) ||
        !isset($_POST['prenom']) ||
        !isset($_POST['email'])||
        !isset($_POST['message'])) {
     		if($lang=="_EN"){
        died(
'There is sometyhing wrong with your form.'
        	);
    } else {
    	died(
'Le formulaire que vous avez soumis semble poser problème.');}
    }
 
     
 	$prenom = $_POST['prenom']; // required
    $nom = $_POST['nom']; // required
    $email = $_POST['email']; // required
    $message = $_POST['message']; // required
    if(isset($_POST['services'])){
    	foreach ($_POST['services'] as $serv) {
    		$services= $serv;
    		}
    	} // not required
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';



    if(!preg_match($email_exp,$email)) {
    	if($lang=="_EN"){ $error_message .= 'Invalid mail adress';}else{ 
      	$error_message .= 'L\'adresse e-mail que vous avez saisi est invalide.<br />';}
      }
// Prend les caractères alphanumériques + le point et le tiret 6
    	$string_exp = "/^[A-Za-z .'-]+$/";
    if(!preg_match($string_exp,$prenom)) {
    	if($lang=="_EN"){ $error_message .= 'Invalid first name';}else{
//Si la chaîne de caractère que forme $prénom est différentes des caractères autorisés par $string-exp
      	$error_message .= 'Le prénom que vous avez saisi est invalide.<br />';}
      }
//alors on affiche ce message d'erreur
    if(!preg_match($string_exp,$nom)) {
    	if($lang=="_EN"){ $error_message .= 'Invalid name';}else{
      	$error_message .= 'Le nom que vous avez saisi est invalide.<br />';}
      }
    if(strlen($message) < 2) {
//Si la longueur du message ne dépasse pas 2 octet
    	if($lang=="_EN"){ $error_message .= 'Invalid message';}else{
      $error_message .= 'Le message que vous avez saisi est invalide.<br />';}
  	  }  
    if(strlen($error_message) > 0) {
// Si aucun message d'erreur n'est affiché
      died($error_message);
  	  }

  	if($lang=="_EN"){ 
  	$email_message = "Detail.\n\n";
    $email_message .= "Name: ".$nom."\n";
    $email_message .= "First name: ".$prenom."\n";
    $email_message .= "Mail adress: ".$email."\n";
    $email_message .= "Message: ".$message."\n";
    $email_message .= "Services: ".$services."\n";

		}else{
 
    $email_message = "Détail.\n\n";
    $email_message .= "Nom: ".$nom."\n";
    $email_message .= "Prenom: ".$prenom."\n";
    $email_message .= "Email: ".$email."\n";
    $email_message .= "Message: ".$message."\n";
    $email_message .= "Services: ".$services."\n";
		}
 
// creation en-tête mail

    $entete = 'From: '.$email."\r\n".
    'Reply-To: '.$email."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    mail($email_to, $email_subject, $email_message, $entete);
 
     
// Message de succès

    if($lang=="_EN"){ echo "<p>We are you grateful for your message. We will contact you as soon as possible.</p>";}else{ echo "<p>Nous vous remercions pour ce message. Nous vous recontacterons dans les meilleurs délais.</p>";}

    		}
		}
?>
<!--Le Footer-->
<div class="container" id="footer">
<!--intégré au <main> car il a plus une valeur visuelle-->
	<div class="row">
		<div class="col-sm-8 m-auto col-md-3 col-lg-3 logo9">
<!--Le logo de l'agence-->
			<a href=""><img src="<?php echo LOCAL_URL;?>/assets/img/tampon_blanc.png" id="tampon"></a>
		</div>
<!--lien vers la page Facebook-->
		<div class="col-sm-8 m-auto col-md-5 col-lg-5 text-center fb">
			<a href="https://www.facebook.com/neuviemecom" target="_blank"><img src="<?php echo LOCAL_URL;?>/assets/img/logofb.png" title="facebook" id="facebook">
			<span id="txtfb"><?php if($lang=="_EN"){ echo "Join us";}else{ echo "Rejoignez-nous";}?></span></a>
		</div>
	</div>
<!--lien vers le développeur-->
	<div class="row">
		<div class="property m-auto">
			<span>© 2020 - <?php if($lang=="_EN"){ echo "All rights reserved. - Developped by ";}else{ echo "Tous droits réservés. - Développé par ";}?>JLdvpt</span>
		</div>
	</div>
</div>
<?php require_once('./footer.php');?>
