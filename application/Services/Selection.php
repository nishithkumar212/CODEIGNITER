<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once("/var/www/html/codeigniter/application/predis-1.1/autoload.php");
include_once("/var/www/html/codeigniter/application/Services/jwt.php");
use \Firebase\JWT\JWT;
include_once("/var/www/html/codeigniter/application/Services/Redis.php");
class Selection extends CI_Controller
{
    public function retrieve($email)
    {
        $reference=new JWT();
        $key="nishith";
        $rediskey="chinna";
        $conn=new Redis();
         $client=$conn->connection();
        // $client = new Predis\Client(array(
        //   'host' => '127.0.0.1',
        //     'port' => 6379,
        //    'password' => null
        // ));
        // $info=$client->get($rediskey);
        //SELECT n.title,n.description,ln.label_id from notes n LEFT JOIn label_notes ln on n.id=ln.note_id WHERE n.uid=1 ANd ln.label_id=1
        
        $values=$client->get('token');
        $start=0;
        $stop =-1;
        $redisvalues=$client->lrange($rediskey, $start,$stop);
         if($redisvalues==null)
         {
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
        $query="SELECT n.title,n.labelid,n.uid,n.notesimage,n.dragid,n.reminder,n.description,n.reminder,n.color,n.id,l.labelname from notes n Left JOIN label_notes ln ON ln.noteid=n.id left JOIN Labels l on ln.labelid=l.id where n.uid = '$email' And  n.archive=0 And n.unactive=0";
        $stmt=$this->db->conn_id->prepare($query);
        $stmt->execute();
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $no= "SELECT MAX(id) from notes where uid='$id' ";
       $querythree="INSERT into notes(dragid) values('$no') where id='$no'";
       $stmt=$this->db->conn_id->prepare($query);
        $stmt->execute();
        print json_encode($data);
            $key="nishith";
        $client = new Predis\Client(array(
            'host' => '127.0.0.1',
            'port' => 6379,
            'password' => null,
            ));
            foreach($data as $datas)
            {
                $client->rpush($rediskey,json_encode($datas));
            }
} 
 else
{
    // $client = new Predis\Client(array(
    //     'host' => '127.0.0.1',
    //     'port' => 6379,
    //     'password' => null,
    //     ));
            // $redisdatas=$client->get($rediskey);
            // $decodedredisdata=json_decode($redisdatas);
            // print json_encode($decodedredisdata);
            $redisdatas=$client->lrange($rediskey,$start,$stop);
            $str=array();
            foreach($redisdatas as $redisvalues)
            {
               $redisinfo=json_decode($redisvalues);
               array_push($str,$redisinfo);
            }
            print json_encode($str);
}
    }
    public function selectinglabel($email)
    {
        $query="select * from labels where uid='$email'";
        $stmt=$this->db->conn_id->prepare($query);
        $stmt->execute();
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        // print json_encode($data);
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