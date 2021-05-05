<?php

namespace App\Models;

use PDO;
use PDOException;

class M
{


    public $db;

    public function __construct()
    {
        try {
            $this->db = new PDO("mysql:host=" . SQL_HOST . ":" . SQL_PORT . ";dbname=" . SQL_DB . ";charset=UTF8", SQL_USER, SQL_PASS);
        } catch (PDOException  $err) {
            die($err->getMessage());
        }
    }



    public function GetData()
    {

        try {

            $req = $this->db->query("SELECT * FROM d_tree_data ORDER BY parent");
            $row = $req->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException  $err) {
        }
    }


    public function AddData($name, $content, $parent)
    {
        try {

            $req = $this->db->prepare("INSERT INTO d_tree_data (`parent`,`name`,`content`) VALUES (:parent, :name, :content)");
            $req->execute(['parent' => $parent, 'name' => $name, 'content' => $content]);
            return true;
        } catch (PDOException $err) {
            die($err->getMessage());
            return false;
        }
    }

    public function AddData2($id, $name, $content, $parent)
    {
        try {

            $req = $this->db->prepare("UPDATE d_tree_data SET `name`=:name, `content`=:content, `parent`=:parent WHERE id=:id");
            $req->execute(['id' => $id, 'parent' => $parent, 'name' => $name, 'content' => $content]);
            return true;
        } catch (PDOException $err) {
            die($err->getMessage());
            return false;
        }
    }


    public function DellData($id)
    {
        try {

            $req = $this->db->prepare("DELETE FROM d_tree_data WHERE id=:id");
            $req->execute(['id' => $id]);
            return true;
        } catch (PDOException $err) {
            return false;
        }
    }


    public function GetUser($username)
    {
        $username = strtolower($username);
        try {

            $req = $this->db->prepare("SELECT * FROM d_tree_users WHERE user=:user");
            $req->execute(['user' => $username]);
            $user = $req->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                return $user;
            } else {
                return false;
            }
        } catch (PDOException $err) {
            return false;
        }

        return false;
    }


    public function SetUser($username, $password)
    {

        $username = strtolower($username);
        $password = md5($password);

        try {

            $req = $this->db->prepare("INSERT INTO d_tree_users (`user`,`password`) VALUES (:user, :password)");
            $req->execute(['user' => $username, 'password' => $password]);

            $LID = $this->db->lastInsertId();
            $req = $this->db->prepare("SELECT * FROM d_tree_users WHERE id=:id");
            $req->execute(['id' => $LID]);
            $user = $req->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                return $user;
            } else {
                return false;
            }
        } catch (PDOException $err) {
            return false;
        }

        return false;
    }
}
