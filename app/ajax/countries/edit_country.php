<?php

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
    $cid =  (int)htmlentities($_POST["cid"]);
    $action = htmlentities($_POST["action"]);
    if($cid != 0)
    {
        require '../../init.php';
        switch($action)
        {
            case "update":
                $code = isset($_POST["countrydata"]["code"]) ? $_POST["countrydata"]["code"] : "";
                $country = isset($_POST["countrydata"]["country"]) ? $_POST["countrydata"]["country"] : "";

                $data = array(
                    ":code" => $code,
                    ":country" => $country,
                    ":id" => $cid,
                );

                $update = $countries->updateCountry($data);
                if($update > 0) echo json_encode(array('success' => true));
                break;

            case "delete":
                $delete = $countries->deleteCountry($cid);
                if($delete > 0) echo json_encode(array('success' => true));
                break;

            default:
                echo json_encode(array('success' => false));
                break;
        }
    } else echo json_encode(array('success' => false));
}
