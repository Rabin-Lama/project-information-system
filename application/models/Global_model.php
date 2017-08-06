<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Global_model extends CI_Model {

		public function insert_batch($params) {

			return $this->db->insert_batch($params['table'], $params['data_to_insert']);
		}

		public function insert($params) {
            
			return $this->db->insert($params['table'], $params['data_to_insert']);
		}

		public function select($params) {

            if((!empty($params['select']))) {
    	        $this->db->select($params['select']);
            }

	        $this->db->from($params['table']);

	        if(!empty($params['where'])) {
	            foreach($params['where'] as $key=>$value) {
	                $this->db->where($key, $value);
	            }
	        }

            if(!empty($params['like'])) {
                foreach($params['like'] as $key=>$value) {
                    $this->db->like($key, $value, $params['wildcard'] ? $params['wildcard'] : 'both'); //$params['wildcard'] is the position of wildcard operator in the keyword
                }
            }

	        return $this->db->get();
	    }

        public function update($params) {
            
        }

	    public function select_with_join($params) {
            if(isset($params['limit'])) {
                    $this->db->limit($params['limit']);
            }

            if(isset($params['order_by'])) {
                    $this->db->order_by($params['order_by']);
            }

            if(isset($params['group_by'])) {
                    $this->db->group_by($params['group_by']);
            }

            if(isset($params['select'])) {
                    $this->db->select($params['select']);
            }

            $this->db->from($params['table']);

            if(!empty($params['where'])) {
                foreach($params['where'] as $key=>$value) {
                        $this->db->where($key, $value);
                }
            }

            if(!empty($params['join'])) {
                foreach($params['join'] as $key=>$value) {
                        $this->db->join($key, $value, isset($params['join_position']) ? $params['join_position'] : '');
                }
            }

            return $this->db->get();
    	}
	}
?>