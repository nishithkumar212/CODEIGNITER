
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Register extends CI_Controller
{
    /**
     * function used to used to interact with the database
     * @param indicates values from the controllers are passed to the table in the database
     */
    public function insertdb($fname, $lname, $email, $pass)
    {
        $data = [
            'firstname' => $fname,
            'lastname' => $lname,
            'email' => $email,
            'password' => $pass,
        ];
        //query which is used to insert the values in to the database
        $query = " Insert into fundoo (firstname,lastname,email,password) values  ('$fname','$lname','$email','$pass')";
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
