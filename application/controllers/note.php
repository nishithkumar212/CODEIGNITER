<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Authorization");
defined('BASEPATH') or exit('No direct script access allowed');
include_once("/var/www/html/codeigniter/application/Services/noteuser.php");
class note extends CI_Controller
{
      function __construct()
 {
     parent::__construct();
     $this->ref=new noteuser();
 }
    public function noteregister()
    {
       $tit=$_POST['title'];
       $des=$_POST['description'];
       $this->ref->notes($tit,$des);
    }
}