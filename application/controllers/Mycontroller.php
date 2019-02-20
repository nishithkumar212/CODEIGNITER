<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH . '/libraries/REST_Controller.php');
require(APPPATH . '/libraries/Format.php');
use Restserver\Libraries\REST_Controller;
class Mycontroller extends REST_Controller
{
    /**
     * Involking the Constructor
     */
    function _construct()
    {
        parent::_construct();
    }  

    /**
     * function which is used to get all the details from the employee
     */
    public function findall_get()
    {
        echo json_encode($this->EmployeeModel->findalle());
    }

    /**
     * Function which is used to get specific Details from the table
     */
    public function find_get($id)
    {
        echo json_encode($this->EmployeeModel->find($id));
    }

    /**
     * Function which is used for creating or inserting a new row in the database
     */
    public function create_post()
    {
        $values=array(
             $this->post('Ename'),
             $this->post('Eid'),
             $this->post('Esal'),
             $this->post('Edepart')
        );
        $this->EmployeeModel->insert($values);
    }

    /**
     * Function which is used to update the specific row in the table
     */
    public function update_put(){
        $valu= array( 
        $this->put('Ename'),
        $this->put('Esal'),
        $this->put('Edepart'),
        );
        print_r($valu);
        $this->EmployeeModel->updates($this->put('Eid'),$valu);
        }


    /**
     * Function which it is used to delete the specific row from the table.
     */
    public function delete_delete($id)
    {
        $this->EmployeeModel->deletes($id);
    }
}