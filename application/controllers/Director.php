<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Director extends CI_Controller {

	//Просмотр сведений о количестве обучающихся на курсах
	public function report_count_student()
	{
		//Сессия
		$data['session'] = $this->session->userdata('login_session');

		//Данные из БД
		$this->load->model('course_m');
		$this->load->model('edu_program_m');
		$data['edu_program'] = $this->edu_program_m->sel_edu_program(NULL,NULL,NULL,NULL);
		$data['course'] = $this->course_m->sel_course(NULL);

		$this->load->view('template/header');
		$this->load->view('template/sidebar_director', $data);
		$this->load->view('page/director/report_count_student');
		$this->load->view('template/footer');
	}

	//Просмотр сведений о рейтинге образовательных программ ДПО за период
	public function report_rating_ep()
	{
		//Сессия
		$data['session'] = $this->session->userdata('login_session');

		//Данные из БД
		$this->load->model('report_m');
		$data['rating_ep'] = $this->report_m->sel_rating_ep();

		$this->load->view('template/header');
		$this->load->view('template/sidebar_director', $data);
		$this->load->view('page/director/report_rating_ep');
		$this->load->view('template/footer');
	}

	//Просмотр сведений о работе преподавателей за период
	public function report_work_teacher()
	{
		//Сессия
		$data['session'] = $this->session->userdata('login_session');
		
		//Данные из БД
		$this->load->model('report_m');
		$data['work_teacher'] = $this->report_m->sel_work_teacher();

		$this->load->view('template/header');
		$this->load->view('template/sidebar_director', $data);
		$this->load->view('page/director/report_work_teacher');
		$this->load->view('template/footer');
	}
}
