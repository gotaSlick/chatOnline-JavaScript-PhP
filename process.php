<?php

ini_set('display_errors', 1);
include('connex.inc.php');

 // Si on a envoyé des données avec le formulaire

    if(!empty($_POST['pseudo']) AND !empty($_POST['message'])){ // Vérifie que les variables ne soient pas vides
    
        $pseudo = ($_POST['pseudo']);
        $message = ($_POST['message']);
        
        // J'entre les données en base de données :
        $insertion = $bdd->prepare('INSERT INTO messages VALUES(null, :pseudo, :message)');
        $insertion->execute(array(
            'pseudo' => $pseudo,
            'message' => $message
        ));
        echo $bdd->lastInsertId();  // Je passe l'id du message qui vient juste d'etre inseré
    }
    else{
        echo 'error';
    }



?>