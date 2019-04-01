<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Authorization");

include_once("/var/www/html/codeigniter/application/Services/Archiveuser.php");
class Archive extends CI_Controller
{
    private $ref;
    public function __Construct()
    {
        $this->ref=new Archiveuser();
    }
    public function setarchive()
    {
        $value=$_POST['id'];
        $this->ref->insertarchive($value);
    }
    public function setarchivedisplay()
    {
         $this->ref->fetcharchivedisplay();
    }
}