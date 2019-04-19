<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Authorization");
defined('BASEPATH') or exit('No direct script access allowed');
include_once("/var/www/html/codeigniter/application/Services/Noteuser.php");
class Note extends CI_Controller
{
      function __construct()
 {
     parent::__construct();
     $this->ref=new Noteuser();
 }
    public function noteregister()
    {
        //(actual) $myhead=apache_request_headers();
       $tit=$_POST['title'];
       $des=$_POST['description'];
    //   $email=$_POST['emailid'];
       $date=$_POST['reminder'];
                $labelid=$_POST['labelid'];
       $myhead=0;
       return  $this->ref->notes($tit,$des,$myhead,$date,$labelid);
    }
    // public function labeldatainsertion()
    // {
    //         $tit=$_POST['title'];
    //         $des=$_POST['description'];
    //         $labelname=$_POST['labelname'];
        

    // }
    public function createlabel()
    {
        $label=$_POST['label'];
        $email=$_POST['email'];
        $this->ref->createlabels($label,$email);
    }
}