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
     * Function which is used to validate the user -given inputs in the form and redirecting the Model
     */
    public function add()
    {
        $request = json_decode(file_get_contents('php://input'), true);
        $message = '';
        $validation_error = '';

        //validating the first name whether it is empty or not
        if (empty($request['firstname'])) {
            $error[] = 'firstname is Required';
        } else {
            $data[':firstname'] = $request['firstname'];
        }

        //validating the lastname in the form given by the user
        if (empty($request['lastname'])) {
            $error[] = ' lastname is Required';
        } else {
            $data[':lastname'] = $request['lastname'];
        }

        //validating the email in the form given by the user
        if (empty($request['email'])) {
            $error[] = 'Email is Required';
        } else {
            $data[':email'] = $request['email'];
        }

        //validating the password  in the form given by the user
        if (empty($request['password'])) {
            $error[] = 'Password is Required';
        } else {
            $data[':password'] = $request['password'];
        }

        //validating the phonenumber  in the form given by the user
        if (empty($request['phonenumber'])) {
            $error[] = 'phonenumber is Required';
        } else {
            $data[':phonenumber'] = $defined('BASEPATH') OR exit('No direct script access allowed');request['phonenumber'];
        }

        if (empty($error)) {
            //calling the method present in the register model
            $statement = $this->Registermodel->insert_form($request);

            //if the query returns true
            if ($statement) {
                //storing the success message in the message
                $message = 'Your Registration success' . ' ' . $request['firstname'];
            }
        } else {
            //printing the error-details
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
        //retrieving the form details through the input
        $request = json_decode(file_get_contents('php://input'), true);
        $message = '';
        $validation_error = '';

        //validating the user-given email
        if (empty($request['email'])) {
            $error[] = 'Email is Required';
        } else {
            $data[':email'] = $request['email'];
        }

        //validating the user given password
        if (empty($request['password'])) {
            $error[] = 'Password is Required';
        } else {
            $data[':password'] = $request['password'];
        }

         //validating the error variable containing any messages and calling the method 
        if (empty($error)) {
            $data = $this->Registermodel->finduser($request);
            if ($data) {
                $message = ' Your login success';
            }
        } else {
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
        //retrieving the form details through the input
        $request = json_decode(file_get_contents('php://input'), true);

        //declaring the variables
        $message = '';
        $info = '';

        //calling the method finddetails present in the model
        $data = $this->Registermodel->finddetails($request);
        if ($data) {
            //accessing the each and every value
            foreach ($data as $row) {
                $one = $row->firstname;
                $two = $row->lastname;
                $three = $row->email;
                $four = $row->password;
                $five = $row->phonenumber;
                $info = "your details are " . $one . ',' . $two . ',' . $three . ',' . $four . ',' . $five;
            }
        }
        $output = array(
            'message' => $info,
        );
        echo json_encode($output);
    }
}
