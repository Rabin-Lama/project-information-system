<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Home_model extends CI_Model {

		public function login($email, $password) {

			$this->db->select('*');
			$this->db->from('employees');
			$this->db->where('email', $email);
			$this->db->where('password', $password);
			$query = $this->db->get();

			if($query->num_rows() > 0) {
				return $query->row();
			}
		}
	}
?>