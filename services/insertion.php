<?php

require('../config/db.php');

$data = (object) $_POST;

$select = "SELECT * FROM eleve where nom = :nom and email = :email";
$requesp = $db->prepare($select);

try {

    $execute = $requesp->execute([

        "nom" => $data->nom,
        "email" => $data->email

    ]);

    if ($execute) {

        if ($requesp->rowCount() == 1) {

            $tab_reponse = [

                'code' => "erreur",
                'message' => "cet eleve existe deja"
            ];

            echo json_encode ($tab_reponse);

        } else {

            $insert = "INSERT INTO eleve(nom,prenom,phone,email,password) VALUES(:nom , :prenom , :phone , :email , :password)";
            $requesp = $db->prepare($insert);

            try {

                $execute = $requesp->execute([

                    "nom" => $data->nom,
                    "prenom" => $data->prenom,
                    "phone" => $data->phone,
                    "email" => $data->email,
                    "password" => $data->password

                ]);

                if ($execute) {

                    $tab_reponse = [

                        'code' => "sucees",
                        'message' => "inscription effectuée avec succes"

                    ];

                    echo json_encode($tab_reponse);

                } else {

                    $tab_reponse = [

                        'code' => "erreur",
                        'message' => "inscription non effectuée"

                    ];

                    echo json_encode($tab_reponse);
                }
            } catch (PDOException $e) {

                $exeception = [

                    'code' => $e->getCode(),
                    'messsage' => $e->getMessage()
                ];

                $tab_reponse = [

                    'code' => 'erreur',
                    'message' => 'erreur de connexion à la base de donnée',
                    'details' => $exeception
                ];

                echo json_encode($tab_reponse);
            }
        }
    }
} catch (PDOException $e) {


    $exeception = [

        'code' => $e->getCode(),
        'messsage' => $e->getMessage()
    ];

    $tab_reponse = [

        'code' => 'erreur',
        'message' => 'erreur systeme',
        'details' => $exeception
    ]; 

    echo json_encode($tab_reponse);

}
