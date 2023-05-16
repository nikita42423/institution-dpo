<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teach_plan extends CI_Controller {

    //Просмотр учебного плана
	public function browse()
	{
		$this->load->view('template/header.php');
        $this->load->view('template/sidebar.php');
		$this->load->view('page/teach_plan.php');
	}

}
