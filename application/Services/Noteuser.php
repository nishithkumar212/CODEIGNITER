<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once("/var/www/html/codeigniter/application/predis-1.1/autoload.php");
include_once("/var/www/html/codeigniter/application/Services/jwt.php");
include_once("/var/www/html/codeigniter/application/Services/Redis.php");
include_once("/var/www/html/codeigniter/application/Services/Selection.php");
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
            $rediskey="chinna";
            //  $value=$client->get($myhead['Authorization']);
            $value=$client->get('token');
             if($value)
             {
                 $data=array(
                     'title'=>$tit,
                     'description'=>$des,
                     'date'=>$date,
                     'labelid'=>$labelid
                 );
        //   $client->rpush($rediskey,json_encode($data));            
         
          $ref=new JWT();                
                  $ar=0;
                 $unactive=0;
                $id=$ref->decode($value,$key,array('HS256'));
                $ide=$id->id;;
        $query="INSERT into notes (title,description,uid,reminder,archive,unactive,labelid) values('$tit','$des','$ide ','$date','$ar','$unactive','$labelid')";
        $stmt=$this->db->conn_id->prepare($query);
      $RES =  $stmt->execute();

        $no=$stmt->rowCount();

        $query2= "SELECT MAX(id) id from notes where uid='$ide' ";
        $stmt1=$this->db->conn_id->prepare($query2);
        $stmt1->execute();
        $response=$stmt1->fetchAll();
        $myid=$response[0]['id'];
        $querythree="UPDATE  notes set dragid= '$myid' where id=$myid";
        $stmt2=$this->db->conn_id->prepare($querythree);
        $response= $stmt2->execute();
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
            // $qrs="select MAX(id) id from notes where uid=20";
            // $stmts=$this->db->conn_id->prepare($qrs);
            // $myres=$stmts->execute();
            // $quertydata=$stmts->fetchAll();
            $quer="SELECT n.title,n.labelid,n.uid,n.notesimage,n.dragid,n.reminder,n.description,n.reminder,n.color,n.id,l.labelname from notes n Left JOIN label_notes ln ON ln.noteid=n.id left JOIN Labels l on ln.labelid=l.id where n.id='$myid'";
            $stmts=$this->db->conn_id->prepare($quer);
            $myres=$stmts->execute();
            $quertydata=$stmts->fetchAll();
            $datas=$quertydata;
            $client->rpush($rediskey,json_encode($quertydata[0])); 
            $start=0;
            $stop=-1;
            $mydataaas=$client->lrange($rediskey,$start,$stop);           
             print json_encode($data);
                return "200";
        }
    }
}
public function createlabels($value,$uid)
{
    $query="Insert into labels (labelname,uid) values('$value','$uid')"; 
    $stmt=$this->db->conn_id->prepare($query);
    $stmt->execute();
}

public function createlabelnotes($title,$description,$labelname,$labelid,$uid)
{
        $query= "INSERT into  notes (title,description,uid,labelid)values('$title','$description','$uid','$labelid')";
        $stmt=$this->db->conn_id->prepare($query);
        $res=$stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $query="INSERT into label_notes(noteid,labelid) values(LAST_INSERT_ID(),'$labelid')";
         $stmt=$this->db->conn_id->prepare($query);
        $res1=$stmt->execute();
        $resu=$stmt->fetchall(PDO::FETCH_ASSOC);
}
public function removeredis()
{
        $client->flushall();
}
public function setposition($difference,$currId,$direction,$uid)
{
for ($i = 0; $i < $difference; $i++) {
if ($direction == "negative") {

$query = "SELECT MAX(dragid) dragid FROM notes  where dragid < '$currId' and uid='$uid'";
} else {

$query = "SELECT MIN(dragid) dragid FROM notes where dragid > '$currId' and uid='$uid'";
}
$statement = $this->db->conn_id->prepare($query);
$statement->execute();
$swapId = $statement->fetch(PDO::FETCH_ASSOC);

$swapId = $swapId['dragid'];

$query = "UPDATE notes a INNER JOIN notes b on a.dragid <> b.dragid set a.dragid = b.dragid
WHERE a.dragid in ('$swapId','$currId') and b.dragid in ('$swapId','$currId')";
$statement = $this->db->conn_id->prepare($query);
$temp = $statement->execute();
$currId = $swapId;
print json_encode($data);
}
}
}
?>