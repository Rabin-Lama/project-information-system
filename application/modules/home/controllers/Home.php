<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Home extends MY_Controller {

		function __construct() {
			parent::__construct();
		}

		function index() {
			if($this->session->userdata('username')) {
				redirect('dashboard');
			} else {
				$this->load->view('login_view');
			}
		}

		function login() {
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$data['user_info'] = $this->authorization->login($email, $password);

			if(empty($data['user_info'])) {
				$this->session->set_flashdata('error', 'Username / Password does not match. Please try again !');
				redirect('/');
			}

			$this->session->set_userdata(array(
											'user_id' => $data['user_info']->id,
											'username' => $data['user_info']->full_name,
											'password' => $password,
											'email' => $data['user_info']->email,
											'joined_date' => $data['user_info']->joined_date
										)); //print_r($this->session->userdata());exit();

			redirect('dashboard');
		}

		public function logout() {
			$this->session->unset_userdata();
			$this->session->sess_destroy();
			redirect('/');
		}
	}