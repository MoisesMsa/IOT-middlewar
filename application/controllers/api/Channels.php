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