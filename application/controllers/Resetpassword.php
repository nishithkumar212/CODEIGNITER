<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Authorization");
defined('BASEPATH') or exit('No direct script access allowed');
include_once("/var/www/html/codeigniter/application/Services/Resetpass.php");
class Resetpassword extends CI_Controller
{
    private $ref="";
    public function __construct()
    {
        parent::__construct();
        $this->ref=new Resetpass();
    }
    public function reset()
    {
        $pass=$_POST['password'];
        $token=$_POST['token'];
         return $this->ref->changingpassword($pass,$token);
    }
    public function getemail()
    {
        $email=$_POST['token'];
        return $this->ref->verificationtoken($email);
    }
}