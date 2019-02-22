<?php
class RegisterModel extends CI_Model
{
public function insert_form($request)
 {
    $insertStatus=$this->db->insert('Registration',array('Firstname'=>$request['first'],'Lastname'=>$request['last'],'Email'=>$request['email'],'Password'=>$request['password'],'Phonenumber'=>$request['phoneno']));
    return $insertStatus;
 }
}
?>
