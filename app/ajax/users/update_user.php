<?php

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
    require '../../init.php';
    $user_id = (int)htmlentities($_POST["id"]);

    $data = array();
    parse_str($_POST["data"], $data);   //$_POST["data"] is the serialized form data which gets converted into array $data
    $data["user_id"] = $user_id;

    //a lil' check just in case :D
    $data["first_name"] = isset($data["first_name"]) ? $data["first_name"] : "";
    $data["last_name"] = isset($data["last_name"]) ? $data["last_name"] : "";
    $data["email"] = isset($data["email"]) ? $data["email"] : "";
    $data["address"] = isset($data["address"]) ? $data["address"] : "";
    $data["city"] = isset($data["city"]) ? $data["city"] : "";
    $data["zip"] = isset($data["zip"]) ? $data["zip"] : "";
    $data["dob"] = isset($data["dob"]) ? $data["dob"] : "";
    $data["country_id"] = isset($data["country_id"]) ? (int)$data["country_id"] : 0;
    $data["active"] = isset($data["active"]) ? (int)$data["active"] : 1;

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
           ":id" => $user_id,
    );

    $update = $users->updateUser($data_db);
}
