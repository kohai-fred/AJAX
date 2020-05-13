<?php

$retour = [];

//print_r($_GET);

if(isset($_GET['id']) && $_GET['id'] == 105){

    $retour['suite'] = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum asperiores ab, aspernatur iste numquam placeat nam temporibus, exercitationem impedit consequuntur similique perspiciatis optio! Repellat assumenda nisi hic atque libero magnam velit quasi deleniti nesciunt et animi ullam vitae, eum fugit modi tempora quibusdam cupiditate impedit aliquid itaque. Voluptate, maiores totam.';

    echo json_encode($retour);
};