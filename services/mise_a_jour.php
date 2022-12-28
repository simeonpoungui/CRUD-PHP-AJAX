<?php

require('../config/db.php');

$data = (object) $_POST;

$update = "UPDATE eleve SET nom = ? , prenom = ? , phone = ? where id = ?";
$requestp = $db->prepare($update);

try {
    
    $execute = $requestp->execute([

        $data->nom,
        $data->prenom,
        $data->phone,
        $data->id

    ]);

    if ($execute) {

        if ($requestp->rowCount() == 1) {

            $tab_reponse = [

                'code' => "succes",
                'message' => "mise à jour effectuée"
            ];

            echo json_encode($tab_reponse);
            
        }else {

            $tab_reponse = [

                'code' => "erreur",
                'message' => "mise à jour non effectuée"
            ];

            echo json_encode($tab_reponse);
            
        }
    }else {

        $tab_reponse = [

            'code' => "erreur",
            'message' => "erreur d'execution de la requette"
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
        'message' => 'erreur systeme',
        'details' => $exeception
    ];

    echo json_encode($tab_reponse);

}