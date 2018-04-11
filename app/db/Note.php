<?php

require_once 'DB.php';

class Note
{
    private $db;
    private $select_notes = "SELECT users_notes.id, user_id, note, users_notes.created_at, first_name, last_name, email FROM users_notes LEFT JOIN users ON users_notes.user_id = users.id";

    public function __construct()
    {
        $this->db = DB::getDB();
    }

    public function getNotes()
    {
        $select = $this->db->query($this->select_notes . " ORDER BY created_at DESC LIMIT 100");
        return $select->fetchAll();
    }

    public function getNoteByID($id)
    {
        $select = $this->db->prepare($this->select_notes . " WHERE users_notes.id = :id");
        $select->execute(array(":id" => $id));
        return $select->fetch();
    }

    public function getNotesForUser($user_id)
    {
        $select = $this->db->prepare($this->select_notes . " WHERE user_id = :user_id");
        $select->execute(array(":user_id" => $user_id));
        return $select->fetchAll();
    }

    public function addNote($user_id, $note)
    {
        $add = $this->db->prepare("INSERT INTO users_notes(user_id, note, created_at, updated_at) VALUES(:user_id, :note, NOW(), NOW())");
        $add->execute(array(
           ":user_id" => $user_id,
           ":note" => $note,
        ));
        return $add->rowCount();
    }

    public function updateNote($data)
    {
        $update = $this->db->prepare("UPDATE users_notes SET note = :note WHERE id = :id");
        $update->execute($data);
        return $update->rowCount();
    }

    public function noteText($note)
    {
        $note_final = "";
        $note_original = $note;

        $string_length = strlen($note);
        if($string_length >= 250) $note = substr($note, 0, 250);

        if($string_length <= 200)
        {
            $note_final = $note;
        }
        else
        {
            $words = explode(" ", $note);

            $length = 0;
            $array = array();

            foreach($words as $key => $word)
            {
                $length += strlen($word);
                $length++;

                if($length < 200)
                {
                    $array[] = $word;
                }
                if($length >= 200) {
                    $note_final = "<div class='short_note'>" . implode(" ", $array) . "...</div><a href='#' class='btn btn-info view_more_note'>View / Hide more</a> <div class='full_note'>" . $note_original . "</div>";
                }
            }
        }

        return $note_final;
    }

    public function deleteNote($id)
    {
        $delete = $this->db->prepare("DELETE FROM users_notes WHERE id = :id");
        $delete->execute(array(":id" => $id));
        return $delete->rowCount();
    }

    public function deleteAllNotes()
    {
        $this->db->query("DELETE FROM users_notes");
    }

    public function total()
    {
        $select = $this->db->query("SELECT COUNT(id) as count FROM users_notes");
        $total = $select->fetch();
        return $total["count"];
    }
}
