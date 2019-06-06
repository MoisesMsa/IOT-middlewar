<?php  

class User_model extends CI_Model {

	public function get_all(){
		return $this->mongo_db->select('*')->get('User');
	}

	public function get($name){
		return $this->mongo_db->select(array('name', 'password'))->where(array('name' => $name))->get('User');
	}

}