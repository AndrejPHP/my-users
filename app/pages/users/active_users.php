<?php if(!defined("APP_URL")) exit(); ?>
<?php
if(isset($_GET["q"]))
    $all_users = $users->searchUsers($_GET);
else $all_users = $users->getActiveUsers();
?>
<?php include "partial_search_users.php"; ?>
<?php
if(isset($_GET["q"]) && empty($all_users))
{
    ?>
    <div class="alert alert-info">
        No users were found with the provided criteria.
    </div>
    <?php
}
else if($all_users)
    include "partial_users_table.php";

include "partial_user_modal_dg.php";
