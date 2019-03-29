<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Authorization");
include_once("/var/www/html/codeigniter/application/Services/Updatenotes.php");
class Editnotes extends CI_Controller
{
    private $ref;
    public function __Construct()
    {
        $this->ref=new Updatenotes();

    }
   public function edit()
   {
                $etitle=$_POST['etitle'];
                $description=$_POST['edescription'];
                $eid=$_POST['eid'];
                $this->ref->updatedb($etitle,$description,$eid);
   }
   public function coloring()
   {
       $colors=$_POST['setcolor'];
       $id=$_POST['setid'];
       $this->ref->setcolor($colors,$id);
   }
}