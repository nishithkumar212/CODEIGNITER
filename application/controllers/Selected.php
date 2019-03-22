<?php 
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Authorization");
defined('BASEPATH') or exit('No direct script access allowed');
include_once("/var/www/html/codeigniter/application/Services/Selection.php");
class Selected extends CI_Controller
{
    private $ref="";
    function __construct()
    {
        parent::__construct();
        $this->ref=new Selection();
    }
    public function calling()
    {
        $tokenemail=$_POST['tokenemail'];
       return  $this->ref->retrieve($tokenemail);
    }
}