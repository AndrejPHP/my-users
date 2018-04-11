<?php

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
    $note_id = (int)htmlentities($_POST["note_id"]);
    $note = htmlentities($_POST["note"]);
    if($note_id != 0)
    {
        require '../../init.php';

        $update = 0;

        $data = array(
            ":id" => $note_id,
            ":note" => $note,
        );
        $update = $notes->updateNote($data);

        if($update > 0)
            echo json_encode(array("success" => true));
        else echo json_encode(array("success" => false));

    } else echo json_encode(array("success" => false));
}
