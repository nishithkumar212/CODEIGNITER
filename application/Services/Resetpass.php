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
        if($no>0)
        {
            return "200";
        }
        else
        {
            return "204";
        }


    }
}