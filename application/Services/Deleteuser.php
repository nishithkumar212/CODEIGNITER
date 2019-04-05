<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Deleteuser extends CI_Controller
{
    public function deletes($eid)
    {
    //     $query="Delete from notes where id='$eid'";
    //     $stmt=$this->db->conn_id->prepare($query);
    //     $stmt->execute();
    //   $no= $stmt->FetchColumn();
    //   if($no>0)
    //   {
    //    $data=array(
    //        "message"=>"200",
    //    );
    //    json_encode($data);
    //   }
    //   else
    //   {
    //     $data=array(
    //         "message"=>"204",
    //     );
    //    print  json_encode($data);
    //   }
    //   return $data;
    // }
    $query="update notes set unactive=1 where id='$eid'";
    $stmt=$this->db->conn_id->prepare($query);
    $stmt->execute();
    }
    public function selection()
    {
        $query="select * from notes where unactive=1";
        $stmt=$this->db->conn_id->prepare($query);
        $stmt->execute();
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data);
    }
}
?>   