<?php

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
    require '../../init.php';
    $user_id = (int)htmlentities($_POST["user_id"]);
    $note = htmlentities($_POST["note"]);

    $add = 0;

    if($user_id != 0)
    {
        $add = $notes->addNote($user_id, $note);
    }

    if($add > 0)
        echo json_encode(array('success' => true));
    else echo json_encode(array('success' => false));
}
