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
        $uid=$_POST['uid'];
        $this->ref->createlabels($label,$uid);
    }

    public function labeldatainsertion()
    {
        $title=$_POST['title'];
        $description=$_POST['description'];
        $labelname=$_POST['labelname'];
        $labelid=$_POST['labelid'];
        $uid=$_POST['uid'];
        $this->ref->createlabelnotes($title,$description,$labelname,$labelid,$uid);
    }
    public function deleteredis()
    {
        $this->ref->removeredis();
    }
    public function dragging()
    {
        $difference=$_POST['difference'];
        $dragid=$_POST['dragid'];
        $direction=$_POST['direction'];
        $uid=$_POST['uid'];
        $this->ref->setposition($difference,$dragid,$direction,$uid);
    }
}