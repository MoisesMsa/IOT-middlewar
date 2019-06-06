<?php  

class Device_model extends CI_Model {

	public function get_all(){
		return $this->mongo_db->select('*')->get('devices');
	}

	public function get($id){
		return $this->mongo_db->select('*')->where(array('_id' => new MongoDB\BSON\ObjectId($id)))->get('devices');
	}

	public function add($params){
		return $this->mongo_db->insert('devices', $params);
	}

	public function update($id, $params){
		return $this->mongo_db->set($params)->where(array('_id' => new MongoDB\BSON\ObjectId($id)))->update('devices');
	}

	public function delete($id){
		$this->mongo_db->delete('devices', ['_id', new MongoDB\BSON\ObjectId($id)]);
	}
}