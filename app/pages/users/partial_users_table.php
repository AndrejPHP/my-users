<?php if(!defined("APP_URL")) exit(); ?>
<table class="table table-bordered table-hover">
    <thead>
    <tr class="bg-primary">
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>City</th>
        <th>Zip</th>
        <th>Country</th>
        <th>DOB</th>
        <th>Active</th>
        <th>Edit</th>
    </tr>
    </thead>
    <tbody class="bg-white">
    <?php foreach($all_users as $user): ?>
        <tr id="<?php echo htmlspecialchars($user["id"]); ?>">
            <td><?php echo htmlspecialchars($user["first_name"]); ?></td>
            <td><?php echo htmlspecialchars($user["last_name"]); ?></td>
            <td><?php echo htmlspecialchars($user["email"]); ?></td>
            <td><?php echo htmlspecialchars($user["address"]); ?></td>
            <td><?php echo htmlspecialchars($user["city"]); ?></td>
            <td><?php echo htmlspecialchars($user["zip"]); ?></td>
            <td><?php echo htmlspecialchars($user["country"]); ?></td>
            <td><span data-toggle="tooltip" data-placement="top" title="<?php if($user["dob"] != "0000-00-00") echo date("F j, Y", strtotime(htmlspecialchars($user["dob"]))); ?>"><?php if($user["dob"] != "0000-00-00") echo htmlspecialchars($user["dob"]); ?></span></td>
            <td style="text-align: center;"><?php echo htmlspecialchars($user["active"]) ? "<img src='images/active.png' alt='Active User' title='Active User' />" : "<img src='images/inactive.png' alt='Inactive User' title='Inactive User' />"; ?></td>
            <td style="text-align: center;"><img src="images/edit.png" class="edit-user" alt="Edit User" title="Edit User" /> <img src="images/note_add.png" class="add-note" alt="Add Note" title="Add Note" note-user="<?php echo htmlspecialchars($user["first_name"]) ?> <?php echo htmlspecialchars($user["last_name"]) ?> | <?php echo htmlspecialchars($user["email"]); ?>" /> <img src="images/delete.png" class="delete-user" alt="Delete User" title="Delete User" delete-user-msg="Are you sure you want to delete user <?php echo htmlspecialchars($user["first_name"]); ?> <?php echo htmlspecialchars($user["last_name"]); ?>" user-id="<?php echo htmlspecialchars($user["id"]); ?>" /></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>