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
        $response=$stmt1->fetchall();
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
            $quer="SELECT n.title,n.labelid,n.uid,n.notesimage,n.dragid,n.reminder,n.description,n.reminder,n.color,n.id,l.labelname from notes n Left JOIN label_notes ln ON ln.noteid=n.id left JOIN Labels l on ln.labelid=l.id where n.id = LAST_INSERT_ID() And  n.archive=0 And n.unactive=0";
            $stmt5=$this->db->conn_id->prepare($quer);
            $myres=$stmt5->execute();
            $quertydata=$stmt5->fetchAll(PDO::FETCH_ASSOC);
            $client->rpush($rediskey,json_encode($quertydata)); 
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
        $result=$stmt->fetchall(PDO::FETCH_ASSOC);
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
/**
* @var string $query has query to select the next max note id of the notes
*/
$query = "SELECT MAX(dragId) dragId FROM Notes  where dragId < '$currId' and uid_id='$uid'";
} else {
/**
* @var string $query has query to select the next min note id of the notes
*/
$query = "SELECT MIN(dragId) dragId FROM Notes where dragId > '$currId' and uid_id='$uid'";
}
$statement = $this->db->conn_id->prepare($query);
$statement->execute();
$swapId = $statement->fetch(PDO::FETCH_ASSOC);
/**
* @var swapId to store the next id
*/
$swapId = $swapId['dragId'];
/**
* @var string $query has query to swap the tow rows
*/
$query = "UPDATE Notes a INNER JOIN Notes b on a.dragId <> b.dragId set a.dragId = b.dragId
WHERE a.dragId in ('$swapId','$currId') and b.dragId in ('$swapId','$currId')";
$statement = $this->db->conn_id->prepare($query);
$temp = $statement->execute();

/**
* storing in the next id
*/
$currId = $swapId;
}
}
}
?>