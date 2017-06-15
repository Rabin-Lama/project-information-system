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
				$data = array(
						'full_name' => $this->input->post('full_name'),
						'dob' => $this->input->post('dob'),
						'gender' => $this->input->post('gender'),
						'marital_status' => $this->input->post('marital_status'),
						'current_city' => $this->input->post('current_city'),
						'phone' => $this->input->post('phone'),
						'email' => $this->input->post('email'),
						'job_title' => $this->input->post('job_title'),
						'department' => $this->input->post('department'),
						'joined_date' => $this->input->post('joined_date'),
						'employment_status' => $this->input->post('employment_status'),
						'salary' => $this->input->post('salary'),
						'username' => $this->input->post('username'),
						'password' => $this->input->post('password')
					);

				print_r($data);die;
				$this->employee_model->insert_employee_info($data);
			} else {
				$this->session->set_userdata('login_error', 'Unauthorized access !');
				redirect('/');
			}
		}
	}