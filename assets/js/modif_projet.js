$(document).ready(function(){ //la gestion des évènements une fois la page chargée

    $('.choix').click(function(){ //évènement click sur class "choice"
    	$('#modalImg').modal(); // ouverture modal
    	console.log('ça clique');
        $('#modal-body-img').empty();
        var num= $(this).attr('bouton-num'); // valeur de l'attribut "bouton-num"
    	$.ajax({
    	   type: 'GET',
            url: 'http://localhost/neuvieme/ajax.php', // répertorie les requêtes
            data : {
                function  : 'all-img-json'
            },
            beforeSend : function(){ //convention ajax, pas nécessaire
                console.log("Avant");
            },
            complete : function(){ //convention ajax, pas nécessaire
                console.log("Complete");
            },
            success : function(data){
                console.log(data); // j'affiche data dans la console pour vérifier le success
            	var json = $.parseJSON(data);
                var content = "";
                for (var i = 0; i < json.length; ++i){ // je parcours chaque case de mon tableau json
                    content += "<div class='col-md-3'>";  // je crée le contenu désiré
                    content += "<img src='" + json[i].url + "' class='img-thumbnail media-img' id_media='" + json[i].id + "'>";
                    content += "</div>";
                }
                content += "</div>";
                console.log(content); // je vérifie l'entièreté du contenu
                $('#modal-body-img').append(content); // j'affiche le contenu dans la modale
            bindMediaClick(num); // je lie le click de sélection du média à la fermeture de la modale
            },
            error : function(){ // message d'erreurs
                console.log("Erreur");
            }
        })
    })

});




function bindMediaClick(numero){ //la fonction lie l'évènement de fermeture de modale déclenché par un click sur img
// à la création d'une miniature et d'un input dans lequel on récupère l'identifiant du média
    $(document).off('click','.media-img').on('click','.media-img', function(){ // évènement click média
        console.log($(this).attr('id_media')); // on vérifie l'identifiant du média dans la console
        console.log(numero);
        console.log($('#image_input'+numero));
        $('#logoplus').empty(); //on vide l'input
        $('#image_input'+numero).empty();
        var newImg = document.createElement('img'); //on crée un élément image
        newImg.src = $(this).attr('src'); // auquel on donne une source
        newImg.style ="width:46px;height:38px;position:relative;top:4px;margin-left:25px;margin-right:5px"
        // et des attributs de style afin de faire la miniature
        $('#modalImg').modal('hide'); // on ferme la modale
        $('#image_input'+numero).append(newImg); //on affiche la miniature
        var newInput = document.createElement('input'); // on crée un nouvel input
        newInput.setAttribute('type', 'text'); // auquel on attribue un type
        newInput.setAttribute('name', 'id_media_'+numero); // un name : id_numéro pour pouvoir le cibler et le différencier
        newInput.setAttribute('value',$(this).attr('id_media'));
        newInput.style = "width:25%;height:40px;position:relative;top:4px;margin-left:40px;margin-right:5px;padding-top:6px;padding-bottom:5px"
        $('#image_input'+numero).append(newInput); //on récupère l'identifiant média dans l'input
    })
}