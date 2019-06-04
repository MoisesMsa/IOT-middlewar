<?php  

class Device_model extends CI_Model {

	public function get_all(){
		return $this->mongo_db->select('*')->get('devices');
	}

	public function get($id){
		return $this->mongo_db->find_one('devices', ['_id', $id]);
	}

	public function add($params){
		return $this->mongo_db->insert('devices', $params);
	}

	public function update($id, $params){
		return $this->mongo_db->set($params)->update('devices', ['_id', $id]);
	}

	public function delete($id){
		$this->mongo_db->delete('devices', ['_id', $id]);
	}
}