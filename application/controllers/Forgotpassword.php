<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Authorization");
defined('BASEPATH') or exit('No direct script access allowed');
include ("/var/www/html/codeigniter/application/Services/Forgotuser.php");
class Forgotpassword extends CI_Controller
{
    private $ref="";
    public function __construct()
    {
        parent::__construct();
        $this->ref=new Forgotuser();
    }
    public function forgot()
    {
         $email=$_POST['email'];
        return $this->ref->forget($email);
    }
}

