<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Authorization");

include_once("/var/www/html/codeigniter/application/Services/Deleteuser.php");
class Deletenote extends CI_controller
{
    public function __construct()
    {
        $ref=new  Deleteuser();
    }
    public function deleted()
    {
        $eid=$_POST['eid'];
        $this->ref->deletes($eid);
    }
}
