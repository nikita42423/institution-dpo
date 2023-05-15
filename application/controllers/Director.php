<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Director extends CI_Controller {

	public function index()
	{
		$this->load->view('template/header.php');
		$this->load->view('page/director.php');
		$this->load->view('template/footer.php');
	}
}
