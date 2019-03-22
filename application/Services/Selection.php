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
        $query="SELECT  * from notes where emailid='$email'";
        $stmt=$this->db->conn_id->prepare($query);
        $stmt->execute();
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data);
    }
}

?>