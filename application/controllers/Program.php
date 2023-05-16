<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program extends CI_Controller {

    //Просмотр образовательной программы
	public function browse()
	{
		$this->load->view('template/header.php');
        $this->load->view('template/sidebar.php');
		$this->load->view('page/program.php');
	}

}
