<?php
defined('BASEPATH') or exit('No direct script access allowed');
class  Childlabelselect extends CI_Controller
{
   public function childselection($labelid)
   {
     $query="SELECT title,description ,labelname from notes as n,editlabel as e where n.labelid=e.labelid AND n.labelid='$labelid'" ;
            $stmt=$this->db->conn_id->prepare($query);
            $stmt->execute();
            $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data);
   }
}
