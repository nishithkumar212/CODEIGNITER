<?php
include_once "/var/www/html/codeigniter/application/models/Entity/user.php";
class Doctrineuser extends CI_Controller
{
    // Doctrine EntityManager
    public $em;

    public function __construct()
    {
        parent::__construct();
        // Not required if you autoload the library
        $this->load->library('doctrine');
        $this->em = $this->doctrine->em;
    }

    public function setter()
    {
        $user = new Entity\User;
        $uname = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $user->setUsername($uname);
        $user->setPassword($password);
        $user->setEmail($email);
        $this->em->persist($user);
        $this->em->flush();
    }
}
