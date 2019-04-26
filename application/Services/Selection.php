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
        //SELECT n.title,n.description,ln.label_id from notes n LEFT JOIn label_notes ln on n.id=ln.note_id WHERE n.uid=1 ANd ln.label_id=1

        $values=$client->get('token');
        // if($email==$values)
        // {
        // $data=array(
        //     email=>"nishith@gmail.com"
        // );
        // $j=$reference->encode($data,$key);
        //  $Decodeemail=$reference->decode($values, $key, array('HS256'));
        $myDecode=$reference->decode($values, $key, array('HS256'));
        $id = $myDecode->id;
        //$query="SELECT  * from notes where emailid='$email' AND  archive=0  And unactive=0 OR unactive= null ORDER By id DESC";
        // $query="SELECT id, n.labelid,color,title,description,reminder,notesimage, n.emailid,unactive,archive, labelname FROM notes n LEFT JOIN editlabel e ON n.labelid = e.labelid  where n.emailid='$email' AND n.archive=0 AND n.unactive=0 ORDER BY id DESC;";    
        // $query="select * from notes where uid= '$id'";
$query="SELECT n.title,n.labelid,n.notesimage,n.reminder,n.description,n.reminder,n.color,n.id,l.labelname from notes n Left JOIN label_notes ln ON ln.noteid=n.id left JOIN Labels l on ln.labelid=l.id where n.uid = '$email' AND n.archive='0' AND n.unactive='0'";
        
        $stmt=$this->db->conn_id->prepare($query);
        $stmt->execute();
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data);
            $key="nishith";
        $client = new Predis\Client(array(
            'host' => '127.0.0.1',
            'port' => 6379,
            'password' => null,
            ));
            $client->set($key,json_encode($data));
            $redisdata=$client->get($key);
            $data1=json_decode($redisdata);
} 
    public function selectinglabel($email)
    {
        $query="select * from labels where uid='$email'";
        $stmt=$this->db->conn_id->prepare($query);
        $stmt->execute();
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data);
    }
    public function retrievelabel($email)
    {
        $query="select * from labels where uid='$email'";
        $stmt=$this->db->conn_id->prepare($query);
        $stmt->execute();
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data);
    }
    public function imageselection($uid)
    {
            $query="select * from fundoo where id='$uid'";
            $stmt=$this->db->conn_id->prepare($query);
            $stmt->execute();
            $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
            print json_encode($data);
    }
}
?>