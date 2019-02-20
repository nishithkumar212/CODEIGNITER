<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
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
	// public function add_user()
	// { 

	// 	$fname=$this->input->post('fname');
	// 	$lname=$this->input->post('lname');
	// 	$data=array('firstname'=>$fname,'lastname'=>$lname);
	// 	$this->load->model('Add_users');
	// 	if($this->Add_users->add($data));
	// 	{

	// 	}
	// }
	// public function get_user()
	// {
	// 	$this->load->model('Add_users');
	// 	$data['data']=$this->Add_users->getuser();
	// 	$this->load->view('showdata',$data);
	// }
	
	// public function delete($id)
	// {
	// 	$this->load->model('Add_users');
	// 	//$this->input->get('id');
	// 	$this->Add_users->deleteuser($id);
	// }
	// public function update($fname)
	// {
	// 	$this->add_users->updateuser($fname);
	// }
}
