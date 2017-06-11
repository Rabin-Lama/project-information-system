<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Operation extends MY_Controller {

		function __construct() {
			parent::__construct();

			$this->load->model('operation_model');
		}

		function add_operation_info() {
			if(($this->session->userdata('username'))) {
				$data['title'] = 'Add operation info';
				$data['module_title1'] = 'Create Department';
				$data['module_title2'] = 'Create job title';
				$data['content_view'] = 'operation/add_operation_view';
				$data['departments'] = $this->operation_model->select_all_departments();
				$this->template->admin_template($data);
			} else {
				$this->session->set_userdata('login_error', 'Unauthorized access !');
				redirect('/');
			}
		}

		function add_department() {
			if(($this->session->userdata('username'))) {
				$this->operation_model->insert_department($this->input->post('department'));

				$this->session->set_userdata('department_added', 'Data Addded Successfully !');
				redirect('operation/add_operation_info');
			} else {
				$this->session->set_userdata('login_error', 'Unauthorized access !');
				redirect('/');
			}
		}

		function add_job_title() {
			if(($this->session->userdata('username'))) {
				$dep_id = $this->input->post('department_id');
				$job_title = $this->input->post('job_title');
				$this->operation_model->insert_job_title($job_title, $dep_id);

				$this->session->set_userdata('job_title_added', 'Data Addded Successfully !');
				redirect('operation/add_operation_info');
			} else {
				$this->session->set_userdata('login_error', 'Unauthorized access !');
				redirect('/');
			}
		}
	}