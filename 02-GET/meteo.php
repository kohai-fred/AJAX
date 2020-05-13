<?php

$retour = array();  // contiendra la réponse du serveur

//print_r($_GET);  // on commente pour ne pas casser l'échange en AJAX.

if(isset($_GET['ville']) && $_GET['ville'] == 'Paris'){  // si on a reçu une demande en GET avec "ville" et la valeur "Paris". L'indice "ville" correspond à la propiété de l'objet JS envoyé par le script côté client avec $.get().

    $retour['meteo'] = 'Il fait beau';  // on nomme les indices selon nos besoins
    $retour['temperature'] = '12°C';

    echo json_encode($retour);  // json_encode() transforme le tableau en JSON : {"meteo" : "Il fait beau", "temperature" : "12°C"}. echo envoie le json vers le client. ATTENTION : pas d'affichage dans ce script avec json_encode.
}