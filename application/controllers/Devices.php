<?php 


class Devices extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Device_model', 'device');
        $this->load->helper('url');
    } 

    function index(){
    	
    	$data['devices'] = $this->device->get_all();
    	$data['_view'] = 'devices';

        $this->load->view('main',$data);

    }

    function add(){

        $this->form_validation->set_rules("name", "Nome" ,"required");
        $this->form_validation->set_rules("channels[]", "Canais" ,"required");

        if($this->form_validation->run()){
           
            $params = array(
                'device name' => $this->input->post('name'),
                'channels' => $this->input->post('channels')
            );

            $this->device->add($params);
            redirect('/manager/home', 'refresh');

        }else{

            $data['msg'] = 'Invalid inputs';
            $data['_view'] = 'devices_form';
            $this->load->view('main',$data);

        }
    }

    function edit($id){
        
        $this->form_validation->set_rules("name", "Nome" ,"required");
        $this->form_validation->set_rules("channels[]", "Canais" ,"required");

        if($this->form_validation->run()){
            $params = array(
                'device name' => $this->input->post('name'),
                'channels' => $this->input->post('channels')
            );
            
            $this->device->update($id, $params);
            redirect('/manager/home', 'refresh');

        }else{
            $data['msg'] = 'Invalid input';
            $data['_view'] = 'devices_form';
            $data['device'] =  $this->device->get($id);
            var_dump($id);
            var_dump($device);
            $this->load->view('main',$data);
        }
        
    }

    function delete($id){
        $this->device->delete($id);
        redirect('/manager/home', 'refresh');
    }

}