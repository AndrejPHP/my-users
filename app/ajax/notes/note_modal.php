<?php

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
    $note_id = (int)htmlentities($_POST["note_id"]);
    if($note_id != 0)
    {
        require '../../init.php';
        $note = $notes->getNoteByID($note_id);
        if($note)
        { ?>
                <textarea class="form-control" name="note" id="modal_note" style="resize: vertical;" rows="10"><?php echo $note["note"]; ?></textarea>
                <input type="hidden" name="note_id" id="modal_note_id" value="<?php echo $note_id; ?>" />
        <?php
        }
        else
        {
            echo "<span style='color: red;'>Invalid Note ID</span>";
        }
    } else {
        echo "<span style='color: red;'>Invalid Note ID</span>";
    }
}
