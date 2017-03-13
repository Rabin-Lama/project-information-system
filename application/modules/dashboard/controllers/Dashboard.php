<?php
	defined('BASEPATH') OR exit(asdasd'No direct script access allowed');

	class Dashboard extends MY_Controller {

		function __construct() {
			parent::__construct();
		}

		function index() {
			if(($this->session->userdata('username'))) {
				$this->load->library('excel');

				$data['title'] = 'Dashboard';
				$data['content_view'] = 'dashboard/dashboard_view';
				$this->template->admin_template($data);
			} else {
				$this->session->set_userdata('login_error', 'Unauthorized access !');
				redirect('/');
			}
		}
	}