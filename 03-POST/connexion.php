<?php


$retour = ''; 

$pdo = new PDO('mysql:host=localhost;dbname=forum',
                'root', 
                '',  // mot de passe de la BDD
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,  // pour afficher les erreurs SQL dans le navigateur
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',  // définit le jeu de caractères des échanges avec la BDD
                )
);

//print_r($_POST);

if(!empty($_POST['pseudo']) && !empty($_POST['mdp'])){

    $_POST['pseudo'] = htmlspecialchars($_POST['pseudo']);
    $_POST['mdp'] = htmlspecialchars($_POST['mdp']);

    $resultat = $pdo->prepare("SELECT * FROM membre WHERE pseudo = :pseudo AND mdp = :mdp");
    $resultat->execute(array(':pseudo'=>$_POST['pseudo'], ':mdp'=>$_POST['mdp']));

    if($resultat->rowCount() != 0){
        
        $retour = '<span style="color : green">Vous êtes connecté !</span>';
        
    } else{
        
        $retour = '<span style="color : red">Erreur sur les identifiants.</span>';
    }


} else {  
    $retour = '<span style="color : red">Veuillez remplir tous les champs</span>';

}

echo $retour;  // on envoie la réponse au client. pas de json_encode() car il n'attend pas de json mais du HTML