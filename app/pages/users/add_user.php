<h1>Add User</h1>
<hr/>
<?php $all_countries = $countries->getCountries(); ?>
<div id="user-info"></div>
<form method="post" id="addUserForm">
    <?php include "partial_form_fields.php"; ?>
    <input type="button" class="btn btn-primary btn-lg" id="add-user" value="Add" />
</form>