<?php
 
 function nettoyer_data($data) {
        $data = trim($data); // supprime les caractères invisibles
        $data = stripslashes($data);//supprime les antislashes
        $data = htmlspecialchars($data);//chaque caractère susceptible de modifier le code html est transformé
        $data = addslashes($data);//supprime "'\ et NUL
        return $data;
      		}

 
if (isset($_POST['submit']))
{
// Envoi du message sur ma boite mail
    //Chaque valeur envoyé par le formulaire de contact est identifiée et traitée en variable pour une manipulation simplifiée//
    $email = $_POST['mail'];
    $nom = (isset($_POST['nom'])) ? htmlspecialchars($_POST['nom']) : '';
	$prenom = (isset($_POST['prenom'])) ? htmlspecialchars($_POST['prenom']) : '';
    $message= nettoyer_data($_POST['message']);
    $erreur= false;//Par défaut $erreur est en false//

//On vérifie ici si les champs requis ont été remplis
    if (empty($mail)) {//Si le champ "email" a été retourné vide
		$erreur = true;//alors erreur
		$errmsg = 'Merci de saisir votre adresse email.';
	}
	if (empty($message)) {//Si le message est vide
		$erreur = true;
		$errmsg = 'Veuillez nous indiquer quelques précisions concernant votre projet.';
	}
	if ($erreur) {
	echo '<p class="alert">'.$errmsg.'</p>';
}
// Ici on vérifie quels selecteur checkbox ont été cochés    
    $market="";
        if (!empty($_POST['marketing'])){//Si marketing a été checké, si la valeur retourné n'est pas vide
//alors on affichera cette option dans le mail//                
        $market = "la stratégie marketing";
        }
     
    $logo="";
        if (!empty($_POST['logo'])){
                $logo = "la crétion ou refonte de logo";
        }
     
    $comm="";
        if (!empty($_POST['communication'])){
                $comm = "la communication globale";
        }
     
    $edit="";
        if (!empty($_POST['edition'])){
                $edit = "l'édition de supports multiples";
        }
     
    $reso="";
        if (!empty($_POST['reseaux'])){
                $reso = "la gestion des réseaux sociaux";
        }
     
    $tof="";
        if (!empty($_POST['photo_video'])){
                $tof = "la capture d'images fixes ou animées";
        }
     
    $other="";
        if (!empty($_POST['autre'])){
                $other = "le projet s'inscrit d'une autre manière";
        }
     
//Ici, on définit les variables des éléments propres qui constituent le corps d'un mail//
        //Mail envoyé à mon client//
    $sujet="Formulaire de contact";
    $mailDestinataire="contact@neuvieme.dj";
 
    $from = "From: ".$prenom." ".$nom."<".$email."> \nMime-Version:\n";
    $from .= " 1.0\nContent-Type: text/html; charset=UTF-8\n";
    $header= $sujet;
     
    $messageMail = '
            Formulaire de contact:
            Nom :   '.$nom.'
            Email :   '.$email.'
             
            Message:
             
                    
            '.nl2br($message).'
            ';
  
    $caseacocher = '
    Je suis intéressé par les services suivants:'.$market.' '.$logo.' '.$comm.' '.$edit.' '.$reso.' '.$tof.' '.$other.
        //Fin du mail//

 if (!$erreur) {  //Si on détecte aucune erreur de remplissage des informations  
    mail($mailDestinataire, $sujet, $messageMail . $caseacocher, $from);// alors on envoie le mail
    }
    if(mail($mailDestinataire, $sujet, $messageMail . $caseacocher, $from); {//Si l'email est bien envoyé
    	 	echo "Votre mail a été envoyé"; }//success
             else { echo "Une erreur s'est produite";
   }//error
}
?>