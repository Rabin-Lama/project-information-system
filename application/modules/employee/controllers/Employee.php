<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Employee extends MY_Controller {

		function __construct() {
			parent::__construct();
		}

		function add_new_employee() {
			if(($this->session->userdata('username'))) {
				$data['title'] = 'Add new employee';
				$data['module_title'] = 'Add employee info';
				$data['content_view'] = 'employee/add_new_employee_view';
				$this->template->admin_template($data);
			} else {
				$this->session->set_userdata('login_error', 'Unauthorized access !');
				redirect('/');
			}
		}

		function add_employee_info() {
			if(($this->session->userdata('username'))) {
				$this->load->model('employee_model');
				$this->employee_model->insert_employee_info($data);
			} else {
				$this->session->set_userdata('login_error', 'Unauthorized access !');
				redirect('/');
			}
		}
	}