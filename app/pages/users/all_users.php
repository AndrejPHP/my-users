<?php if(!defined("APP_URL")) exit(); ?>
<?php
if(isset($_GET["q"]))
    $all_users = $users->searchUsers($_GET);
else $all_users = $users->getUsers();
?>
<?php include "partial_search_users.php"; ?>
<?php if(!empty($all_users)): ?>
<input type="button" class="btn btn-danger" value="Delete All Users" id="delete-all-users" /><br /><br />
<?php endif; ?>
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
