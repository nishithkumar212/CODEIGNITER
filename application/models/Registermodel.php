<?php
class Registermodel extends CI_Model
{
public function insert_form($request)
 {
    $first=$request[firstname];
    $second=$request[lastname];
    $third=$request[email];
    $fourth=$request[password];
    $fifth=$request[phonenumber];
    $insertStatus=$this->db->query("INSERT INTO last (firstname,lastname,email,password,phonenumber) VALUES ('" . $first . "','" . $second. "','" . $third. "','" . $fourth . "','" . $fifth. "')");
    return $insertStatus;
 }
 public function finduser($requests)
 {
            $useremail=$requests['email'];
            $userpassword=$requests['password'];
            return $this->db->query("select * from last where email='$useremail' And password='$userpassword' ")->row();
             
}
}
?>
