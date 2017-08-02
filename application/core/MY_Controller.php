<?php
	
	class MY_Controller extends MX_Controller {

		function __construct() {
			parent::__construct();
			$this->load->module('Template');
			$this->load->model('global_model');
		}


	}