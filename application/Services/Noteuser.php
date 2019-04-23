<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once("/var/www/html/codeigniter/application/predis-1.1/autoload.php");
include_once("/var/www/html/codeigniter/application/Services/jwt.php");
use \Firebase\JWT\JWT;
class Noteuser extends CI_Controller
{
    public function notes($tit,$des,$myhead,$date,$labelid)
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
                $id=$ref->decode($value,$key,array('HS256'));
                $ide=$id->id;;
                
        $query="INSERT into notes (title,description,uid,reminder,archive,unactive,labelid) values('$tit','$des','$ide ','$date','$ar','$unactive','$labelid')";
        $stmt=$this->db->conn_id->prepare($query);
      $RES =  $stmt->execute();
        $no=$stmt->rowCount();
        if($no>0)
        {
            if($labelid=="undefined")
            {
                $labelid1=null;
                $query1="INSERT into label_notes(noteid,labelid) values (LAST_INSERT_ID(),'$labelid1')";
                $stmt1=$this->db->conn_id->prepare($query1);
                        $res1=$stmt1->execute();
            }
            else{
            $query1="INSERT into label_notes(noteid,labelid) values (LAST_INSERT_ID(),'$labelid')";
            $stmt1=$this->db->conn_id->prepare($query1);
                        $res1=$stmt1->execute();
            }
            $data=array(
                "message"=>"200"
            );
             print json_encode($data);
                return "200";
        }
    }
}
public function createlabels($value,$uid)
{
    $query="insert into labels (labelname,uid) values('$value','$uid')"; 
    $stmt=$this->db->conn_id->prepare($query);
    $stmt->execute();
}
}
?>