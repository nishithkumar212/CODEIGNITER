<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once("/var/www/html/codeigniter/application/Services/jwt.php");
include_once("/var/www/html/codeigniter/application/predis-1.1/autoload.php");
use \Firebase\JWT\JWT;
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

            // $data = array(
            //     "message" => "200",

            // );
            $key="nishith";
            $data=array(
                "email"=>$email,
            );
            $ref=new JWT();
            $jwt=$ref->encode($data,$key);
            // $decodedvalue=$ref->decode($jwt,$key,array('HS256'));
            $client = new Predis\Client(array(
                'host' => '127.0.0.1',
                'port' => 6379,
                'password' => null,
                ));
            $client->set('token',$jwt);
            // $value=$client->get('token');
                $data=array(
                    "message"=>"200",
                    "token"=>"$jwt"
                );
                // $tokenvalue=$client->get('token');
                 print json_encode($data);
        } else {
            $data = array(
                "message" => "204"
            );
             print json_encode($data);
            return "204";
        }
        return $data;
        
    }
}
