
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Register extends CI_Controller
{
    public function insertdb($fname, $lname, $email, $pass, $cpass)
    {
        $data = [
            'firstname' => $fname,
            'lastname' => $lname,
            'email' => $email,
            'password' => $pass,
            'confirmpassword' => $cpass,
        ];
        $query = " Insert into fundoo (firstname,lastname,email,password,confirmpassword) values  ('$fname','$lname','$email','$pass','$cpass')";
        $stmt = $this->db->conn_id->prepare($query);
        $res = $stmt->execute($data);
        if ($res) {
            $data = array(
                "message" => "200",
            );
            print json_encode($data);
            return "200";
        } else {
            $data = array(
                "message" => "204",
            );
            print json_encode($data);
            return "204";
        }
    }
}
