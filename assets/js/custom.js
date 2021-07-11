
$(document).ready(function(){
                        $('#stat').mouseenter(function(){
                      compteur(2018,1789,16,"creation");
                      compteur(28,0,2,"clients");
                      compteur(9,0,2.3,"collab");
                      function compteur(nb_final,nb_deb,duree_seconde,idElement){
                        var n = nb_final; // Nombre final du compteur
                        var deb = nb_deb; // Initialisation du compteur
                        var duree = duree_seconde; // Duree en seconde
                        var delta = Math.ceil((duree * 1000) / n); // On calcule l'intervalle de temps entre chaque rafraichissement du compteur (duree mise en milliseconde)
                        var node = document.getElementById(idElement); // On recupere notre noeud ou sera rafraichi la valeur du compteur
                        function afficherPlusUn() {
                          node.innerHTML = ++deb;
                          if (deb < n) { // Si on est pas arrive a la valeur finale, on relance notre compteur une nouvelle fois
                            setTimeout(afficherPlusUn, delta);
                          }
                        }
                        
                        setTimeout(afficherPlusUn, delta);
                      }
                            })

                        
   
});


jQuery(function ($) {

$('.choice').click(function(){
	$('#modalImg').modal('show');
	$('#modal-body-img').empty();
    var num= $(this).attr('bouton-num');
	$.ajax({
	type: 'GET',
            url: 'http://localhost/neuvieme/ajax.php',
            data : {
                function  : 'all-img-json'
            },
            beforeSend : function(){
                console.log("Avant");
            },
            complete : function(){
                console.log("Complete");
            },
            success : function(data){
            	var json = $.parseJSON(data);
                var content = "";
                    content += "<div class='row'>";
                for (var i = 0; i < json.length; ++i){
                    content += "<div class='col-md-3'>";
                    content += "<img src='" + json[i].url + "' class='img-thumbnail media-img' id_media='" + json[i].id + "'>";
                    content += "</div>";
                }
                content += "</div>";
                $('#modal-body-img').append(content);
            bindMediaClick(num);
            },
            error : function(){
                console.log("Erreur");
            }
        })
    })

});




function bindMediaClick(numero){
    $(document).off('click','.media-img').on('click','.media-img', function(){
        console.log($(this).attr('id_media'));
        console.log(numero);
        $('#logoplus').empty();
        var newImg = document.createElement('img');
        newImg.src = $(this).attr('src');
        newImg.style = "width:36px;height:auto;position:relative;bottom:12px;margin-left:5px;margin-right:5px";
        $('#modalImg').modal('hide');
        document.getElementById('media-'+numero).appendChild(newImg);
        var newInput = document.createElement('input');
        newInput.setAttribute('type', 'text');
        newInput.setAttribute('name', 'id_media_'+numero);
        newInput.setAttribute('value',$(this).attr('id_media'));
        newInput.setAttribute('form','form_projet');
        newInput.style = "width:20%;position:relative; bottom:6px;margin-left:5px;margin-right:5px;padding-top:6px;padding-bottom:5px"
        document.getElementById('media-'+numero).appendChild(newInput);
    })
}



/*function showModal(numero){
    $(document).off('click','.modals').on('click','.modals', function(){
        $('#modalClient').empty();
    })
}*/


	