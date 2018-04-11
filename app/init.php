<?php

require_once __DIR__ . "/db/User.php";
require_once __DIR__ . "/db/Country.php";
require_once __DIR__ . "/db/Note.php";
$users = new User();
$countries = new Country();
$notes = new Note();
define("APP_URL", "");  //your APP_URL here
if(APP_URL == "" || !defined("APP_URL")) {
    echo "APP_URL needs to be defined in app/init.php or it is empty.";
    exit();
}
