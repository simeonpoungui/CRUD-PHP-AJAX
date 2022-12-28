<?php

$login = "root";
$pass = "Poungui1234@";

try {

    $db = new PDO("mysql:host=localhost;dbname=mvc_etudiant",$login,$pass);
    
} catch (PDOException $e) {


    $exeception = [

        'code' =>$e->getCode(),
        'messsage'=>$e->getMessage()
    ];

    $tab_reponse = [

        'code' => 'erreur',
        'message' => 'erreur de connexion à la base de donnée',
        'details'=>$exeception
    ];

    return $tab_reponse;

}