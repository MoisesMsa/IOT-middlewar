<?php 


class Devices extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Device_model', 'device');
        $this->load->helper('url');
    } 

    function index(){
    	
    	$data['devices'] = $this->device->get_all();
    	$data['_view'] = 'devices';

        $this->load->view('main',$data);

    }

    function add(){

        $params['device name'] = $this->input->post('name');
        $params['channels'] = $this->input->post('channels');
        
        if(($params['device name'] && $params['channels']) != NULL){
            $this->device->add($params);
            redirect('/manager/home', 'refresh');
        }
        
        $data['_view'] = 'devices_form';
        $this->load->view('main',$data);
      
    }

    function edit($id){
        
        
        $params['device name'] = $this->input->post('name');
        $params['channels'] = $this->input->post('channels');
        
        $data['_view'] = 'devices_form';
        $data['device'] =  $this->device->get($id);
      
        $this->load->view('main',$data);
        $this->device->update($id, $params);
    }

    function delete($id){
        $this->device->delete($id);
        redirect('/manager/home', 'refresh');
    }

}