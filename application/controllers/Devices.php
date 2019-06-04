<?php 


class Devices extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Device_model', 'device');
    } 

    function index(){
    	
    	$data['devices'] = $this->device->get_all();
    	$data['_view'] = 'devices';

        $this->load->view('main',$data);

    }

    function add(){
        $data['_view'] = 'devices_form';
        $this->load->view('main',$data);
    }

    // function update(){

    // }

}