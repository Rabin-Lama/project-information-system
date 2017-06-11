<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Operation_model extends CI_Model {

		public function insert_department($data) {			
			for($i=0; $i<count($data); $i++) {
				$data[$i] = array('department' => ucwords($data[$i]));
			}
			$this->db->insert_batch('departments', $data);
		}

		public function insert_job_title($data, $id) {
			for($i=0; $i<count($data); $i++) {
				$data[$i] = array(
					'job_title' => ucwords($data[$i]),
					'dep_id' => $id
				);
			}
			$this->db->insert_batch('job_titles', $data);
		}

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