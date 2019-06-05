<?php


require APPPATH . 'libraries/REST_Controller.php';

     

class Item extends REST_Controller {

    

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

            $data = $this->mongo_db->get_where("items", ['id' => $id])->row_array();

        }else{

            $data = $this->mongo_db->get("items");

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

        $this->mongo_db->insert('items',$input);

     

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

        $this->mongo_db->update('items', $input, array('id'=>$id));

     

        $this->response(['Item updated successfully.'], REST_Controller::HTTP_OK);

    }

     

    /**

     * Get All Data from this method.

     *

     * @return Response

    */

    public function index_delete($id)

    {

        $this->mongo_db->delete('items', array('id'=>$id));

       

        $this->response(['Item deleted successfully.'], REST_Controller::HTTP_OK);

    }

    	

}