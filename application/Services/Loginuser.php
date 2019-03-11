<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Loginuser extends CI_Controller
{
    public function signin($email,$password)
    {
        $data=[
            'email'=>$email,
            'password'=>$password
        ];
        $query="select * from fundoo where email='$email' AND password='$password'";
        $stmt = $this->db->conn_id->prepare($query);
         $stmt->execute();
        $no=$stmt->fetchColumn();
         $res=$stmt->fetchAll(PDO::FETCH_ASSOC);
        //  foreach($res as $temp )
        //  {
        //      if($temp['email']== $email && $temp['password']==$password)
        //      {
        //          return "200";
        //      }
        //      else if($temp['email']!= $email && $temp['password']==$password)
        //      {
        //          return ;
        //      }
        //      else if($temp['email']== $email && $temp['password']!=$password)
        //      {
        //          return 3;
        //      }
        //  }
        //  return 204;
        if($no>0) {
            $data = array(
                "message" => "200",
            );
            print json_encode($data);
            return "200";
        } else {
            $data = array(
                "message" => "204",
            );
             print json_encode($data);
            return "204";
        }
        return $data;
        
    }
}
