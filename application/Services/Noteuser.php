<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once("/var/www/html/codeigniter/application/predis-1.1/autoload.php");
include_once("/var/www/html/codeigniter/application/Services/jwt.php");
use \Firebase\JWT\JWT;
class Noteuser extends CI_Controller
{
    public function notes($tit,$des,$myhead,$date)
    {
        if($date=="undefined")
        {
            $date="";
        }
        $key="nishith";
        $client = new Predis\Client(array(
            'host' => '127.0.0.1',
            'port' => 6379,
            'password' => null,
            ));
            //  $value=$client->get($myhead['Authorization']);
            $value=$client->get('token');
             if($value)
             {
                 $ref=new JWT();
                 $ar=0;
                 $unactive=0;
                $email=$ref->decode($value,$key,array('HS256'))->email;
        $query="INSERT into notes (title,description,emailid,reminder,archive,unactive) values('$tit','$des','$email ','$date','$ar','$unactive')";
        $stmt=$this->db->conn_id->prepare($query);
      $RES =  $stmt->execute();
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
public function createlabels($value,$email)
{
    $query="insert into editlabel (labelname,emailid) values('$value','$email')"; 
    $stmt=$this->db->conn_id->prepare($query);
    $stmt->execute();
}
}
?>