<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Resetpass extends CI_Controller
{
    public function changingpassword($pass,$token)
    {
        $query="UPDATE fundoo set password='$pass' where reset_key='$token'";
        $stmt=$this->db->conn_id->prepare($query);
        $stmt->execute();
        $no=$stmt->rowCount();

        $res=$stmt->fetchAll(PDO::FETCH_ASSOC);
       
            $query="UPDATE  fundoo set reset_key='' where password='$pass' ";
            $stmt=$this->db->conn_id->prepare($query);
            $stmt->execute();
            if($no>0)
        {
            $data=array(
                "message"=>"200"
            );
             print json_encode($data);
            return "200";
        }
        else if($no<0)
        {
            $data=array(
                "message"=>"204"
            );
            print json_encode($data);
            return "204";
        }
    }

    public function verificationtoken($token)
    {
        $query= " select * from fundoo where reset_key='$token'";
        $stmt= $this->db->conn_id->prepare($query);
        $stmt->execute();
        $no=$stmt->rowCount();
        if($no>0)
        {
            $data = array(
                "message" => "200",
            );
            
             print json_encode($data);
             return "200";
        }
        else
        {
            $data=array(
                "message"=>"204",
            );
            print json_encode($data);
            return "204";
        }
    }
}