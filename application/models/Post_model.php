<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Post_model extends CI_Model {
		public function get_all_posts()  {
			$query = $this->db->get("posts");
			return $query->result_array();
		}
		public function get_post_with_id($id) {
			$query = $this->db->get_where("posts", array("id" => $id));
			return $query->row_array();
		}
		public function create($data) {
			$this->db->insert("posts", $data);
			return $this->db->insert_id();	
		}

	}
