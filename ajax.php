<?php
    require_once(realpath(dirname(__FILE__) . "/config.php")); //On rappelle les variables NOM_BDD et LOCAL_URL
    require_once(realpath(dirname(__FILE__) . "/class/connexion.php")); // On rappelle 
    $connexion = new Connexion(NOM_BDD);

    if($_GET['function'] == "all-img-json"){
        $sql = "SELECT * from medias";
        $result = $connexion->select($sql);
        $json_media = array();
        foreach ($result as $media){
            $img = array();
            $img['url'] = $media->url_media;
            $img['id'] = $media->id_media;
            $json_media[] = $img;
        }
        echo json_encode($json_media);
    }

  if($_GET['function'] == "openModal"){
        $sql = "SELECT p.title_proj, p.position_proj FROM projects p WHERE activ_proj=1 AND p.position_proj=" . $_GET['position_proj'];
        $result = $connexion->select($sql);
        $json_modal = array();
        foreach ($result as $res){
            $modal = array();
            $modal['title']=$res->title_proj;
            $modal['position_proj']=$res->position_proj;
            $json_modal[]=$modal;
        }
        echo json_encode($json_modal);
    }

if($_GET['function'] == "openCarousel"){
        if (isset($_GET['lang']) && $_GET['lang']=='_EN'){
         $sql = "SELECT p.position_proj, p.id_media_slide_1, m1.url_media AS slide1, p.content_slide_1_EN AS contentslide1, p.id_media_slide_2, m2.url_media AS slide2, p.content_slide_2_EN AS contentslide2, p.id_media_slide_3, m3.url_media AS slide3, p.content_slide_3_EN AS contentslide3 FROM projects p INNER JOIN medias m1 ON m1.id_media = p.id_media_slide_1 INNER JOIN medias m2 ON m2.id_media = p.id_media_slide_2 INNER JOIN medias m3 ON m3.id_media = p.id_media_slide_3 WHERE activ_proj=1 AND p.position_proj=" . $_GET['position_proj'];
        $result = $connexion->select($sql);
    } else {
        
        $sql = "SELECT p.position_proj, p.id_media_slide_1, m1.url_media AS slide1, p.content_slide_1 AS contentslide1, p.id_media_slide_2, m2.url_media AS slide2, p.content_slide_2 AS contentslide2, p.id_media_slide_3, m3.url_media AS slide3, p.content_slide_3 AS contentslide3 FROM projects p INNER JOIN medias m1 ON m1.id_media = p.id_media_slide_1 INNER JOIN medias m2 ON m2.id_media = p.id_media_slide_2 INNER JOIN medias m3 ON m3.id_media = p.id_media_slide_3 WHERE activ_proj=1 AND p.position_proj=" . $_GET['position_proj'];
        $result = $connexion->select($sql);
    }
        $json_slide = array();
        foreach ($result as $res){
            $slide = array();
            $slide['position_proj']=$res->position_proj;
            $slide['url1']=$res->slide1;
            $slide['content1']=$res->contentslide1;
            $slide['url2']= $res->slide2;
            $slide['content2']=$res->contentslide2;
            $slide['url3']=$res->slide3;
            $slide['content3']=$res->contentslide3;
            $json_slide[]=$slide;
        }
        echo json_encode($json_slide);
    }



/*if($_GET['function'] == "attrPosition"){
        $sql = "SELECT position_proj FROM projects WHERE position_proj=" . $_GET['position_proj'];
        $result = $connexion->select($sql);
        $json_pos = array();
        foreach ($result as $res){
            $pos = array();
            $pos['position'] = $res->position_proj;
            $json_pos = $pos;
        }
        echo json_encode($json_pos);
    }
*/
?>



