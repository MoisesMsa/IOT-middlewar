<?php  

class Device_model extends CI_Model {

	public function get_all(){
		return $this->mongo_db->select(['name'])->get('devices');
	}


	public function add($params){
		$this->mongodb->insert($params);
		// return $msg;
	}

	public function update($id, $params){
		$this->mongodb->update($id, $params);
		// return $msg;
	}

	public function delete($id){
		$this->mongodb->delete($id);
		// return $msg
	}
}