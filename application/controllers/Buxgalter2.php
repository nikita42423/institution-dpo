<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buxgalter2 extends CI_Controller {


    public function index()
	{
		$this->load->view('template/header.php');
		$this->load->view('page/buxgalter2.php');
		$this->load->view('template/footer.php');
	}

	
}
