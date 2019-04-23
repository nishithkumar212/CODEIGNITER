<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Authorization");
defined('BASEPATH') or exit('No direct script access allowed');
include_once("/var/www/html/codeigniter/application/Services/Updatenoteslabel.php");
class Updatelabelnote extends CI_Controller
{
    public function __construct()
    {
       
        $this->ref = new Updatenoteslabel();
    }
    public function update()
    {
        $labelid=$_POST['labelid'];
       $notesid= $_POST['notesid'];
        $this->ref->notesupdate($labelid,$notesid);
    }
    public function  deletelabel()
    {

        $labelid=$_POST['labelid'];
         $noteid= $_POST['noteid'];
         $this->ref->deletelabel($labelid,$noteid);
    }
    public function addlabel()
    {
      $labelid=$_POST['labelid'];
       $noteid=$_POST['noteid'];
       $this->ref->addlabel($labelid,$noteid);
    }
}