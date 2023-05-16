<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reg_teacher extends CI_Controller {

    //Просмотр регистрации преподавателя
	public function browse()
	{
		$this->load->view('template/header.php');
        $this->load->view('template/sidebar.php');
		$this->load->view('page/reg_teacher.php');
	}

}
