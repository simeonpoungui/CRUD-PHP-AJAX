<?php

require('../config/db.php');

$data = (object) $_POST;

$recuperation = "SELECT * FROM eleve";

if (empty($id)) {

    try {

        $query = $db->query($recuperation);
        $eleve = $query->fetchAll(PDO::FETCH_ASSOC);

        $tab_reponse = [

            'code' => "succes",
            'message' => $eleve
        ];

        echo json_encode($tab_reponse);
        
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
} else {


    $selec_id = "SELECT  * FROM eleve WHERE id = :id";
    $request = $db->prepare($selec_id);

    try {

        $execute = $request->execute(["id" => $data->id]);

        if ($execute) {

            $eleve = $request->fetch(PDO::FETCH_ASSOC);

            $tab_reponse = [

                'code' => "succes",
                'message' =>  $eleve
            ];

            echo json_encode($tab_reponse);
        }
    } catch (PDOException $e) {

        $exeception = [

            'code' => $e->getCode(),
            'message' => $e->getMessage()

        ];

        $reponse = [

            "code" => "erreur",
            "message" => "erreur server"
        ];

        echo json_encode($reponse);
    }
}
 