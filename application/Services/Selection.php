<?php
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
            'password' => null,
        ));
        $value=$client->get('token');
        $myDecode=$reference->decode($value, $key, array('HS256'));
        $query="SELECT  * from notes where emailid='$myDecode'";
        $stmt=$this->db->conn_id->prepare($query);
        $stmt->execute();
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data);
    }
}
?>