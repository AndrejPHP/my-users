<?php

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
    $user_id = (int)htmlentities($_GET["user_id"]);
    if($user_id != 0)
    {
        require '../../init.php';
        $user = $users->getUserByID($user_id);
        if($user) {
            $all_countries = $countries->getCountries();
            ?>
            <form method="post" id="updateUserForm">
            <?php include "../../pages/users/partial_form_fields.php"; ?>
                <input type="button" class="btn btn-primary btn-lg update-user" id="btn-update-user" value="Update" />
                <input type="hidden" name="user_id" id="modal_user_id" value="<?php echo $user_id; ?>" />
            </form>
            <div id="update-user-info"></div>
            <?php
        } else {  echo "<span style='color: red;'>Invalid user ID.</span>"; }
    }
    else
    {
        echo "<span style='color: red;'>Invalid user ID.</span>";
    }
}
