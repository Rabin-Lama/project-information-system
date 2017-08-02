<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Setups_model extends CI_Model {

		public function select_all_departments() {
			$query = $this->db->get('departments');

			foreach($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}

		public function select_project_where($id) {
			$this->db->where('id', $id);
			$query = $this->db->get('projects');
			
			foreach($query->row() as $key=>$value) {
				$data[$key] = $value;
			}

			return $data;
		}
	}
?>