<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Updatenotes extends CI_Controller
{
    public function updatedb($etit,$edes,$eid)
    {
        if(empty($etit)&&empty($edes))
        {
          
        }
        else if(empty($edes))
        {
            $query="UPDATE notes SET title= '$etit' where id='$eid'";
        $stmt=$this->db->conn_id->prepare($query);
        $stmt->execute();
        }
        else if(empty($etit))
        {
            $query="UPDATE notes SET description='$des' where id='$eid'";
            $stmt=$this->db->conn_id->prepare($query);
            $stmt->execute();
        }
        else if(!empty($etit)&&!empty($edes))
        {
        $query="UPDATE notes SET title= '$etit', description='$des' where id='$eid'";
        $stmt=$this->db->conn_id->prepare($query);
        $stmt->execute();
        }
    }
//     public function updatedb($etit,$edes,$eid)
//     {
    // 
    
//     $query="UPDATE notes SET title='$etit',description='$edes' where id='$eid'";
//     $stmt=$this->db->conn_id->prepare($query);
//         $stmt->execute();
// }
}