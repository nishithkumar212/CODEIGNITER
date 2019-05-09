<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once("/var/www/html/codeigniter/application/Services/Redis.php");
include_once "/var/www/html/codeigniter/application/predis-1.1/autoload.php";
class Updatenotes extends CI_Controller
{
  
    public function setcolor($color,$id)
    {
        $rediskey="chinna";
         $conn=new Redis();
         $start=0;
         $stop=-1;
         $client=$conn->connection();
        // $client = new Predis\Client(array(
        //     'host' => '127.0.0.1',
        //     'port' => 6379,
        //     'password' => null
        // ));
        //  $data=$client->get($rediskey);
        //          $datas=json_decode($data);
        // for($i=0;$i<sizeof($datas);$i++)
        // {
        //     if($datas[$i][$id]==$id)
        //     {
        //       $datas[$i][$color]=$color;
        //     }
        //     $datas[$i];

        //     foreach($data as $datas) {
        //           if($id= $datas->id)
        //           {
        //             $datas->color=$color;
        //             print($data); 
        //           }
        // }
        $query="UPDATE notes SET color='$color' where id='$id'";
        $stmt=$this->db->conn_id->prepare($query);
        $stmt->execute();
        $quer="SELECT n.color from notes n Left JOIN label_notes ln ON ln.noteid=n.id left JOIN Labels l on ln.labelid=l.id where n.id = $id";
        $stmt1=$this->db->conn_id->prepare($quer);
        $stmt1->execute();
        $data=$stmt1->fetchAll(PDO::FETCH_ASSOC);
        $redisvalues=$client->lrange($rediskey,$start,$stop);
        $client->del($rediskey);
        foreach($redisvalues as $redis)
        {
                $data=json_decode($redis);
                if($data->id==$id)
                {
                        $data->color=$color;
            }
            $var = json_encode($data);
            $client->rpush($rediskey,$var);
        }

    }
    public function updatedb($etit,$edes,$eid)
    {
        $rediskey="chinna";
         $conn=new Redis();
         $client=$conn->connection();
         $start=0;
         $stop=-1;
        $redisvalues=$client->lrange($rediskey,$start,$stop);
        $client->del($rediskey);
        foreach($redisvalues as $redis)
        {
                $data=json_decode($redis);
                if($data->id==$eid)
                {
                        $data->title=$etit;
                        $data->description=$edes;
            }
            $var = json_encode($data);
            $client->rpush($rediskey,$var);
        }
    $query="UPDATE notes SET title='$etit',description='$edes' where id='$eid'";
    $stmt=$this->db->conn_id->prepare($query);
        $stmt->execute();
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
}
    public function searchnotes($data)
    {
       $query="SELECT id, color,title,description,reminder,notesimage, labelname FROM notes LEFT JOIN editlabel ON notes.labelid = editlabel.labelid   where notes.title LIKE '$data %' OR notes.description LIKE '$data %'  ORDERBY id DESC";
       $stmt=$this->db->conn_id($query); 
       $stmt->execute();
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        json_encode($data);
    }
}