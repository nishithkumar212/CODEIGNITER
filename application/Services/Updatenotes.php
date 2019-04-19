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
    public function searchnotes($data)
    {
       $query="SELECT id, color,title,description,reminder,notesimage, labelname FROM notes LEFT JOIN editlabel ON notes.labelid = editlabel.labelid   where notes.title LIKE '$data %' OR notes.description LIKE '$data %'  ORDERBY id DESC";
       $stmt=$this->db->conn_id($query); 
       $stmt->execute();
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        json_encode($data);
    }
}