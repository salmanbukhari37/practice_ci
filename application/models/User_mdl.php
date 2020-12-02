<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_mdl extends CI_Model {
    function __constructor () {
        parent::__constructor();
    }

    function GetUser () {
        $query = $this->db->query("SELECT * FROM user");
        return $query->result();
    }    

    function GetUserById ($id) {
        $query = $this->db->query("SELECT * FROM user WHERE ID= " . $id );
        return $query->result();
    }    
    
    function SaveUser ( $data ) {
        $result = $this->db->insert("user", $data);
        return $result;
    }

    function DeleteUser ( $id ) {
        // echo $id;
 
        if ($this->db->delete("user", array("ID" => $id ))) {
            return true;
        }else{
            return false;
        }
    }

    function UpdateUser ($data, $id) {
        return $this->db->update("user", $data, array("ID" => $id));
    }
}