<?php
include_once("/var/www/html/codeigniter/application/models/Entity/user.php");
class Doctrineuser extends  CI_Controller
{
    // Doctrine EntityManager
    public $em;

    function __construct()
    {
        parent::__construct();

        // Not required if you autoload the library
        $this->load->library('doctrine');
        $this->em = $this->doctrine->em;
    }

    public function setter()
    {
        $user = new Entity\User;
$user->setUsername('nishith');
$user->setPassword('123456');
$user->setEmail('acha.nishith212@gmail.com');

$this->em->persist($user);
$this->em->flush();
    }
}
