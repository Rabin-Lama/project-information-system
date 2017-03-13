<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Employee_model extends CI_Model {

		public function insert_employee_info($data) {

			$this->db->insert('employees', $data);
		}

		public function select_all_employees() {
			$query = $this->db->get('employees');

			foreach($query->result() as $row) {
				$data[] = $row;
			}

			return $data;
		}

		public function select_employee_where($id) {
			$this->db->where('id', $id);
			$query = $this->db->get('employees');
			
			foreach($query->row() as $key=>$value) {
				$data[$key] = $value;
			}

			return $data;
		}
	}
?>