<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Methodist extends CI_Controller {

	public function index()
	{
		$this->load->view('template/header.php');
		$this->load->view('template/navbar.php');
		$this->load->view('page/methodist.php');
		$this->load->view('template/footer.php');
	}
}
