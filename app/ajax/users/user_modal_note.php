<?php

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
    $user_id = (int)htmlentities($_GET["user_id"]);
    if($user_id != 0)
    {
        require '../../init.php';
        $user = $users->getUserByID($user_id);
        if($user) {
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo htmlspecialchars($user["first_name"]); ?> <?php echo htmlspecialchars_decode($user["last_name"]); ?>
                </div>
                <div class="panel-body">
                    <strong>Email:</strong> <?php echo htmlspecialchars_decode($user["email"]); ?> | <strong>Address:</strong> <?php echo htmlspecialchars_decode($user["address"]); ?> | <strong>City:</strong> <?php echo htmlspecialchars_decode($user["city"]); ?> | <strong>Zip:</strong> <?php echo htmlspecialchars_decode($user["zip"]); ?> | <strong>Country:</strong> <?php echo htmlspecialchars_decode($user["country"]); ?> | <strong>Date of birth:</strong> <?php echo htmlspecialchars_decode($user["dob"]); ?> | <strong>Active user:</strong> <?php echo htmlspecialchars($user["active"]) ? "<img src='images/active.png' alt='Active User' title='Active User' />" : "<img src='images/inactive.png' alt='Inactive User' title='Inactive User' />"; ?>
                </div>
            </div>
            <a href="<?php echo APP_URL; ?>notes?user=<?php echo $user_id; ?>" target="_blank" class="btn btn-info">View all notes for this user</a> (opens in new tab)
            <br /><br />
            <textarea class="form-control" name="note" id="note" rows="10" style="resize: vertical;" placeholder="Note"></textarea>
            <input type="hidden" id="note_user_id" name="user_id" value="<?php echo $user_id; ?>" />
            <?php
        } else {  echo "<span style='color: red;'>Invalid user ID.</span>"; }
    }
    else
    {
        echo "<span style='color: red;'>Invalid user ID.</span>";
    }
}
