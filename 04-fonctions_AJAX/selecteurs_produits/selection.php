<?php
$pdo = new PDO('mysql:host=localhost;dbname=diw3_tapispointcom', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$contenu = '';
$matiere = true;   // pour que la requête SQL fonctionne par défaut
$couleur = true;
$forme = true;


// Traitement du POST :
// echo '<pre>';
// print_r($_POST); // pour voir l'array multidimensionnel dans le navigateur (pas de json_encode ici !)
// echo '</pre>';


// on construit la requête: 
// clause WHERE pour le champ matiere :
if (!empty($_POST['matiere'])) {
	echo '<pre>';
	// print_r(implode(",", $_POST['matiere'])); // implode() transforme les valeurs de l'array en string séparées ici par une virgule.
	echo '</pre>';


	$matiere = "matiere IN ('" . implode("','", $_POST['matiere']) . "')"; // en SQL les VARCHAR sont entre quotes. On les ajoute donc au début, à la fin et autour des virgules.
	echo '<pre>';
	// print_r($matiere);
	echo '</pre>';
}


// clause WHERE pour le champ couleur :
if (!empty($_POST['couleur'])) {
	$couleur = "couleur IN ('" . implode("','", $_POST['couleur']) . "')";
}

// clause WHERE pour le champ forme :
if (!empty($_POST['forme'])) {
	$forme = "forme IN ('" . implode("','", $_POST['forme']) . "')"; 
}



// On fait une requête :
$donnees = $pdo->query("SELECT * FROM produit WHERE $matiere AND $couleur AND $forme ");


// On prépare l'affichage :	
if ($donnees->rowCount() > 0) {

	while($produit = $donnees->fetch(PDO::FETCH_ASSOC))
	{
		$contenu .= '<div style="width: 15%; float: left;">';
			$contenu .= '<h4>Tapis ' . $produit['id_produit'] . '</h4>';
			$contenu .= '<div><img src="' . $produit['photo'] . '" style="width: 100px" class="photo" data-id_produit="' . $produit['id_produit'] . '"></div>';
			$contenu .= '<ul>';
				$contenu .= '<li>Matière : ' . $produit['matiere'] . '</li>';
				$contenu .= '<li>Couleur : ' . $produit['couleur'] . '</li>';
				$contenu .= '<li>Forme : ' . $produit['forme'] . '</li>';
			$contenu .= '</ul>';
		$contenu .= '</div>';
	}
} else {
	$contenu .= '<h4> Aucun résultat ne correspond à votre recherche.</h4>';
}
	

echo $contenu;  // on envoie du HTML au client : pas besoin de json_encode




