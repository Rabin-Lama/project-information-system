<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Home_model extends CI_Model {

		public function login($username, $password) {

			$query = "SELECT * FROM users WHERE username = '" . $username . "' AND password = '" . $password . "'";
			$result = $this->db->query($query);
			//echo $this->db->last_query();exit();

			if($result->num_rows() > 0) {
				foreach($result->row() as $key=>$value) {
					$data[$key] = $value;
				}

				return $data;
				//print_r($data);exit();
			}
		}
	}
?>