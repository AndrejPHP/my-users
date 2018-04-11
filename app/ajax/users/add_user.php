<?php

if(isset($_POST["userData"]))
{
    $data = array();
    parse_str($_POST["userData"], $data);

    $data["first_name"] = isset($data["first_name"]) ? $data["first_name"] : "";
    $data["last_name"] = isset($data["last_name"]) ? $data["last_name"] : "";
    $data["email"] = isset($data["email"]) ? $data["email"] : "";
    $data["address"] = isset($data["address"]) ? $data["address"] : "";
    $data["city"] = isset($data["city"]) ? $data["city"] : "";
    $data["zip"] = isset($data["zip"]) ? $data["zip"] : "";
    $data["dob"] = isset($data["dob"]) ? $data["dob"] : "";
    $data["country_id"] = isset($data["country_id"]) ? (int)$data["country_id"] : 0;
    $data["active"] = isset($data["active"]) ? (int)$data["active"] : 1;

    $add = 0;

    if(trim($data["first_name"]) != "" && trim($data["last_name"] != ""))
    {
        $data_db = array(
            ":first_name" => $data["first_name"],
            ":last_name" => $data["last_name"],
            ":email" => $data["email"],
            ":address" => $data["address"],
            ":city" => $data["city"],
            ":zip" => $data["zip"],
            ":dob" => $data["dob"],
            ":country_id" => $data["country_id"],
            ":active" => $data["active"],
        );
        require '../../init.php';
        $add = $users->addUser($data_db);
    }

    if($add > 0) echo json_encode(array('yeah' => true));
    else echo json_encode(array('yeah' => false));
}
