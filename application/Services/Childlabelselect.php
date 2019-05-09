<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once "/var/www/html/codeigniter/application/predis-1.1/autoload.php";
class  Childlabelselect extends CI_Controller
{
   public function childselection($labelid)
   {
     $query="select n.title,n.description,l.id, l.labelname from notes n,Labels l,label_notes ln where n.id=ln.noteid AND l.id=ln.labelid AND l.id='$labelid'" ;
            $stmt=$this->db->conn_id->prepare($query);
            $stmt->execute();
            $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data);
   }
}
