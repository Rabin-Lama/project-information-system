<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Project_model extends CI_Model {

		public function insert_project_info($data) {
			foreach($data['job_title'] as $row) {
				$temp = $row;
				$job_title = @$job_title.','.$temp;

				if($job_title[0]==',') {
					$job_title = substr($job_title, 1);
				}
			}

			$data['job_title'] = $job_title;

			foreach($data['department'] as $row) {
				$temp = $row;
				$department = @$department.','.$temp;
				
				if($department[0]==',') {
					$department = substr($department, 1);
				}
			}

			$data['department'] = $department;

			$this->db->insert('projects', $data);
		}

		public function select_all_projects() {
			/*$this->db->distinct();
			$this->db->group_by('project_name');*/
			$query = $this->db->get('projects');

			foreach($query->result() as $row) {
				$data[] = $row;
			}

			//echo $this->db->last_query();exit;
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

		public function select_job_title_where($id) {
			$this->db->select('*');
			$this->db->where('dep_id', $id);
			$query = $this->db->get('job_titles');
			
			foreach($query->result() as $key=>$value) {
				$data[$key] = $value;
			}

			if(!empty($data)) {
				return $data;
			}
		}

		public function insert_issue($data) {
			$this->db->insert('issues', $data);

			return true;
		}
	}
?>