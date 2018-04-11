<?php if(!defined("APP_URL")) exit(); ?>
<h1>Notes</h1>
<hr/>
<?php
if(isset($_GET["user"]) && $_GET["user"] != "all") {
    $all_notes = $notes->getNotesForUser($_GET["user"]);
} else $all_notes = $notes->getNotes();
?>
<?php $all_users = $users->getUsers(); ?>
        <form method="get" class="form-inline">
            <div class="form-group">
                <label for="exampleInputName2">User</label>
                <select name="user" class="form-control">
                    <option value="all">All Users</option>
                    <?php if(!empty($all_users)) { ?>
                        <?php foreach($all_users as $user) { ?>
                            <option value="<?php echo $user["id"]; ?>" <?php if(isset($_GET["user"]) && $_GET["user"] == $user["id"]) { ?> selected <?php } ?>><?php echo $user["first_name"]; ?> <?php echo $user["last_name"]; ?> | <?php echo $user["email"]; ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Search Notes</button>
        </form>
<hr/>
<div class="alert alert-info">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <p>By default last 100 notes are shown.</p>
    <p>When searching for specific user notes, all notes for this user are shown.</p>
    <p>Longer notes are limited to the first 200 characters. To see full note click "View / Hide more" or on the edit note icon.</p>
</div>
<input type="button" class="btn btn-danger" value="Delete All Notes" id="delete-all-notes" /><small>This deletes all notes for all users. Confirmation is required.</small><br /><br />
<table class="table table-hover table-bordered">
    <thead>
        <tr class="bg-primary">
            <th>User</th>
            <th style="width: 60%;">Note</th>
            <th style="text-align: center;">Date Added</th>
            <th style="text-align: center;">Edit</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <?php if(!empty($all_notes)) { ?>
            <?php foreach($all_notes as $note) { ?>
            <tr id="<?php echo $note["id"]; ?>">
                <td><a href="#"><?php echo $note["first_name"]; ?> <?php echo $note["last_name"]; ?> | <?php echo $note["email"]; ?></a></td>
                <td><?php echo nl2br($notes->noteText($note["note"])); ?></td>
                <td><?php if($note["created_at"] != "0000-00-00") echo date("F jS, Y H:i:s", strtotime($note["created_at"])); ?></td>
                <td style="text-align: center;"><img src="images/edit.png" class="edit-note" alt="Edit Note" title="Edit Note" /></td>
            </tr>
            <?php } ?>
        <?php } else { ?>
        <tr>
            <td colspan="4">No notes found.</td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php include "partial_notes_modal.php"; ?>
