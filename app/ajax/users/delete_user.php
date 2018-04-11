<?php

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
    require '../../init.php';
    $user_id = (int)htmlentities($_POST["id"]);
    if($user_id != 0)
    {
        $delete = $users->deleteUser($user_id);
        if($delete > 0)
            echo json_encode(array('yeah' => true, 'message' => 'User was successfully deleted.'));
        else echo json_encode(array('fail' => true, 'message' => 'There was a problem deleting the user. Please try again.'));
    }
    else
    {
        echo json_encode(array('fail' => true, 'message' => 'There was a problem deleting the user. Please try again.'));
    }
}
