<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Updatenotes extends CI_Controller
{

    public function setcolor($color,$id)
    {
        $query="UPDATE notes SET color='$color' where id='$id'";
        $stmt=$this->db->conn_id->prepare($query);
        $stmt->execute();
    }
    public function updatedb($etit,$edes,$eid)
    {
    $query="UPDATE notes SET title='$etit',description='$edes' where id='$eid'";
    $stmt=$this->db->conn_id->prepare($query);
        $stmt->execute();
}
}