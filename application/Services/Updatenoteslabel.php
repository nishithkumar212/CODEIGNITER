<?php
class Updatenoteslabel extends CI_Controller
{
    public function notesupdate($labelid,$notesid)
    {
    $query="UPDATE notes set labelid='$labelid' where id='$notesid'";
    $stmt=$this->db->conn_id->prepare($query);
    $stmt->execute();
    $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
    print json_encode($data);
    }
    public function deletelabel($labelid,$noteid)
    {
        $query="Delete  from label_notes where labelid='$labelid' AND noteid='$noteid'";
        $stmt=$this->db->conn_id->prepare($query);
        $stmt->execute();
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data);
    }
    public function addlabel($labelid,$noteid)
    {
        // $query="INSERT into notes (labelid) values ($labelid) where id='$noteid'";
        $query="insert into label_notes(noteid,labelid) values($noteid,$labelid)";
        $stmt=$this->db->conn_id->prepare($query);
        $res=$stmt->execute();
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data);
    }
}