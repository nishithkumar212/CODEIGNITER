<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Reminderuser extends CI_Controller
{
    public function fetchreminder($email)
    {
        $query= " SELECT  * from notes where reminder!='' And emailid='$email'";
          $stmt=$this->db->conn_id->prepare($query);
          $stmt->execute();
          $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
         print json_encode($data);
    }
    public function setreminder($date)
    {
        $query="insert into notes where reminder='$date'";
        $stmt=$this->db->conn_id->prepare($query);
        $stmt->execute();
    }
}