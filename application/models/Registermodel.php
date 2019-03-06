<?php
class Registermodel extends CI_Model
{
    /**
     * Function which is used to insert the data from the form in to the database
     * @param indicates data consists of all the details takem from the http
     */
    public function insert_form($request)
    {
        $first = $request['firstname'];
        $second = $request['lastname'];
        $third = $request['email'];
        $fourth = $request['password'];
        $fifth = $request['phonenumber'];
        
        //query which is used to insert the data in to the database table
        $insertStatus = $this->db->query("INSERT INTO last (firstname,lastname,email,password,phonenumber) VALUES ('" . $first . "','" . $second . "','" . $third . "','" . $fourth . "','" . $fifth . "')");
        return $insertStatus;
    }
    /**
     * Function which is used for validating the user 
     * @param indicates the data taken from the form given by the user through the http 
     */
    public function finduser($request)
    {
        $useremail = $request['email'];
        $userpassword = $request['password'];
        //query which is used to fetch the details if it is a valid user
        $data = $this->db->query("select * from last where email='$useremail' And password='$userpassword' ")->row();
        return $data;
    }
    public function finddetails($request)
    {
        $useremail = $request['email'];
        $userpassword = $request['password'];
        //query which is used to fetch the details if it is a valid user
        $data = $this->db->query("select * from last where email='$useremail' And password='$userpassword' ")->result();
        return $data;
    }
    public function registration()
    {
        
    }
}
