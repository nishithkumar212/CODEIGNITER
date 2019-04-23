<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Authorization");
defined('BASEPATH') or exit('No direct script access allowed');
include_once("/var/www/html/codeigniter/application/Services/Reminderuser.php");
class Reminder extends CI_Controller
{
    private $ref;
    public function __construct()
    {
        $this->ref=new Reminderuser();
    }
    public function setreminder()
    {
                $uid=$_POST['uid'];
             return $this->ref->fetchreminder($uid);
    }
    public function insertreminder()
    {
       $remin= $_POST['reminderdate'];
        $ref->setreminder($remin);
    }
}