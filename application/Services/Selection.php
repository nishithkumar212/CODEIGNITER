<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once("/var/www/html/codeigniter/application/predis-1.1/autoload.php");
include_once("/var/www/html/codeigniter/application/Services/jwt.php");
use \Firebase\JWT\JWT;
class Selection extends CI_Controller
{
    public function retrieve($email)
    {
        $reference=new JWT();
        $key="nishith";
        $client = new Predis\Client(array(
            'host' => '127.0.0.1',
            'port' => 6379,
            'password' => null
        ));
        $values=$client->get('token');
        // if($email==$values)
        // {
        // $data=array(
        //     email=>"nishith@gmail.com"
        // );
        // $j=$reference->encode($data,$key);
        //  $Decodeemail=$reference->decode($values, $key, array('HS256'));
        $myDecode=$reference->decode($values, $key, array('HS256'));
        $email = $myDecode->email;
        //$query="SELECT  * from notes where emailid='$email' AND  archive=0  And unactive=0 OR unactive= null ORDER By id DESC";
        $query="SELECT id, color,title,description,reminder,notesimage, n.emailid,unactive,archive, labelname FROM notes n LEFT JOIN editlabel e ON n.labelid = e.labelid  where n.emailid='$email' AND n.archive=0 AND n.unactive=0 ORDER BY id DESC;";    
        $stmt=$this->db->conn_id->prepare($query);
        $stmt->execute();
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data);
    }
    public function selectinglabel($email)
    {
        $query="select * from editlabel where emailid='$email'";
        $stmt=$this->db->conn_id->prepare($query);
        $stmt->execute();
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data);
    }
    public function retrievelabel($email)
    {
        $query="select * from editlabel where emailid='$email'";
        $stmt=$this->db->conn_id->prepare($query);
        $stmt->execute();
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data);
    }
    public function imageselection($email)
    {
            $query="select * from fundoo where email='$email'";
            $stmt=$this->db->conn_id->prepare($query);
            $stmt->execute();
            $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data);
    }
}
?>