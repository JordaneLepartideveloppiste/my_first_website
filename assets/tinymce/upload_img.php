<?php
// Images upload path
 require_once(realpath(dirname(__FILE__) . "./../../class/connexion.php")); 
 require_once(realpath(dirname(__FILE__) . "./../../config.php")); 
 $connexion = new Connexion(NOM_BDD);

$imageFolder = "./../img/";

reset($_FILES);
$temp = current($_FILES);
if(is_uploaded_file($temp['tmp_name'])){
  
    // Sanitize input
    if(preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])){
        header("HTTP/1.1 400 Invalid file name.");
        return;
    }
    
    // Verify extension
    $extension = strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION));
    if(!in_array($extension, array("gif", "jpg", "png"))){
        header("HTTP/1.1 400 Invalid extension.");
        return;
    }
  
    // Accept upload if there was no origin, or if it is an accepted origin
    $filetowrite = $imageFolder . $temp['name'];
    move_uploaded_file($temp['tmp_name'], $filetowrite);

    
     $nb = $connexion->select("SELECT * FROM media WHERE name_media='" . $temp['name'] . "'");
     if ($nb->rowCount() <= 0){
         $connexion->insert("INSERT INTO media(url_media,name_media,extension_media) VALUES('" . LOCAL_URL ."/assets/img/". $temp['name'] . "','" . $temp['name'] ."','" . $extension . "')");
     }
    // Respond to the successful upload with JSON.
    echo json_encode(array('location' => $temp['name']));
} else {
    // Notify editor that the upload failed
    header("HTTP/1.1 500 Server Error");
}
?>