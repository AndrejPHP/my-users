<?php

require_once 'DB.php';

class User
{
    private $db;
    private $searchable = ["first_name", "last_name", "email", "address", "city", "zip", "country_id", "dob", "active"];
    private $select_users = "SELECT users.id, first_name, last_name, email, address, city, zip, country_id, dob, active, country FROM users LEFT JOIN countries ON users.country_id = countries.id";

    public function __construct()
    {
       $this->db = DB::getDB();
    }

    public function addUser(array $data)
    {
        $insert = $this->db->prepare("INSERT INTO users(first_name, last_name, email, address, city, zip, country_id, dob, active, created_at, updated_at) VALUES(:first_name, :last_name, :email, :address, :city, :zip, :country_id, :dob, :active, NOW(), NOW())");
        $insert->execute($data);
        return $insert->rowCount();
    }

    public function getUsers()
    {
        $select = $this->db->query($this->select_users . " ORDER BY first_name ASC");
        return $select->fetchAll();
    }

    public function getActiveUsers()
    {
        $select = $this->db->query($this->select_users . " WHERE active = 1 ORDER BY first_name ASC");
        return $select->fetchAll();
    }

    public function getInactiveUsers()
    {
        $select = $this->db->query($this->select_users . " WHERE active = 0 ORDER BY first_name ASC");
        return $select->fetchAll();
    }

    public function getUserByID($user_id)
    {
        $select = $this->db->prepare($this->select_users . " WHERE users.id = :id");
        $select->execute(array(":id" => $user_id));
        return $select->fetch();
    }

    public function searchUsers($params)
    {
        $param_values = [];
        $param_keys = [];
        $query = $this->select_users;

        if(isset($params["search_type"]) && $params["search_type"] == "exlusive")
            $search_type = " AND ";
        else if(isset($params["search_type"]) && $params["search_type"] == "inclusive")
            $search_type = " OR ";
        else $search_type = " AND ";

        if(count($params) > 0)
        {
            foreach ($params as $key => $value) {
                if (in_array($key, $this->searchable) && $value != "" && $value != "all") {
                    $param_keys[] = $key;
                    $param_values[":".$key] = $value;
                }
            }
            if(count($param_keys) > 0)
            {
                $query .= " WHERE ";
                $i = 0;
                foreach($param_keys as $search_term)
                {
                    if($i == 0) $query .=  " ".$search_term . " = " . ":".$search_term; //skip AND / OR in the SQL query construction if it is the first element
                    else $query .= $search_type .  " ".$search_term . " = " . ":".$search_term;
                    $i++;
                }
            }
        }

        $search = $this->db->prepare($query);
        $search->execute($param_values);

        return $search->fetchAll();
    }

    public function updateUser($data)
    {
        $update = $this->db->prepare("UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email, address = :address, city = :city, zip = :zip, country_id = :country_id, dob = :dob, active = :active, updated_at = NOW() WHERE id = :id");
        $update->execute($data);
    }

    public function deleteUser($user_id)
    {
        $delete = $this->db->prepare("DELETE FROM users WHERE id = :id");
        $delete->execute(array(":id" => $user_id));
        return $delete->rowCount();
    }

    public function deleteAllUsers()
    {
        $delete_users = $this->db->query("DELETE FROM users");
        $delete_notes = $this->db->query("DELETE FROM users_notes");
    }

    public function total()
    {
        $select = $this->db->query("SELECT COUNT(id) as count FROM users");
        $total = $select->fetch();
        return $total["count"];
    }

    public function active_users_count()
    {
        $select = $this->db->query("SELECT COUNT(id) as count FROM users WHERE active = 1");
        $total = $select->fetch();
        return $total["count"];
    }

    public function inactive_users_count()
    {
        $select = $this->db->query("SELECT COUNT(id) as count FROM users WHERE active = 0");
        $total = $select->fetch();
        return $total["count"];
    }
}
