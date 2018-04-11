<?php

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
    if (isset($_POST["note_id"]))
    {
        $note_id = (int)htmlentities($_POST["note_id"]);
        if($note_id != 0)
        {
            require '../../init.php';
            $delete = $notes->deleteNote($note_id);
        }
    }
}
