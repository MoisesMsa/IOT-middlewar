<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {
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



    function __construct()
    {
        parent::__construct();
		$this->load->helper('url');
		$this->load->model('Device_model', 'device');
		$this->load->library('form_validation');
		$this->load->model('User_model', 'user');
    } 

	public function home()
	{
		$data['devices'] = $this->device->get_all();
		$data['_view'] = "home";
		$this->load->view('main', $data);
	}

	public function login()
	{
		$this->form_validation->set_rules("user", "Nome" ,"required");
        $this->form_validation->set_rules("password", "Senha" ,"required");
        
        $user = NULL;
    
    	$name = $this->input->post('user');
    	$pass = $this->input->post('password');

        if($this->form_validation->run()){
        	$user = $this->user->get($name);
        }

        if($user[0]['name'] == $name && $user[0]['password'] == $pass ){	
		    redirect('/manager/home', 'refresh');
		}else{
			$data['_view'] = "login";
			$data['msg'] = "Invalid User";
			// $data['login'] = true;
			$this->load->view('main', $data);
		}
		

	}

	public function logout()
	{
		redirect('/manager/login', 'refresh');
	}
}
