<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Noteuser extends CI_Controller
{
    public function notes($tit,$des,$email)
    {
        $query="INSERT into notes (title,description,emailid) values('$tit','$des','$email')";
        $stmt=$this->db->conn_id->prepare($query);
        $stmt->execute();
        $no=$stmt->rowCount();
        if($no>0)
        {
            $data=array(
                "message"=>"200"
            );
             print json_encode($data);
                return "200";
        }
    }
}
?>