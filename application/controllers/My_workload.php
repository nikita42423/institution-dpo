<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_workload extends CI_Controller {

    //Просмотр своей нагрузки преподавателя
	public function browse()
	{
		//Сессия
		$data['session'] = $this->session->userdata('login_session');

        $ID_teacher = 5;
        $data['teacher'] = 'Кузнецов Н. В.';

		//Данные из БД
		$this->load->model('workload_m');
		$data['workload'] = $this->workload_m->sel_workload($ID_teacher);

		$this->load->view('template/header');
		$this->load->view('page/teacher/my_workload', $data);
		$this->load->view('template/footer');
	}
}