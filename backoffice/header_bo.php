<!DOCTYPE html><!--déclaration du document html-->
<html>

<?php
require_once('../../config.php');//appelle le fichier config.php qui stipule le nom du serveur et de la base données//

?>
    <head><!--metadonnées, link et script-->
	     <title>Neuvième</title>
	     <meta charset="utf-8">
	     <!--Favicon-->
         <link rel="icon" href="<?php echo LOCAL_URL; ?>/assets/img/tampon_blanc.ico" />
         <!--Bootstrap/css-->
         <link href="<?php echo LOCAL_URL; ?>/assets/css/bootstrap.min.css" rel="stylesheet">
         <link href="<?php echo LOCAL_URL; ?>/assets/css/bootstrap-custom.css" rel="stylesheet">
         <!--Style.css-->
         <link href="<?php echo LOCAL_URL; ?>/assets/css/style.css" rel="stylesheet">
         <!--Fontawesome-->
         <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
         <!--Animate-->
         <link rel="stylesheet" href="<?php echo LOCAL_URL; ?>/assets/css/animate.min.css">
         <!--JQuerry-->
         <script type="text/javascript" src="<?php echo LOCAL_URL; ?>/assets/js/jquery-3.4.1.min.js"></script>
         <!--Popper/js-->
         <script type="text/javascript" src="<?php echo LOCAL_URL; ?>/assets/js/popper.min.js"></script>
         <!--Bootstrap/js-->
         <script type="text/javascript" src="<?php echo LOCAL_URL; ?>/assets/js/bootstrap.min.js"></script>
         <!--TinyMCE-->
         <script type="text/javascript" src="<?php echo LOCAL_URL; ?>/assets/tinymce/tinymce.min.js"></script>

        

         
		 

	</head>
    <body>

    <?php
            require_once('../../class/connexion.php');//appel du fichier connexion.php qui fait le lien entre les instructions des fichiers et/ou requêtes php et la base de données//
            $connexion = new Connexion(NOM_BDD);// la variable $connexion sera ainsi appelé pour chaque requête///
        ?>

        <header>
            <!-- Menu latéral -->
            <div class="vertical-nav bg-white" id="sidebar">
              <div class="py-4 px-3 mb-4 bg-header">
                <div class="media d-flex align-items-center"><a href="<?php echo LOCAL_URL; ?>/index.php" class="nav-link"><img src="<?php echo LOCAL_URL;?>/assets/img/tampon_noir.png" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm"></a><!--le logo cache un lien de retour à la vitrine-->
                  <div class="media-body">
                    <h4 class="m-0">Admin</h4>
                    <p class="font-weight-light text-muted mb-0">Pimp my website</p>
                  </div>
                </div>
              </div>

              <ul class="nav flex-column mb-0 navbar"><!-- liste non ordonnée-->
                <!--Projets clients-->
                <li class="nav-item dropdown"><!--onglet du menu-->
                    <a class="nav-link" href="<?php echo LOCAL_URL; ?>/backoffice/gestion_projets/gestion_projets.php" role="button">Projets Clients</a>
                </li>
                <!--Galerie médias-->
                <li class="nav-item dropdown">
                  <a class="nav-link" href="<?php echo LOCAL_URL; ?>/backoffice/gestion_projets/galerie_media.php" role="button" aria-haspopup="true" aria-expanded="false">Médias</a>
                </li>
                <!--Avis-clients-->
                <li class="nav-item dropdown">
                    <a class="nav-link" href="<?php echo LOCAL_URL; ?>/backoffice/gestion_projets/gestion_avis.php" role="button" aria-haspopup="true" aria-expanded="false">Avis Clients</a>
                </li>
                <!--Retour au front-end-->
                <li class="nav-item">
                  <a href="<?php echo LOCAL_URL; ?>/index.php" class="nav-link">Retour au site</a>
                </li>
              </ul>
            </div><!--fin du menu latéral-->
        </header>
        <main class="page-content-bo p-5" id="content">
            