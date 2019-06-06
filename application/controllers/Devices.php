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
            
            $channels = $this->input->post('channels');
         
            $i = 0;
         
            foreach ($channels as $key => $value) {
                $channels[$key] = ['num' => $i, 'name' => $value, 'records' => array()];
                ++$i;
            }

            $params = array(
                'device name' => $this->input->post('name'),
                'channels' => $channels
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
            
            $channels = $this->input->post('channels[]');
         
            $i = 0;
         
            foreach ($channels as $key => $value) {
                $channels[$key] = ['num' => $i, 'name' => $value, 'records' => array()];
                ++$i;
            }
           
            $params = array(
                'device name' => $this->input->post('name'),
                'channels' => $channels
            );

            $this->device->update($id, $params);
            redirect('/manager/home', 'refresh');

        }else{

            $data['device'] =  $this->device->get($id);
        
            $channels = $data['device'][0]["channels"]; 
            
            foreach ($channels as $key => $value) 
                $channels[$key]  = json_decode(json_encode($value), True);
            
            
            $data['msg'] = 'Invalid input';
            $data['_view'] = 'devices_form';

            $data['device'][0]['channels'] = $channels;
     
            $this->load->view('main',$data);
        }
        
    }

    function delete($id){
        $this->device->delete($id);
        redirect('/manager/home', 'refresh');
    }


    function records($id){
        
        $data['records'] = $this->device->get_records($id);

        $records = $data['records'][0]["channels"]; 
            
        foreach ($records as $key => $value) 
        $records[$key]  = json_decode(json_encode($value), True);
        
        $data['records'][0]['channels'] = $records;
      
        $data['id'] = $id;
        
        $data['_view'] = 'device_records';
        
        $this->load->view('main',$data);
    }
}