<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Post_model extends CI_Model {
		public function get_all_posts()  {
			$this->db->order_by("id", "DESC");
			$query = $this->db->get("posts");
			return $query->result_array();
		}
		public function get_post_with_id($id) {
			$query = $this->db->get_where("posts", array("id" => $id));
			return $query->row_array();
		}
		public function get_post_with_user($user_id) {
			$this->db->where('user_id', $user_id);
			$query = $this->db->get("posts");
			return $query->result_array();
		} 
		public function create($data) {
			$this->db->insert("posts", $data);
			return $this->db->insert_id();	
		}
		public function update($data) {
			$this->db->set("title", $data['title']);
			$this->db->set("content", $data['content']);
			$this->db->set("image", $data['image']);
			$this->db->where('id', $data['id']);
			$this->db->update('posts');	
		}
		public function delete($id) {
			$this->db->where('id', $id);
			$this->db->delete('posts');
		}
	}
