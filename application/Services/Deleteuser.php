<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once "/var/www/html/codeigniter/application/predis-1.1/autoload.php";
include_once("/var/www/html/codeigniter/application/Services/Redis.php");
class Deleteuser extends CI_Controller
{
    public function deletes($eid)
    {
    //     $query="Delete from notes where id='$eid'";
    //     $stmt=$this->db->conn_id->prepare($query);
    //     $stmt->execute();
    //   $no= $stmt->FetchColumn();
    //   if($no>0)
    //   {
    //    $data=array(
    //        "message"=>"200",
    //    );
    //    json_encode($data);
    //   }
    //   else
    //   {
    //     $data=array(
    //         "message"=>"204",
    //     );
    //    print  json_encode($data);
    //   }
    //   return $data;
    // }
    $conn=new Redis();
    $client=$conn->connection();
    $rediskey="chinna";
    $start=0;
    $stop=-1;
    $data=$client->lrange($rediskey,$start,$stop);
    $client->del($rediskey);
    foreach($data as $datas)
    {
        $redinfo=json_decode($datas);
        if($redinfo->id==$eid)
        {
            $redinfo->unactive=1;
        }
        $var=json_encode($redinfo);
        $client->rpush($rediskey,$var);
    }
    $query="update notes set unactive=1 where id='$eid'";
    $stmt=$this->db->conn_id->prepare($query);
    $stmt->execute();
    }
    public function selection($uid)
    {
        $query="select * from notes where unactive=1 AND uid='$uid' ";
        $stmt=$this->db->conn_id->prepare($query);
        $stmt->execute();
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data);
    }
}
?>   