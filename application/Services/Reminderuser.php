<?php
class Reminderuser
{
    public function fetchreminder()
    {
        $query="select * from notes where reminder!=null";
          $stmt=$this->db->conn_id->prepare($query);
          $stmt->execute();
    }
    public function setreminder($date)
    {
        $query="insert into notes where reminder='$date'";
        $stmt=$this->db->conn_id->prepare($query);
        $stmt->execute();
    }
}