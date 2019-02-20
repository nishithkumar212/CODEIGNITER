<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Creation of a EmployeeModel class which is used to Extend from the model class
 */
class EmployeeModel extends CI_Model
{

    /**
     * Function which is used to get the details of all members in database
     */
    public function findalle()
    {
    //writing a query which is used to display all the details regarding to the table 
        $data = $this->db->query('SELECT *  from employee')->result();
        foreach ($data as $row) {
            echo $row->Ename . "\n";
            echo $row->Eid . "\n";
            echo $row->Esal . "\n";
            echo $row->Edepart . "\n";
            echo "\n";
        }
    }

    /**
     * Function which is used to insert the data in to the database
     */
    public function insert($data)
    {
        $name = $data[0];
        $id = $data[1];
        $sal = $data[2];
        $depart = $data[3];
    //Query which is used for insertion
        $this->db->query("INSERT INTO employee (Ename,Eid,Esal,Edepart) VALUES ('" . $name . "','" . $id . "','" . $sal . "','" . $depart . "')");
    }

    /**
     * Function which is used to delete the information from the database
     * @param indicates that the specific id is passed to delete the row from the database
     */
    public function deletes($id)
    {
    //query which is used for deleting the specific row from the database
        $this->db->query("DELETE From employee where EId='" . $id . " '");
    }

    /**
     * function which is used to update the desired row in the table 
     * @id indicates specific row is to updated 
     */
    public function updates($id, $data)
    {
        print_r($data);
        $name = $data[0];
        $sal = $data[1];
        $depart = $data[2];
    //query which is used for updating the table from the database.
        $this->db->query("UPDATE employee SET Ename='" . $name . "', Esal='" . $sal . "',Edepart='" . $depart . "' where Eid='" . $id . "'");
    }

    /**
     * Function which is used to get the specific member details
     * @param indicates the specific id which is passed to dispaly
     */
    public function find($id)
    {
        $this->db->where('Eid', $id);
        return $this->db->get('employee')->row();
    }
}
