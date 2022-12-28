<?php

require('../config/db.php');

$data = (object) $_POST;

$select = "DELETE FROM eleve WHERE id = ?";
$prepReq = $db->prepare($select);

try {

    $execute = $prepReq->execute([

        $data->id

    ]);
    if ($execute) {

        $reponse = array(

            "code" => "succes",
            "message" => "suppression effectuee"
        );

        echo json_encode($reponse);

    } else {

        $reponse = array(
            "code" => "erreur",
            "message" => "suppression non effectuee"
        );

        echo json_encode($reponse);
    }

} catch (PDOException $e) {
    
    $code = $e->getCode();
    $message = $e->getMessage();

    $reponse = array(

        "code" => "erreur",
        "message" => "erreur server"
        

    );

    echo json_encode ($reponse);

}
