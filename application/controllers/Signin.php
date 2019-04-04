<?php 
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Authorization");
defined('BASEPATH') or exit('No direct script access allowed');
include "/var/www/html/codeigniter/application/Services/Register.php";
class Signin extends CI_Controller
{
    //initalizing a variable.
    private $ref = "";
    /**
     * constructor which is used to create an instance for the class Register 
     * it is used to initialize to the delared variable
     */
    public function __construct()
    {
        parent::__construct();
        $this->ref = new Register();
    }

    /**
     * function which is used to take the controller values from the post method 
     * calling the insertdb method in services class
     * @param in insertdb indicates the values from the controllers are taken to the method in service class
     */
    public function insertion()
    {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        return $this->ref->insertdb($firstname, $lastname, $email, $password);
    }
}
