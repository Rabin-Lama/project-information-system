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
					$select_job_title_params = array(
							'select' => '*',
							'table' => 'job_titles',
							'where' => array(
									'job_title' => $job_title
								)
						);
					$existing_job_title = $this->global_model->select($select_job_title_params)->result();
					if(empty($existing_job_title)) {
						$data[]['job_title'] = ucwords(strtolower($job_title));
					}
				}
				if(!empty($data)) {
					$insert_job_title_params = array(
							'table' => 'job_titles',
							'data_to_insert' => $data
						);
					$this->global_model->insert_batch($insert_job_title_params); //insert job titles
				}

				$select_all_job_title_params = array(
						'select' => '*',
						'table' => 'job_titles'
					);
				$all_job_titles = $this->global_model->select($select_all_job_title_params)->result();

				$select_module_params = array(
						'select' => '*',
						'table' => 'modules',

					);
				$all_modules = $this->global_model->select($select_module_params)->result();

				foreach($all_job_titles as $job_title) {
					foreach($all_modules as $module) {
						$select_privilege_params = array(
								'select' => '*',
								'table' => 'privileges',
								'where' => array(
										'job_title_id' => $job_title->id,
										'module_id' => $module->id
									)
							);
						$existing_privilege = $this->global_model->select($select_privilege_params)->result();

						if(empty($existing_privilege)) {
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
				$data['content_view'] = 'setups/assign_privileges_view';

				$params = array(
						'select' => '*',
						'table' => 'job_titles'
					);
				$data['job_titles'] = $this->global_model->select($params)->result();

				$this->template->admin_template($data);
			} else {
				$this->session->set_flashdata('error', 'Unauthorized access !');
				redirect('/');
			}
		}

		function fetch_privileges() {
			$job_title_id = $this->input->post('job_title_id');

			$params = array(
					'select' => 'p.*, m.*',
					'table' => 'privileges p',
					'join' => array(
							// 'job_titles j' => 'p.job_title_id = j.id',
							'modules m' => 'p.module_id = m.id'
						),
					'where' => array(
							'p.job_title_id' => $job_title_id
						)
				);
			$privileges = $this->global_model->select_with_join($params)->result();

			$privileges_table = '';
			foreach($privileges as $value) {
				$privileges_table .= '<tr>';
				$privileges_table .= 	'<td><input type="hidden" name="job_title_id" value="'.$job_title_id.'">'.$value->module.'</td>';
				$privileges_table .= 	'<td><input type="checkbox" name="a'.$value->module_id.'[add]" value="1"'.($value->p_add == 1 ? 'checked' : '').' class="icheck"></td>';
				$privileges_table .= 	'<td><input type="checkbox" name="a'.$value->module_id.'[view]" value="1"'.($value->p_view == 1 ? 'checked' : '').' class="icheck"></td>';
				$privileges_table .= 	'<td><input type="checkbox" name="a'.$value->module_id.'[edit]" value="1"'.($value->p_edit == 1 ? 'checked' : '').' class="icheck"></td>';
				$privileges_table .= 	'<td><input type="checkbox" name="a'.$value->module_id.'[delete]" value="1"'.($value->p_delete == 1 ? 'checked' : '').' class="icheck"></td>';
				$privileges_table .= '</tr>';
			}

			echo json_encode($privileges_table);
			die;
		}

		function save_assigned_privileges() {
			if($this->session->userdata('username')) {
				$form_data = $this->input->post();
				$job_title_id = reset($form_data);
				$privileges = array_slice($form_data, 1);

				foreach($privileges as $k => $v) {
					$privileges_data[str_replace('a', '', $k)] = $v;
				}

				// only_printr($privileges_data);die;
				$this->global_model->
				$this->session->set_flashdata('success', 'Privileges saved successfully.');
				redirect('setups/assign_privileges');
			} else {
				$this->session->set_flashdata('error', 'Unauthorized access !');
			}
		}
	}