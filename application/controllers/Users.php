<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function __construct() {
parent::__construct();
		$this->load->helper('url');
	}
	public function register() {
		$this->form_validation->set_rules('username', "Username", "required");
		$this->form_validation->set_rules('email', 'Email', "required|is_unique[users.email]");
		$this->form_validation->set_rules('password', 'Password', "required");
		if ($this->form_validation->run() == false) {
			$this->load->view("templates/header");
			$this->load->view("users/register");
			$this->load->view("templates/footer");
		} else {
			$username = htmlspecialchars($this->input->post('username'));
			$email = htmlspecialchars($this->input->post('email'));
			$password = htmlspecialchars($this->input->post('password'));
			$enc_password = md5($password);

			$this->user->register(array(
				"username" => $username,
				"password" => $enc_password,
				"email" => $email,
			));
			redirect('/');

		}
	}
	public function login() {
		$this->form_validation->set_rules('email', 'Email', "required");
		$this->form_validation->set_rules('password', 'Password', "required");
		if ($this->form_validation->run() == false) {
			$this->load->view("templates/header");
			$this->load->view("users/login");
			$this->load->view("templates/footer");
		} else {
			$email = htmlspecialchars($this->input->post('email'));
			$password = htmlspecialchars($this->input->post('password'));
			$enc_password = md5($password);

			$user = $this->user->login($email, $password);
			if ($user) {
				$this->session->set_userdata(array(
					'id' => $user['id'],
					'email' => $user['email'],
					'logged_in' => TRUE
				));
				redirect(base_url());
			} else {
				$this->load->view("templates/header");
				$this->load->view("users/login");
				$this->load->view("templates/footer");
			}
		}
	}
	public function logout() {
		$this->session->unset_userdata(array("id", 'email', 'logged_in'));
		redirect('/posts');
	}
}