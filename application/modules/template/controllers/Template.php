<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Template extends MY_Controller {

		function __construct() {
			parent::__construct();
		}

		function admin_template($data = NULL) {
			$this->load->module('project');
			$this->load->model('project_model');

			$data['projects'] = $this->project_model->select_all_projects();
			
			$this->load->view("template/admin_template_view", $data);
		}
	}