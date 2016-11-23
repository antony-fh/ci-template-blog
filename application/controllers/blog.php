<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function index()
	{
		$this->template->view('index');
	}
	public function konten()
	{
		$this->template->view('konten');
	}

	public function about()
	{
		$this->template->view('about');
	}

	public function contact()
	{
		$this->template->view('contact');
	}

}

/* End of file blog.php */
/* Location: ./application/controllers/blog.php */