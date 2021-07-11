<?php require_once('../header_bo.php');?><!--on conserve l'apparence du back-office et les liens et les scripts-->


<?php
	if(isset($_FILES['document'])){//Est-ce qu'un fichier a été télécharger//
	//$_FILES regroupe toutes les données du fichier//

		//variables fichier
		$dossier = "upload/";//où sont répertoriés les fichiers téléchargés//
		$fichier = strtolower(preg_replace('/([^.a-z0-9]+)/i', '-', basename($_FILES['document']['name'])));//on met en minuscule le nom du fichier et on indique le format d'écriture
		$tmp = $_FILES['document']['tmp_name'];
		//variables des extensions autorisées pour le type de fichier
		$extensions_autorisées = array('.jpeg','.jpg','.pdf','.gif', '.png', '.mp4', '.mov');
		$extension_du_fichier = strrchr($fichier, '.');
		//taille maximum du fichier autorisée
		$taille_max = 800000000;
		$taille_fichier = $_FILES['document']['size'];
		//$taille_fichier = filesize($tmp);

		if($taille_fichier < $taille_max){//On teste la taille du fichier
			if(in_array($extension_du_fichier, $extensions_autorisées)){// si la taille est bonne, on teste si l'extension du fichier correspond
				$nb = $connexion->select("SELECT * FROM medias WHERE title_media='" . $fichier . "'");// on vérifie si ce fichier existe dans la bdd
	    			if ($nb->rowCount() == 0){//S'il n'existe pas dans la bdd
						if(move_uploaded_file($tmp, $dossier . $fichier)){//Enfin si un fichier répondant aux critères précédent à été télécharger//
							//Alors on insère le fichier dans la table médias//
							//Sauvegarde//
							$sql = "INSERT INTO medias(url_media,title_media,extension_media) VALUES('" . LOCAL_URL . "/backoffice/gestion_projets/" . $dossier . $fichier . "','" . $fichier . "','" . substr(strrchr($fichier,'.'),1) . "')";
							if($connexion->insert($sql) > 0){// Si l'insertion a été effectué
									echo 'Félicitations! Votre média a bien été transféré vers la base de données.';//success
								} else {
									echo 'Une erreur est apparue dans le chargement de votre image, veuillez réessayer.';}//error
							} else {
								echo "Le fichier n'a pu être déplacé.";}//error
					} else {
						echo "Média déjà présent dans votre base de données.";}//error
				} else {
					echo "Veuillez insérer un fichier .jpeg, .jpg, .pdf, .png ou .gif seulement";}//error
			} else {
				echo "La taille de votre fichier doit être inférieur à " . $taille_max . "octets";}	//error		
	} else {
		echo "Aucun media ajouté";}//error

	require_once('./upload.php');// on retrouve la possibilité d'insérer un nouveau média ici//
?>