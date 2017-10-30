<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>RoundChat</title>   
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css" />
<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">

<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>


<body>
    <div class="container">
        
            <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1>RoundChat</h1>
            </div>
            
            
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <br /><p class="welcome">Hello !</p> 
                <p class="welcome2">Bienvenue à votre <span class="roundchat">RoundChat!</span></p>    
                </div>
                
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                <div id="chatbox">
                    <!-- Ici se placent les messages envoyés du chat -->          
                    
                    <?php
                    include('connex.inc.php'); // Lien au fichier de connexion à la bdd.
                   
                    // Récupère les 30 derniers messages postés
                    $requete = $bdd->query('SELECT * FROM messages ORDER BY id DESC LIMIT 0,30');
                    
                    // Affiche le message
                    while($donnees = $requete->fetch()){
                        echo '<p id= ' . $donnees['id'] . ' >' . $donnees['auteur'] . ' dit :  ' . $donnees['message'] . '</p>';
                    }

                    $requete->closeCursor();
                    
                    ?> 
                    
                </div>
                
                <!-- Le formulaire d'envoie de messages où les champs pseudo et message sont obligatoires
                 -->
                <form name="msg" action="process.php" method="post">
                    <!-- Devant chaque champ d'input ainsi que devant le bouton 'envoi',
                    j'insère les icones de la bibliothèque 'font-awesome' -->
                    <div class="pseudo"><i class="fa fa-user-circle" aria-hidden="true"></i>
                    <input type="text" name="pseudo" id="pseudo" placeholder="Votre pseudo"/></div><br />
                    
                    <div class="message"><i class="fa fa-comments-o" aria-hidden="true"></i>
                    <input type="text" name="message" id="message" placeholder="Ecrivez votre message..." />
                   &nbsp;
                   <i class="fa fa-telegram"></i>     
                   <input type="submit" id="send" value="envoi"/>
                    </div>
               </form>
                
            </div> 
                
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                <!-- Insertion de l'icone 'commenting' de la bibliothèque 'font-awesome' -->
                <br />
               <i class="fa fa-commenting-o" aria-hidden="true"> Parlez avec vos amis !</i><br /><br />
               <i class="fa fa-commenting-o" aria-hidden="true"> Parlez avec vos ennemis !</i><br /><br />
               <i class="fa fa-commenting-o" aria-hidden="true"> Parlez tout court, on dit que ca fait du bien !</i>
            </div>
    </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="jquery-3.2.1.min.js"></script>
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    
<script src="main.js"></script> <!-- Lien à mon fichier du script .js -->

</body>
</html>