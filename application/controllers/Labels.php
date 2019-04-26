<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Authorization");
defined('BASEPATH') or exit('No direct script access allowed');
class Labels extends CI_Controller
{
    public function createlabel()
    {
        $label1 = $_POST['label'];
        $uid = $_POST['uid'];
        $this->load->library("Doctrine");
        $em = $this->doctrine->em;
        $label = new Entity\Labels();
        $label->setLabelname($label1);
        $label->setUid($uid);
        $em->persist($label);
        $em->flush();
    }

    public function selectlabel()
    {
        $uid=$_POST['tokenemail'];
        $this->load->library('Doctrine');
        $em = $this->doctrine->em;
        // $query = $em->createQuery("SELECT u.id,u.userId,u.labelname FROM \Entity\DocLabel u WHERE u.userId = '$userId'");
        // $users = $query->getResult();
        $query = $em->createQuery("SELECT u.id,u.labelname  FROM \Entity\Labels u WHERE u.uid ='$uid' ");
        $users = $query->getResult();
        print json_encode($users);
    }
    public function renamelabel()
    {
        $labelname=$_POST['labelname'];
        $labelid=$_POST['labelid'];
        $this->load->library('Doctrine');
        $em=$this->doctrine->em;
        $query=$em->createQuery("UPDATE \Entity\Labels u SET u.labelname='$labelname'  where u.id=' $labelid' ");
        $query->getResult();
    }
}
