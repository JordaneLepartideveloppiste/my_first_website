<!DOCTYPE html>
<html>
<?php
  require_once('./config.php');
?>

	<head>
	     <title>Neuvième</title><!--nom du site-->
	     <meta charset="utf-8">
	     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"><!--Ici on indique que le site est affiché sur une échelle de 1:1 quelque soit l'écran utilisé-->
	     <!--Favicon-->
	     <link rel="icon" href="<?php echo LOCAL_URL; ?>/assets/img/tampon_blanc.ico" /><!--c'est le logo dans l'onglet du navigateur-->
	     <!--Bootstrap/css-->
	     <link href="<?php echo LOCAL_URL; ?>/assets/css/bootstrap.min.css" rel="stylesheet">
	     <!--Style.css-->
	     <link href="<?php echo LOCAL_URL; ?>/assets/css/style.css" rel="stylesheet">
	     <!--Fontawesome-->
	     <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
	     <!--Googleapis
	     l'utilisation de firefox m'a amené à utilisé cette méthode-->
	     <style>
		    @font-face {
		        src: url('https://fonts.googleapis.com/css?family= LibreBaskerville-Italic: 400i | Poppins: 200, 400, 400i, 500, 600');
		    }
		</style>
	     <!--Animate-->
	     <link rel="stylesheet" href="<?php echo LOCAL_URL; ?>/assets/css/animate.min.css">
	     <!--JQuerry-->
	     <script type="text/javascript" src="./assets/js/jquery-3.4.1.min.js"></script>
	     <!--Popper/js-->
	     <script type="text/javascript" src="./assets/js/popper.min.js"></script>
	     <!--Bootstrap/js-->
	     <script type="text/javascript" src="./assets/js/bootstrap.min.js"></script>
	     <!--TinyMCE
	     initialise les textareas dans mes formumaires-->
	     <script type="text/javascript" src="./assets/tinymce/tinymce.min.js"></script>
         <!--Index.js-->
         <script type="text/javascript" src="./assets/js/index.js"></script>

	</head>

 <?php
 	if (isset($_GET['lang'])){
 		$lang = "_EN";
 	} else {
 		$lang = "";
 	}
 ?>
	<body lang="<?php echo $lang;?>">
		<main>
  <?php 
      require_once('./class/connexion.php');
      $connexion = new Connexion(NOM_BDD);// On récupère toutes les données de connexion à mysql(base de données)

   ?>


        











