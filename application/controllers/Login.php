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
        $key   = explode("@", $email);
        $key   = $key[0];
        /**
         * adding user email to the redis
         */
        $this->load->library('Redis');
        $redis = $this->redis->config();
        $redis->set($email, $email);
        $this->ref->socialSignIn($email, $name);
    }
}
