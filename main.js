$(document).ready(function(){
    charger();

    // Un peu d'animation en jQuery
    $('p.welcome').hover(function(){
        $(this).css('color', '#3fffb8');
    },
    function(){
        $(this).css('color', '#000');
    });

    // Un peu d'animation en jQuery
    $('.fa-commenting-o').hover(function(){
    $(this).toggle(4000);
    });

    // Un peu d'animation en jQuery
    $('.roundchat').hover(function(){
        $(this).animate({fontSize: '1.4em'}, 'slow');
    
        $(this).animate({fontSize: '1.2em'}, 'slow');
    });

    // Ajoute un focus sur les champs d'input
  $('#pseudo, #message').focus(function(){
        $(this).css('outline-style', 'dotted');
        $(this).css('outline-width', 'thin');
        $(this).css('outline-color', '#3f86ff');
    });




    // Indication d'action pour l'utilisateur
    $('input[placeholder]').placeholder; 

    $('#send').click(function(e){
        e.preventDefault(); // Empêche le bouton d'envoyer le formulaire

        var pseudo =  $('#pseudo').val(); 
        var message = $('#message').val() ;

        if(pseudo != '' && message != ''){ // Vérifie que les variables ne soient pas vides
            $.ajax({
                url : 'process.php', // Donne l'URL du fichier de traitement
                type : 'POST', // La requête de type POST car formulaire
                data : 'pseudo=' + pseudo + '&message=' + message // Envoie les données
            }).done(function(id) {
                $('#chatbox').prepend('<p id="' + id + '">' + pseudo + ' dit : ' + message + '</p>'); // ajoute le message dans la zone prévue           //        
            }); // Prepend car je veux que les derniers messages apparaissent en haut du chatLog.
            
            $("#message").val('');  // Supprime le texte du champ 'message' qui vient d'être envoyé

        }else{
            /* J'ajoute une classe en jQuery pour rendre les champs
             d'input rouge si au moins un sur deux est vide lorsqu'on appuye sur
            'enter' ou clique sur le bouton 'envoie'  */
            $('#pseudo').addClass('error');  
            $('#message').addClass('error');   
        }
    });
    /* Puis lorsqu'on place le curseur pour corriger ou mettre 
    le pseudo ou le message, ça se remet en bleu. */
    $('#pseudo').keydown(function(e){
        $('#pseudo').removeClass('error'); 
        $('#message').removeClass('error'); 
    });
});


function charger(){

    setTimeout(function(){
        var premierID = $('#chatbox p:first').attr('id'); // Je récupère l'id le plus récent

        // Je passe l'id le plus récent au fichier de chargement 
        // Prepend rajoute les nouveaux messages en haut du chatbox
        $.get( 'charger.php?id=' + premierID, function( data ) {
            $('#chatbox').prepend(data); 
        });
        charger();

    }, 5000); 
}




