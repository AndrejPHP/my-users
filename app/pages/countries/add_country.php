<?php
if(isset($_POST["code"], $_POST["country"]))
{
    require '../../init.php';

    //using htmlentities is a bit redundant in this case since PDO prepared statements take care of this. However, never forget to validate user input due to the golden rule: never trust user input
    $code = htmlentities($_POST["code"]);
    $country = htmlentities($_POST["country"]);

    if(!empty($code) && !empty($country))
    {
        $data = array(
          ":code" => $code,
          ":country" => $country,
        );
        $add = $countries->addCountry($data);
        if($add > 0)
            header("Location: " . APP_URL . "countries?added=1");
        else header("Location: " . APP_URL . "countries?added=0");
    } else header("Location: " . APP_URL . "countries?added=0");
}
