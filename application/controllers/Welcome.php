<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Welcome extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *         http://example.com/index.php/welcome
     *    - or -
     *         http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->load->view('welcome_message');
	}
	/**
	 * 
	 */
    public function add()
    {
        $request = json_decode(file_get_contents('php://input'), true);
        $message = '';
        $validation_error = '';
		if (empty($request['firstname'])) 
		{
            $error[] = 'firstname is Required';
		} else 
		{
            $data[':firstname'] = $request['firstname'];
        }
		if (empty($request['lastname'])) 
		{
            $error[] = ' lastname is Required';
		} else 
		{
            $data[':lastname'] = $request['lastname'];
        }
		if (empty($request['email'])) 
		{
            $error[] = 'Email is Required';
		} else 
		{
            $data[':email'] = $request['email'];
        }
		if (empty($request['password'])) 
		{
            $error[] = 'Password is Required';
		} else 
		{
            $data[':password'] = $request['password'];
        }
		if (empty($request['phonenumber'])) 
		{
            $error[] = 'phonenumber is Required';
		} else 
		{
            $data[':phonenumber'] = $request['phonenumber'];
        }
		if (empty($error)) 
		{
            $statement = $this->Registermodel->insert_form($request);
			if ($statement) 
			{
                $message = 'Your Registration success'.' '. $request['firstname'];
            }
		} else 
		{
            $validation_error = implode(", ", $error);
        }
        $output = array(
            'error' => $validation_error,
            'message' => $message,
        );
        echo json_encode($output);
    }

    public function login()
    {
        $request = json_decode(file_get_contents('php://input'), true);
        $message = '';
        $validation_error = '';
		if (empty($request['email'])) 
		{
            $error[] = 'Email is Required';
		} else 
		{
            $data[':email'] = $request['email'];
        }
		if (empty($request['password'])) 
		{
            $error[] = 'Password is Required';
		} else 
		{
            $data[':password'] = $request['password'];
        }
		if (empty($error)) 
		{
            $data = $this->Registermodel->finduser($request);
			if ($data) 
			{
                $message = ' Your login success';
            }
		} else 
		{
            $validation_error = implode(", ", $error);
        }
            $output = array(
            'error' => $validation_error,
            'message' => $message,
        );
        echo json_encode($output);
    }
    
    public function finddetails()
    {
        $request=json_decode(file_get_contents('php://input'), true);
        $message = '';
        $info='';
        $data=$this->Registermodel->finddetails($request);
        if($data)
        {
            foreach($data as $row)
            {
                $one=$row->firstname;
                $two=$row->lastname;
                $three=$row->email;
                $four=$row->password;
                $five=$row->phonenumber;
                $info= "your details are ".$one.','.$two.','.$three.','.$four.','.$five;
            }
        }
        $output = array(
            'message' => $info
        );
        echo json_encode($output);
    }
}
