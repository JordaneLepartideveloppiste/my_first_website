<?php require_once('../header_bo.php');?>

<?php

function nettoyer_data($data) {
        $data = trim($data); // supprime les caractères invisibles
        //$data = stripslashes($data);//supprime les antislashes
        //$data = htmlspecialchars($data);//chaque caractère susceptible de modifier le code html est transformé
        $data = addslashes($data);//supprime "'\ et NUL
        return $data;
      		}



if (ISSET($_POST['submit'])){//si on a cliqué sur un bouton de soumission de formulaire//
	if($_POST['submit'] == "enregistrer"){//Et si c'est bouton "enregistrer"//
	//on inclut dans des variables les données obligatoires d'un projet//
		$client= nettoyer_data($_POST['client']); $position= $_POST['position'];
		$logo= $_POST['id_media_1']; $bg= $_POST['id_media_2']; $slide1= $_POST['id_media_3'];
		$text1= nettoyer_data($_POST['text_slide1']); $text1EN= nettoyer_data($_POST['text_slide1_EN']);
		//Ici, on teste si la deuxième et troisième slide seront présentent dans la modale projet///
		if(empty($_POST['id_media_4'])){ 
			$slide2= NULL;} else{
			//Et si c'est le cas, on inclut la valeur dans une variable//
		$slide2= $_POST['id_media_4'];}
		if(isset($_POST['text_slide2'])){ 
			$text2= nettoyer_data($_POST['text_slide2']); } else{
			$texte2= NULL; }
		if(isset($_POST['text_slide2_EN'])){ 
			$text2EN= nettoyer_data($_POST['text_slide2_EN']); } else{
			$texte2EN= NULL; }
		if(empty($_POST['id_media_5'])){ 
			$slide3= NULL;} else{
		$slide3= $_POST['id_media_5'];}
		if(isset($_POST['text_slide3'])){
			$text3= nettoyer_data($_POST['text_slide3']); } else{
			$texte3= NULL; }
		if(isset($_POST['text_slide3_EN'])){
			$text3EN= nettoyer_data($_POST['text_slide3_EN']); } else{
			$texte3EN= NULL; }
		$active= $_POST['activation'];
		//Une fois les variables identifiées, on remplit la requête d'insertion des données//
		$sql="INSERT INTO projects(title_proj, position_proj, id_media_bg, id_media_logo, content_slide_1, content_slide_1_EN, id_media_slide_1, content_slide_2, content_slide_2_EN, id_media_slide_2, content_slide_3, content_slide_3_EN, id_media_slide_3, activ_proj) 
		VALUES ('" . $client . "', " . $position . ", " . $bg . ", " . $logo . ", '" . $text1 . "', '" . $text1EN . "', " . $slide1 . ", '" . $text2 . "', '" . $text2EN . "', " . $slide2 . ", '" . $text3 . "', '" . $text3EN . "', " . $slide3 . ", " . $active . ")";
		$projet= $connexion->insert($sql);

		if ($projet > 0){//si l'insertion a eu lieu//
                $message = "Nouveau projet enregistré.";//success
            } else {
            	$message = "Echec de l'enregistrement";//error            
            }
        }
         

	if($_POST['submit'] == "modifier"){//Et si c'est bouton "modifier"//
		$id= $_POST['id_proj'];
		$client= nettoyer_data($_POST['client']);
		$position= $_POST['position'];
		$logo= $_POST['id_media_1'];
		$bg= $_POST['id_media_2'];
		$slide1= $_POST['id_media_3'];
		$text1= nettoyer_data($_POST['text_slide1']);
		$text1EN= nettoyer_data($_POST['text_slide1_EN']);
		if(empty($_POST['id_media_4'])){ 
			$slide2= NULL; } else{
		$slide2= $_POST['id_media_4']; }
		if(isset($_POST['text_slide2'])){ 
			$text2= nettoyer_data($_POST['text_slide2']); } else{
			$text2= NULL; }
		if(isset($_POST['text_slide2_EN'])){ 
			$text2EN= nettoyer_data($_POST['text_slide2_EN']); } else{
			$text2EN= NULL; }
		if(empty($_POST['id_media_5'])){ 
			$slide3= NULL; } else{
		$slide3= $_POST['id_media_5']; }
		if(isset($_POST['text_slide3'])){
			$text3= nettoyer_data($_POST['text_slide3']); } else{
			$text3= NULL; }
		if(isset($_POST['text_slide3_EN'])){
			$text3EN= nettoyer_data($_POST['text_slide3_EN']); } else{
			$text3EN= NULL; }
		$active= $_POST['activation'];
		//on fonctionne de la même manière que pour l'insertion en base de données : variable et requête de mise à jour des données//
		$sql = "UPDATE projects SET title_proj = '". $client ."', position_proj = ". $position .", id_media_bg = ". $bg .", id_media_logo =". $logo .", content_slide_1 = '". $text1 ."', content_slide_1_EN = '" . $text1EN ."', id_media_slide_1 = ". $slide1 .", content_slide_2 = '". $text2 ."', content_slide_2_EN = '". $text2EN ."', id_media_slide_2 =". $slide2 .", content_slide_3 = '" . $text3 ."', content_slide_3_EN = '". $text3EN ."', id_media_slide_3 = ". $slide3 .", activ_proj= ". $active ." WHERE id_proj= ". $id;
		echo $sql;
        $retour = $connexion->update_delete($sql);
	    if ($retour != 0){
	        $message= "<p>La modification a bien été effectué</p>"; } else {
	        $message= "<p>Une erreur est survenue</p>"; } }
	} else {
        	$message = "Destination incorrecte"; }   
echo '<div class="alert alert-warning" role="alert">
            <p class="text-center">'. $message .'</p>
            <a href='. LOCAL_URL .'/backoffice/gestion_projets/gestion_projets.php>Retour</a>
        	</div> ';// Ici, un bouton de retour à la gestion des projets//
?>
