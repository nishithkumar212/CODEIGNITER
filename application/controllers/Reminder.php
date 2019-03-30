<?php
include_once("/var/www/html/codeigniter/application/Services/Reminderuser.php");
class Reminder
{
    public function __construct()
    {
        $ref=new Reminderuser();
    }
    public function setreminder()
    {
        $ref->fetchreminder();
    }
    public function insertreminder()
    {
       $remin= $_POST['reminderdate'];
        $ref->setreminder($remin);
    }
}