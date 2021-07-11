<?php require_once('../header_bo.php');?><!--on conserve l'apparence du back-office-->
<?php

function nettoyer_data($data) {
        $data = trim($data); // supprime les caractères invisibles
        //$data = stripslashes($data); //supprime les antislashes
        //$data = htmlspecialchars($data); //chaque caractère susceptible de modifier le code html est transformé
        $data = addslashes($data); //supprime "'\ et NUL
        return $data;
      		} // On utilise cette fonction pour nettoyer les valeurs envoyées par le formulaire pour qu'elles soient adaptées au code//

if (ISSET($_POST['submit'])){//Si un formulaire est envoyé, si on a cliqué sur un bouton de soumission de formulaire//

/*AJOUTER*/ 

        if($_POST['submit'] == "ajouter"){//le bouton ajouter

    		$content = nettoyer_data($_POST['avis']);//on met dans des variables les valeurs retourné par nettoyer_data//
            $contentEN = nettoyer_data($_POST['avis_EN']);//on met dans des variables les valeurs retourné par nettoyer_data//
        	$client = nettoyer_data($_POST['client']);//on récupère chaque valeur en appelant le name de l'input, ici "client"//
        	$active = $_POST['options'];//on récupère l'option checkée//
        	$sql_avis = "INSERT INTO avis(content_avis, content_avis_EN, client_avis, active_avis) 
            VALUES ('" . $content . "', '" . $contentEN . "', '" . $client . "', " . $active . ")";
        	$avis= $connexion->insert($sql_avis);//on insère chaque valeur dans la base de données//

        if ($avis > 0){//Si l'insertion est effectuée//
                $message = "Nouvel avis ajouté.";
            } else {//Sinon//
            	$message = "Echec de l'enregistrement";            
            }
        }
        } else {
        	$message = "Ah bah mince que faites-vous ici ???";
        }   

/*MODIFIER*/

if($_POST['submit'] == "modifier"){//bouton "modifier"//

		$id_avis = $_POST['id_avis'];
    	$content = nettoyer_data($_POST['avis']);
        $contentEN = nettoyer_data($_POST['avis_EN']);
    	$client = nettoyer_data($_POST['client']);
    	$active = $_POST['options'];//on inclut les valeurs dans des variables pour les appeler plus facilement dans la requête qui suit//
    	

    	$sql_avis="UPDATE avis SET content_avis= '" . $content . "', content_avis_EN= '" . $contentEN . "', client_avis= '" . $client . "', active_avis= " . $active . " WHERE id_avis = " . $id_avis;
    	$res= $connexion->update_delete($sql_avis);
        //Ici la requête modifie les données de la bdd//

    	if ($res > 0){//Si la requête est correctement exécutée//
           $message = "Avis modifié.";//success
       }else{
           $message ="Echec de la modification.";//error
       }

    }


/*SUPPRIMER*/

if($_POST['submit'] == "supprimer"){
    	$id_avis= $_POST['id_avis'];
    	$sql_avis="DELETE FROM avis WHERE id_avis=" . $id_avis;
    	$res= $connexion->update_delete($sql_avis);

    if ($res > 0){
           $message = "Avis supprimé.";
       }else{
           $message ="Echec de la suppression.";
       }

    }

/*ALERT*/   

echo '<div class="alert alert-warning" role="alert">
            <p class="text-center">'. $message .'</p>
            <a href='. LOCAL_URL .'/backoffice/gestion_projets/gestion_avis.php>Retour</a>
        	</div> ';

            /*$sql2="SELECT url_media, position_proj FROM medias INNER JOIN projects WHERE id_media_bg=id_media AND activ_proj=1 AND position_proj=1";
        $bg=$connexion->select($sql2);*/
        

        /*$sql3="SELECT url_media FROM medias INNER JOIN projects WHERE id_media_logo=id_media AND activ_proj=1 ORDER BY position_proj ASC";
        $logo=$connexion->select($sql3);*/
?>

