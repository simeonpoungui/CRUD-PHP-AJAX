<?php

require('../config/db.php');

$data = (object) $_POST;

$select = "SELECT * FROM eleve WHERE email = :email and password = :password";
$prepRes = $db->prepare($select);

try {

    $execute = $prepRes->execute([

        "email" => $data->email,
        "password" => $data->password

    ]);
    
    if ($execute) {

        if ($prepRes->rowCount() == 1) {

            $tab_reponse = array(

                "code" => "succes",
                "message" => "vous etes authentifié",
                "details" => $prepRes->fetch(PDO::FETCH_ASSOC)

            );

            echo json_encode($tab_reponse);

        } else {

            $tab_reponse = array(

                "code" => "erreur",
                "message" => "Identifiant email ou mot de passe incorrect",
            );

            echo json_encode($tab_reponse);
        }
    } else {

        $tab_reponse = array(

            "code" => "erreur",
            "message" => "erreur d'execution",

        );

        echo json_encode($tab_reponse);
    }
} catch (PDOException $e) {

    $exeception = [

        'code' => $e->getCode(),
        'message' => $e->getMessage()

    ];

    $reponse = array(

        "code" => "erreur",
        "message" => "erreur server"

    );

    echo json_encode($reponse);
}
