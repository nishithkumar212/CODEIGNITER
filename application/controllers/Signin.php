<?php
defined('BASEPATH') or exit('No direct script access allowed');
include "/var/www/html/codeigniter/application/Services/Register.php";
class Signin extends CI_Controller
{
    private $ref = "";
    public function __construct()
    {
        parent::__construct();
        $this->ref = new Register();
    }
    public function insertion()
    {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];
        $this->ref->insertdb($firstname, $lastname, $email, $password, $confirmpassword);
    }
}
