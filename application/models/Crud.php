<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Crud extends CI_Model {
	
		public function __construct()
		{
			parent::__construct();
			//Load Dependencies
	
		}
	
		// List all your items
		public function get_all($table=NULL){
			return $this->db->get($table)->result();
		}

		public function get($table=NULL,$id=NULL){
			return $this->db->get_where($table,$id)->result();
		}

				// Add a new item
		public function insert($table=NULL,$data=NULL)
		{
			$this->db->insert($table,$data);
			if(!empty($this->db->insert_id())) return true;
			else return false;	

		}
	
		//Update one item
		public function update($table= NULL,$data= NULL, $id = NULL )
		{
			if(!empty($this->db->update($table,$data,$id))){
				return true;
			}
			else return false;
		}
	
		//Delete one item
		public function delete( $table=NULL,$id = NULL )
		{
			return $this->db->delete($table,$id);
		}
	}
	
	/* End of file Form.php */
	/* Location: ./application/models/Form.php */
	
?>