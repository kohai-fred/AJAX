<?php

$pdo = new PDO('mysql:host=localhost;dbname=tapis', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$contenu = '';
$id= true;

//echo '<pre>';
//print_r($_GET); // indice "id"
//echo '</pre>';


if(isset($_GET['id'])){

    // Echappement des données :
    $_GET['id'] = htmlspecialchars($_GET['id']);

    $resultat = $pdo->prepare("SELECT photo FROM produit WHERE id_produit = :id_produit");
    $resultat->execute(array(
        ':id_produit' => $_GET['id']
    ));

    $photo = $resultat->fetch(PDO::FETCH_ASSOC);
    //echo '<pre>';
    //print_r($photo); // indice "photo"
    //echo '</pre>';

    $contenu = '<img src="img/' . $photo['photo'] . '">';
}


echo $contenu;  // on envoie le HTML côté client