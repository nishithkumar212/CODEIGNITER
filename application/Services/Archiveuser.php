<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Authorization");
defined('BASEPATH') or exit('No direct script access allowed');
class Archiveuser extends CI_Controller
{
        public function insertarchive($value)
        {
            $query="UPDATE notes set archive=1 where id='$value' ";
            $stmt=$this->db->conn_id->prepare($query);
             $stmt->execute();
        }
        public function unsetarchive($value)
        {
                $query="UPDATE notes set archive=0 where id='$value' ";
            $stmt=$this->db->conn_id->prepare($query);
             $stmt->execute();
        }
        public function fetcharchivedisplay()
        {
                $query= " select * from notes where archive=1";
                $stmt=$this->db->conn_id->prepare($query);
                $stmt->execute();
                $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
                 print json_encode($data);
        }
}