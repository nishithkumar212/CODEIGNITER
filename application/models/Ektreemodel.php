<?php
class Ektreemodel extends CI_Model
{
public function insert_form($request)
 {
    $insertStatus=$this->db->insert('last',array('firstname'=>$request['firstname'],'lastname'=>$request['lastname'],'email'=>$request['email'],'phoneno'=>$request['phoneno']));
    return $insertStatus;
 }
}
?>