<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Authorization");
include_once("/var/www/html/codeigniter/application/Services/Childlabelselect.php");
class  Childlabel extends CI_controller
{
    private $ref;
    public function __construct()
    {
        $this->ref=new  Childlabelselect();
    }
    public function label()
    {
            $labelid=$_POST['labelid'];
            return $this->ref->childselection($labelid);
    }
}