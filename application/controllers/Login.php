<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Authorization");
defined('BASEPATH') or exit('No direct script access allowed');
include "/var/www/html/codeigniter/application/Services/Loginuser.php";
class Login extends CI_Controller
{
    private $ref="";
    public function __construct()
    {
        parent::__construct();
        $this->ref = new Loginuser();
    }
    public function login()
    {
            $email=$_POST['email'];
            $password=$_POST['password'];
            return  $this->ref->signin($email,$password);
    }
    public function signin()
    {
        $email = $_POST["email"];
        $name  = $_POST["name"];
        $image=$_POST["image"];
        return  $this->ref->socialSignIn($email, $name,$image);
    }
    public function imageinsertion()
    {
                $email=$_POST['email'];
                $image=$_POST['image'];
                return $this->ref->databaseimageinsertion($email,$image);
    }
    public function imageinsertionnote()
    {
                    $image=$_POST['image'];
                     $id= $_POST['id'];
                     return $this->ref->noteimage($image,$id);
    }
}
