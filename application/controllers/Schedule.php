<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Controller {

    //Просмотр графика курсов
	public function index()
	{
		//Данные из БД
		$this->load->model('schedule_m');
		$data['course'] = $this->schedule_m->sel_course();

		$this->load->view('template/header.php');
        $this->load->view('template/sidebar.php');
		$this->load->view('page/methodist/schedule.php', $data);
		$this->load->view('template/footer.php');
	}

}
