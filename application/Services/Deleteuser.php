<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Deleteuser extends CI_Controller
{
    public function deletes($eid)
    {
        $query="Delete from notes where id='$eid'";
        $stmt=$this->db->conn_id->prepare($query);
        $stmt->execute();
    }
}
?>