<?php
include_once("/var/www/html/codeigniter/application/models/Entity/Notesuser.php");

class NoteuserDoctrine extends CI_Controller
{
    public $em;
    public function __construct()
    {
        parent::__construct();
        // Not required if you autoload the library
        $this->load->library('doctrine');
        $this->em = $this->doctrine->em;
    }
    public function setnotedata()
    {
        $note=new Entity\Notesuser;
        $title=$_POST['title'];
        $description=$_POST['description'];
        $emailid=$_POST['emailid'];
        $reminder=$_POST['reminder'];
        $archive=$_POST['archive'];
        $color=$_POST['color'];
        $unactive=$_POST['unactive'];
       $noteimage= $_POST['notesimage'];
       $note->setTitle($title);
       $note->setDescription($description);
       $note->setEmailid($emailid);
       $note->setReminder($reminder);
       $note->setArchive($archive);
       $note->setColor($color);
       $note->setUnactive($unactive);
       $note->setNotesimage($noteimage);
    }
}