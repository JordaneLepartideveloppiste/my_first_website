$(document).ready(function(){ //la gestion des évènements une fois la page chargée

    $('#stat').mouseenter(function(){ //l'évènement est défini par l'entrée de la souris dans la div du compteur
        compteur(2018,1789,16,"creation"); //premier compteur: année de création
        compteur(28,0,2,"clients"); //deuxième compteur nbr clients
        compteur(9,0,2,"collab"); //troisième compteur nbr collaborateurs

    function compteur(nb_final,nb_deb,duree_seconde,idElement){
        var n = nb_final; // Nombre final du compteur
        var deb = nb_deb; // Initialisation du compteur
        var duree = duree_seconde; // Duree en seconde
        var delta = Math.ceil((duree * 1000) / n); 
        // On calcule l'intervalle de temps entre chaque rafraichissement du compteur (duree mise en milliseconde)
        var node = document.getElementById(idElement); 
        // On recupere notre noeud ou sera rafraichi la valeur du compteur

    	function afficherPlusUn() {
            node.innerHTML = ++deb;

            if (deb < n) { 
            // Si on est pas arrive a la valeur finale, on relance notre compteur une nouvelle fois
            	setTimeout(afficherPlusUn, delta); // applique un délais d'affichage
            }
        }

        setTimeout(afficherPlusUn, delta);
    }
	})

$('.modal_projet').on('click',function(){ //évènement attaché au click sur lien de classe: modals
	$('#modalClient').modal(); //ouverture modale
	console.log('ça clique'); //message pour vérifier le fonctionnement
		var position_proj= $(this).attr('anchor_num'); // variable pour la position du projet dans mosaïque
    
    console.log(position_proj);
    afficherModal()

function afficherModal(){// on définit les paramètres de la fonction appelée juste avant
    console.log(position_proj + ' afficherModal');
	$.ajax({
	   type: 'GET',
        url: 'http://localhost/neuvieme/ajax.php',//lien au fichier qui repertorie le tableau json
        data : {
            function  : 'openModal',//fonction dans ajax.php
            position_proj : position_proj
        },
        beforeSend : function(){
            console.log("Avant");//protocole ajax pas obligatoire
        },
        complete : function(){
            console.log("Complete");//protocole ajax pas obligatoire
        },
        success : function(data){//ce qu'il doit se passer en cas de succès de la fonction
            console.log(data);//j'affiche le data dans la console pour vérifier que mon tableau json regroupe bien toutes les données que j'attends
            $('#contenu_modal_client').empty();// on vide la modale car elle a pu être remplie au préalable par le même évènement mais provenant d'un autre projet
        	var json = $.parseJSON(data);
        	var content = "";//on initialise le contenu à vide
            for (var i = 0; i < json.length; ++i){// pour toutes les lignes du tableau json
                //j'ajoute le contenu html de ma modale//
            content+="<div class='modal-header'>";
                content+="<h4 class='modal-title' id='exampleModalLongTitle'>" + json[i].title + "</h4>";
                content+="<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></i></button>";
            content+="</div>";
            content+="<div class='modal-body'>";
            content+="</div>";
             console.log(content);//on vérifie le contenu dans la console
            $('#contenu_modal_client').append(content);//et on l'affiche dans la modale
            }
            afficherCarousel();
        },
        error : function(){
        	console.log("Erreur");//error
        }
	})
}

function afficherCarousel(){// on définit les paramètres de la fonction appelée juste avant
    var lang= $('body').attr('lang');
    console.log(position_proj + ' afficherCarousel');
    $.ajax({
       type: 'GET',
        url: 'http://localhost/neuvieme/ajax.php',//lien au fichier qui repertorie le tableau json
        data : {
            function  : 'openCarousel',//fonction dans ajax.php
            position_proj : position_proj,
            lang : lang
        },
        beforeSend : function(){
            console.log("Avant");//protocole ajax pas obligatire
        },
        complete : function(){
            console.log("Complete");//protocole ajax pas obligatire
        },
        success : function(data){//ce qu'il doit se passer en cas de succès de la fonction
            console.log(data);//j'affiche le data dans la console pour vérifier que mon tableau json regroupe bien toutes les données que j'attends
            $('.modal-body').empty();// on vide la modale car elle a pu être remplie au préalable par le même évènement mais provenant d'un autre projet
            var json = $.parseJSON(data);
            var content = "";//on initialise le contenu à vide
            for (var i = 0; i < json.length; ++i){// pour toutes les lignes du tableau json
                //j'ajoute le contenu html de ma modale//
content+="<div id='carouselExampleControls' class='carousel slide' data-ride='carousel'>";
content+="<div class='carousel-inner'>";
content+="<div class='carousel-item  caritem active'>";//première slide
content+="<img class='image2modal' src='" + json[i].url1 + "'>";
content+="<div class='carousel-caption d-none d-md-block'>";
content+="<div class='fond_content animated fadeInUpBig slide-delay-1'>"
content+="<div class='animated fadeInRightBig slide-delay-3 text-right content2carousel'>" + json[i].content1 + "</div>";
content+="</div>";
content+="</div>";
content+="</div>";
content+="<div class='carousel-item caritem'>";//deuxième slide
content+="<img class='image2modal' src='" + json[i].url2 + "'>";
content+="<div class='carousel-caption d-none d-md-block' id='milieu_caption'>";
content+="<div class='fond_content animated fadeInUpBig slide-delay-1' id='milieu_fond'>"                               
content+="<div class='animated fadeInLeftBig slide-delay-3 text-left content2carousel' id='milieu_content'>" + json[i].content2 + "</div>";
content+="</div>";
content+="</div>";
content+="</div>";
content+="<div class='carousel-item caritem'>";//troisième slide
content+="<img class='image2modal' src='" + json[i].url3 + "'>";
content+="<div class='carousel-caption d-none d-md-block'>";
content+="<div class='fond_content animated fadeInUpBig slide-delay-1'>"                               
content+="<div class='animated fadeInRightBig slide-delay-3 text-right content2carousel'>" + json[i].content3 + "</div>";
content+="</div>";
content+="</div>";
content+="</div>";
content+="</div>";
content+="<a class='carousel-control-prev aavant' href='#carouselExampleControls' role='button' data-slide='prev'>";
content+="<span class='carousel-control-prev-icon avant' aria-hidden='true'></span>";
content+="<span class='sr-only'>Previous</span>";
content+="</a>";//flèche précédente
content+="<a class='carousel-control-next aapres' href='#carouselExampleControls' role='button' data-slide='next'>";
content+="<span class='carousel-control-next-icon apres' aria-hidden='true'></span>";
content+="<span class='sr-only'>Next</span>";
content+="</a>";//flèche suivante
content+="</div>";
             console.log(content);
             $('.modal-body').append(content);
             console.log('ça remplit');
            $('#carousel_modal').carousel({

            });
             console.log('ça lance');
             }
        },
        error : function(){
            console.log("Erreur");//error
        }
    })
}

    })                        
   
});