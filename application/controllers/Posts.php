<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {
	public function __construct() 
	{
		parent::__construct();
		$this->load->helper('url');
	}
	/**
	* @Desc("Show All Posts")
	* 
	* @Route("posts/", methods={"GET"})
	*
	* @Access(PUBLIC)
	*/
	public function index() {
		$data["posts"] = $this->post->get_all_posts();
		$this->load->view("templates/header");
		$this->load->view("posts/index", $data);
		$this->load->view("templates/footer");
	}
	/**
	* @Desc("View post details. Find post with id")
	* 
	* @Route("posts/(:num)", methods={"GET"}, params={"id"})
	*
	* @Access(PUBLIC)
	*/
	public function view($id = NULL) {
		$post = $this->post->get_post_with_id($id);
		if (empty($post)) show_404();

		$data['post'] = $post;
		$this->load->view("templates/header");
		$this->load->view("posts/view", $data);
		$this->load->view("templates/footer");	
	}
	/**
	* @Desc("Create new post")
	* 
	* @Route("posts/create", methods={"GET", "POST"})
	*
	* @Access(PRIVATE)
	*/
	public function create() {
		if (!$this->session->userdata('logged_in')) redirect('/posts');
		$this->form_validation->set_rules('title', "Title", "required");
		$this->form_validation->set_rules('content', 'Content', "required");
		// Check if image file uploaded
		if (empty($_FILES['post_image']['name']))
		{
		    $this->form_validation->set_rules('post_image', 'Image', 'required');
		}
		if ($this->form_validation->run() == false) {
			$this->load->view("templates/header");
			$this->load->view("posts/create");
			$this->load->view("templates/footer");
		}
		else {
			// Filter XSS
			$title = htmlspecialchars($this->input->post('title'));
			$content = htmlspecialchars($this->input->post('content'));
			$config['upload_path'] = './assets/images/posts';
	        $config['allowed_types'] = 'gif|jpg|png';
	        $config['max_size'] = 2000;
	        $config['max_width'] = 2000;
	        $config['max_height'] = 2000;

	        $this->load->library('upload', $config);
	        $post_image = 'noimage.jpg';
	        if (!$this->upload->do_upload('post_image')) {
	            $error = array('error' => $this->upload->display_errors());

	        } else {
	            $data  = $this->upload->data();
	            $post_image = $data['file_name'];
	        }
			$this->post->create(array(
				'title' => $title,
				'content' => $content,
				'image' => $post_image,
				'user_id' => $this->session->userdata('id')
			));
			$this->session->set_flashdata("message", "Posts Successfuly created");

			redirect('posts');
		}
	}	
	/**
	* @Desc("Update post data")
	* 
	* @Route("posts/edit/(:num)", methods={"GET", "POST"}, params={"id"})
	*
	* @Access(PRIVATE)
	*/
	public function edit($id=NULL) {
		if (!$this->session->userdata('logged_in')) redirect('/posts');	

		$post = $this->post->get_post_with_id($id);
		// Check post exisits or logged user have permission to edit post
		if (empty($post) or $post['user_id'] != $this->session->userdata('id')) show_404();

 		$this->form_validation->set_rules('title', "Title", "required");
		$this->form_validation->set_rules('content', 'Content', "required");

		if ($this->form_validation->run() == false) {
			$data['post'] = $post;
			$this->load->view("templates/header");
			$this->load->view("posts/edit", $data);
			$this->load->view("templates/footer");
		}
		else {
			$title = htmlspecialchars($this->input->post('title'));
			$content = htmlspecialchars($this->input->post('content'));
			// Image Upload Params
			$config['upload_path'] = './assets/images/posts';
	        $config['allowed_types'] = 'gif|jpg|png';
	        $config['max_size'] = 2000;
	        $config['max_width'] = 2000;
	        $config['max_height'] = 2000;
	        // Image Processing 
	        $this->load->library('upload', $config);
	        $post_image = '';
	        if (!$this->upload->do_upload('post_image')) {
	            $error = array('error' => $this->upload->display_errors());

	        } else {
	            $data = $this->upload->data();
	            $post_image = $data['file_name'];
	        }
	        if ($post_image != "") {
	        	unlink("./assets/images/posts/".$post['image']);
	        }
	        // End of image processing. Update Query
			$this->post->update(array(
				'id' => $id,
				'title' => $title,
				'content' => $content,
				'image' => $post_image != '' ? $post_image : $post['image'],
			));
			$this->session->set_flashdata("message", "Posts Successfuly updated");
			redirect('posts');
		}
	}
	/**
	* @Desc("Delete post")
	* 
	* @Route("posts/delete/(:num)", methods={"POST"}, params={"id"})
	*
	* @Access(PRIVATE)
	*/
	public function delete($id = NULL) {
		if (!$this->session->userdata('logged_in')) redirect('/users/login');
		$post = $this->post->get_post_with_id($id);
		if ($this->session->userdata('id') != $post['user_id']) show_404();
		unlink("./assets/images/posts/".$post['image']);
		$this->post->delete($id);
		$this->session->set_flashdata("message", "Posts Successfuly deleted");
		redirect('/posts');
	}
}