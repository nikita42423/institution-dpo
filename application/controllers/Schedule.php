<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Controller {

    //Просмотр графика курсов|Кузнецов
	public function browse()
	{
		$this->load->view('template/header.php');
        $this->load->view('template/sidebar.php');
		$this->load->view('page/schedule.php');
	}

}
