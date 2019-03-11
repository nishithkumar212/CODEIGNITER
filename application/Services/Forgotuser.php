<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Authorization");
include("/var/www/html/codeigniter/application/Rabbitmq/sender.php");
include("/var/www/html/codeigniter/application/static/Constant.php");
class Forgotuser extends CI_Controller
{
    public function forget($email)
    {
        $value=new Constant;
        if(Forgotuser::checkemail($email))
        {
            $ref=new SendMail();
            $token=md5($email);
            $query = "UPDATE fundoo set reset_key='$token' where email='$email'";
            $stmt=$this->db->conn_id->prepare($query);
            $stmt->execute();
            $sub="password recover mail";
            $body= "hello click this link to recover your password click here ".$value->resetLink.$token;
            $ref->sendEmail($email,$sub,$body);
        }
        // $data=[
        //     'email'=>$email,
        // ];
        // $query="select * from fundoo where email=$email";
        // $stmt=$this->db->conn_id->prepare($query);
        // $stmt->execute();
        // $no=$stmt->fetchColumn();
        // if($no>0)
        // {
        //     $data=array(
        //     $message=>"200",
        //     );
        //     json_encode($data);
        //     return 200;
        // }
        // else
        //  {
        //     $data=array(
        //         $message=>"204",
        //     );
        //     json_encode($data);
        //     return 204;
        // }
    }
    public function checkemail($email)
    {
        $query="select * from fundoo where email='$email'";
        $stmt=$this->db->conn_id->prepare($query);
        $stmt->execute();
        $no=$stmt->rowCount();
        $res=$stmt->fetchAll(PDO::FETCH_ASSOC);
        // foreach($res as $arr)
        // {
        //     if($arr['email']==$email)
        //     {
        //         return true;
        //     }
        //     return false;
        // }

        if($no>0){
            return true;
        }else{
            return false;
        }



    }
}