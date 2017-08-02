<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Setups extends MY_Controller {

		function __construct() {
			parent::__construct();

			$this->load->model('setups_model');
		}

		// function add_operation_info() {
		// 	if($this->session->userdata('username')) {
		// 		$data['title'] = 'Add operation info';
		// 		$data['module_title1'] = 'Create Department';
		// 		$data['module_title2'] = 'Create job title';
		// 		$data['content_view'] = 'operation/add_operation_view';
		// 		$data['departments'] = $this->operation_model->select_all_departments();
		// 		$this->template->admin_template($data);
		// 	} else {
		// 		$this->session->set_flashdata('error', 'Unauthorized access !');
		// 		redirect('/');
		// 	}
		// }

		function add_department() {
			if($this->session->userdata('username')) {
				$data['title'] = 'Setups';
				$data['sub_title'] = 'Add department';
				$data['content_view'] = 'setups/add_department_view';

				$this->template->admin_template($data);
			} else {
				$this->session->set_flashdata('error', 'Unauthorized access !');
				redirect('/');
			}
		}

		function insert_department() {
			if($this->session->userdata('username')) {
				$departments = $this->input->post('departments');

				foreach($departments as $value) {
					$data[]['department'] = ucwords(strtolower($value));
				}

				$insert_department_data = array(
						'table' => 'departments',
						'data_to_insert' => $data
					);

				$this->global_model->insert_batch($insert_department_data) ? $this->session->set_flashdata('success', 'Department added successfully.') : $this->session->set_flashdata('error', 'Department insertion failed !');

				redirect('setups/add_department');
			} else {
				$this->session->set_flashdata('error', 'Unauthorized access !');
				redirect('/');
			}
		}

		function add_job_title() {
			if($this->session->userdata('username')) {
				$data['title'] = 'Setups';
				$data['sub_title'] = 'Add job title';
				$data['content_view'] = 'setups/add_job_title_view';

				$this->template->admin_template($data);
			} else {
				$this->session->set_flashdata('error', 'Unauthorized access !');
				redirect('/');
			}
		}

		function insert_job_title() {
			if($this->session->userdata('username')) {
				$job_titles = $this->input->post('job_titles');

				foreach($job_titles as $job_title) {
					$data[]['job_title'] = ucwords(strtolower($job_title));
				}
				$insert_job_title_params = array(
						'table' => 'job_titles',
						'data_to_insert' => $data
					);
				$this->global_model->insert_batch($insert_job_title_params); //insert job titles

				$select_job_title_params = array(
						'select' => '*',
						'table' => 'job_titles'
					);
				$all_job_titles = $this->global_model->select($select_job_title_params)->result();

				$select_module_params = array(
						'select' => '*',
						'table' => 'modules',

					);
				$all_modules = $this->global_model->select($select_module_params)->result();

				foreach($all_job_titles as $job_title) {
					foreach($all_modules as $module) {
						$insert_privileges_params = array(
								'table' => 'privileges',
								'data_to_insert' => array(
										'job_title_id' => $job_title->id,
										'module_id' => $module->id
									)
							);
						$this->global_model->insert($insert_privileges_params); //insert default privileges
					}
				}

				redirect('setups/add_job_title');
			} else {
				$this->session->set_flashdata('error', 'Unauthorized access !');
				redirect('/');
			}
		}

		function assign_privileges() {
			if($this->session->userdata('username')) {
				$data['title'] = 'Setups';
				$data['sub_title'] = 'Assign Privileges';

				$params = array(
						'table' => 'job_titles',
					);

				$this->global_model->select_with_join($params);
				$data['job_titles'] = $this->global_model->select($params)->result();
				$data['content_view'] = 'setups/assign_privileges_view';

				$this->template->admin_template($data);
				// $this->setups_model->insert_privileges();
			} else {
				$this->session->set_flashdata('error', 'Unauthorized access !');
				redirect('/');
			}
		}

		function fetch_privileges() {
			$job_title_id = $this->input->post('job_title_id');
			$params = array(
					'select' => '*',
					'table' => 'privileges',
					'where' => array('job_title_id' => $job_title_id)
				);

			$privileges_data = $this->global_model->select($params);

			$privileges_table = '';
			// foreach($privileges_data as $priilege) {
				// $privileges_table .= '<tr> <td>module</td> </tr>';
				// $privileges_table .= '<tr> <td><input type="checkbox"></td> </tr>';
				// $privileges_table .= '<tr> <td><input type="checkbox"></td> </tr>';
				// $privileges_table .= '<tr> <td><input type="checkbox"></td> </tr>';
				// $privileges_table .= '<tr> <td><input type="checkbox"></td> </tr>';
			// }
		}

		function save_assigned_privileges() {
			if($this->session->userdata('username')) {

				$this->session->set_flashdata('success', 'Privileges saved successfully.');
				redirect('setups/assign_privileges');
			} else {
				$this->session->set_flashdata('error', 'Unauthorized access !');
			}
		}
	}