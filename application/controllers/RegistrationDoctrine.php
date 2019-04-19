<?php
  include_once("/var/www/html/codeigniter/application/models/Entity/Registrationuser.php");

  class RegistrationDoctrine  extends CI_Controller
  {
    public $em;
    public function __construct()
    {
        parent::__construct();
        // Not required if you autoload the library
        $this->load->library('doctrine');
        $this->em = $this->doctrine->em;
    }
    public  function setregistrationdata()
    {
        $user = new Entity\Registrationuser;
        $firstname = $_POST['firstname'];
        $lastname= $_POST['lastname'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $confirmpassword=$_POST['confirmpassword'];
        $user->setfirstname($firstname);
        $user->setlastname($lastname);
        $user->setemail($email);
        $user->setpassword($password);
       $user->setConfirmpassword($confirmpassword);
        $this->em->persist($user);
        $this->em->flush();
    }
  }