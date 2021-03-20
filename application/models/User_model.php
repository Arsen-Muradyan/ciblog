<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	class User_model extends CI_Model {
		public function register($data) {
			$this->db->insert("users", $data);
			return $this->db->insert_id();	
		}
		public function login($email, $password) {
			$user = $this->db->get_where('users', array('email' => $email))->row_array();
			if ($user == NULL) {
				return false;
			}
			if ($user['password'] != md5($password)) {
				return false;
			}
			return $user;
		}
	}
