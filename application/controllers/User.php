<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    function __constructor () {
        parent::__constructor();
        // $this->load->helper('Common');
    }

    public function index() {
        $result = $this->user->GetUser();

        $data = array(
            "userData" => $result
        );
        // echo "<pre>";
        // print_r($result);

        $this->load->view("User", $data);
    }

    public function Save() {
        // echo "form submitted";

        // debug($_POST);
        $saveData = array (
            "USERNAME" => $_POST['username'],
            "PASSWORD" => $_POST['password'],
            "EMAIL"    => $_POST['email'],
        ); 

        // $saveData = array (
        //     "USERNAME" => "kashif",
        //     "PASSWORD" => "124556",
        //     "EMAIL"    => "kashi@gmail.com",
        // ); 

        if ( $this->user->SaveUser($saveData) ) {
            echo "User inserted successfully.";
        }
    }

    function Delete($id) {
        if (empty($id)) {
            echo "Id should be provided";
        }else{
            $result = $this->user->DeleteUser( $id );
            echo $result;
            // if ( $this->user->DeleteUser( $id ) ) {
            //     // echo "User deleted successfully.";
            // }else{
            //     echo "Something went wrong.";
            // }
        }
    }

    function Update_view ( $id ) {
        $userData = $this->user->GetUserById($id);
        $result = $this->user->GetUser();
        $data = array (
            "user" => $userData[0],
            "userData" => $result
        );

        $this->load->view("User_update", $data);
    }

    function Update ( $id ) {
        // $updateData = array (
        //     "USERNAME" => "SALMAN",
        //     "PASSWORD" => "12345",
        //     "EMAIL"    => "imo@gmail.com",
        // );

        echo $this->user->UpdateUser($updateData, $id);
    }
}

