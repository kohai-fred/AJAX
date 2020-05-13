<?php


$retour = '';  // pour y mettre la réponse HTML

$pdo = new PDO('mysql:host=localhost;dbname=newsletter',  // driver MySQL, nom du serveur, nom de la BDD
                'root',  // Login de la BDD
                '',  // mot de passe de la BDD
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,  // pour afficher les erreurs SQL dans le navigateur
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',  // définit le jeu de caractères des échanges avec la BDD
                )
);

//print_r($_POST);  // indice "email"

if(!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){  // si le champ n'est pas vide et qu'il s'agit d'un email

    // Echappement des données
    $_POST['email'] = htmlspecialchars($_POST['email']);

    $resultat = $pdo->prepare("SELECT * FROM abonne WHERE email = :email");
    $resultat->execute(array(':email'=>$_POST['email']));

    if($resultat->rowCount() != 0){  // s'il y a des lignes de résultats, c'est que l'email est déjà en BDD

        $retour = '<span style="color : red">Vous êtes déjà inscrit !</span>';

    } else{  // sinon on peut l'inscrire

        $req = $pdo->prepare("INSERT INTO abonne (email) VALUES (:email)");
        $req->execute(array(':email'=>$_POST['email']));

        $retour = '<span style="color : green">Vous êtes inscrit à la newsletter.</span>';
    }

} else {  // sinon le champ est vide ou ce n'est pas un email
    $retour = '<span style="color : red">Veuillez indiquer un email</span>';

}

echo $retour;  // on renvoie la réponse vers le client. Il s'agit d'un 'string' contenant du HTML, donc pas de json_encode ici.