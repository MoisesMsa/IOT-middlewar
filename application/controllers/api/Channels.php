<?php


require APPPATH . 'libraries/REST_Controller.php';

     

class Channels extends REST_Controller {

    

	  /**

     * Get All Data from this method.

     *

     * @return Response

    */

    public function __construct() {

       parent::__construct();

    }

       

    /**

     * Get All Data from this method.

     *

     * @return Response

    */

	public function index_get($id = NULL)
	{
        if(!$this->get('id')){
            $data = "Invalid request";
        }else{
            $data = $this->mongo_db->select(array('channels'))->where(array('_id' => new MongoDB\BSON\ObjectId($this->get('id'))))->get('devices');       
        }


        $this->response($data, REST_Controller::HTTP_OK);

	}

    /**

     * Get All Data from this method.

     *

     * @return Response

    */

    public function index_post()

    {
      
        if(!$this->input->post('id')){
            $data = "No valid input";
        }else{
            
            // checar se existe id no banco
            
            $inputs = array();
            
            $time = $this->input->post('time');
            
            for ($i=0; $i < 3; $i++) { 
                $ch = 'ch'.$i;
                $inputs[$i] = ['value' => $this->input->post($ch), 'time' => $time];

            }
            
            $id = $this->input->post('id');
            
            $data_channels = $this->mongo_db->select(array('channels'))->where(array('_id'=>new MongoDB\BSON\ObjectId($id)))->get('devices');

            $data_channels = $data_channels[0]['channels'];

            $i = 0;
            foreach ($data_channels as $key => $value) {
                array_push($data_channels[$key]->records, $inputs[$i]); 
                ++$i;
            }

            $this->mongo_db->set(array('channels'=>$data_channels))->where(array('_id'=>new MongoDB\BSON\ObjectId($id)))->update('devices');

            $data = "Inserted with success";
        }

        $this->response($data, REST_Controller::HTTP_OK);

    } 

     

    /**

     * Get All Data from this method.

     *

     * @return Response

    */

    public function index_put($id)

    {

        $input = $this->put();

        $this->mongo_db->update('devices', $input, array('id'=>$id));

     

        $this->response(['Item updated successfully.'], REST_Controller::HTTP_OK);

    }

     

    /**

     * Get All Data from this method.

     *

     * @return Response

    */

    public function index_delete($id)

    {

        $this->mongo_db->delete('devices', array('id'=>$id));

       

        $this->response(['Item deleted successfully.'], REST_Controller::HTTP_OK);

    }

    	

}