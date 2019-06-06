<?php


require APPPATH . 'libraries/REST_Controller.php';

     

class Devices extends REST_Controller {

    

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

	public function index_get($id = 0)

	{

        if(!empty($id)){

            $data = $this->mongo_db->get_where("devices", ['id' => $id])->row_array();

        }else{

            $data = $this->mongo_db->get("devices");

        }


        $this->response($data, REST_Controller::HTTP_OK);

	}

    // public function get_channels($device_id){

    // }

      

    /**

     * Get All Data from this method.

     *

     * @return Response

    */

    public function index_post()

    {

        $input = $this->input->post();

        $this->mongo_db->insert('devices',$input);

     

        $this->response(['Item created successfully.'], REST_Controller::HTTP_OK);

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