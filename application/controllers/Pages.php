<?php  
defined('BASEPATH') OR exit('No direct script access allowed');
class Pages extends CI_Controller {
	public function __construct() 
	{
		parent::__construct();
		$this->load->helper('url');
	}
	public function dashboard() {
		if (!$this->session->userdata('logged_in')) redirect('users/login');
		$data["posts"] = $this->post->get_post_with_user($this->session->userdata('id'));

		$this->load->view("templates/header", array("page" => 'dashboard'));
		$this->load->view("pages/dashboard", $data);
		$this->load->view("templates/footer");
	}
}