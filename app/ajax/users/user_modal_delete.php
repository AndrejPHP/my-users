<?php

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
    $user_id = (int)htmlentities($_GET["user_id"]);
    if($user_id != 0)
    {
        require '../../init.php';
        $user = $users->getUserByID($user_id);
        if($user) {
            ?>
            <h3>Delete the following user?</h3>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><?php echo htmlspecialchars($user["first_name"]); ?> <?php echo htmlspecialchars_decode($user["last_name"]); ?></h4>
                </div>
                <div class="panel-body">
                    <strong>Email:</strong> <?php echo htmlspecialchars_decode($user["email"]); ?><hr/>
                    <strong>Address:</strong> <?php echo htmlspecialchars_decode($user["address"]); ?><hr/>
                    <strong>City:</strong> <?php echo htmlspecialchars_decode($user["city"]); ?><hr/>
                    <strong>Zip:</strong> <?php echo htmlspecialchars_decode($user["zip"]); ?><hr/>
                    <strong>Country:</strong> <?php echo htmlspecialchars_decode($user["country"]); ?><hr/>
                    <strong>Date of birth:</strong> <?php echo htmlspecialchars_decode($user["dob"]); ?><hr/>
                    <strong>Active user:</strong> <?php echo htmlspecialchars($user["active"]) ? "<img src='images/active.png' alt='Active User' title='Active User' />" : "<img src='images/inactive.png' alt='Inactive User' title='Inactive User' />"; ?>
                    <input type="hidden" name="modal_delete_user_id" id="modal_delete_user_id" value="<?php echo $user_id; ?>" />
                </div>
            </div>
            <?php
        } else {  echo "<span style='color: red;'>Invalid user ID.</span>"; }
    }
    else
    {
        echo "<span style='color: red;'>Invalid user ID.</span>";
    }
}
