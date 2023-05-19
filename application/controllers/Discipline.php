<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discipline extends CI_Controller {

	//Добавление учебного плана
	public function add_discipline()
	{
		//Данные из БД
		$this->load->model('edu_program_m');
        $data['edu_program'] = $this->edu_program_m->sel_edu_program(NULL, NULL, NULL, NULL);

		$this->load->view('template/header.php');
		$this->load->view('template/sidebar.php');
		$this->load->view('page/add_discipline.php', $data);

		if (!empty($_POST))
		{
			$name_ep = $this->input->post('name_ep');
			$name_profession = $this->input->post('name_profession');
			$type_cert = $this->input->post('type_cert');
			$ID_type_ep = $this->input->post('ID_type_ep');
			$ID_focus = $this->input->post('ID_focus');
			$ID_type_doc = $this->input->post('ID_type_doc');
			$ID_form = $this->input->post('ID_form');
			$time_week = $this->input->post('time_week');
			$amount_hour = $this->input->post('amount_hour');
			$count_in_group = $this->input->post('count_in_group');
			$cost_hour = $this->input->post('cost_hour');
			$price = $this->input->post('price');

			$this->load->model('edu_program_m');
			$ID_ep = $this->edu_program_m->add_edu_program($name_ep, $ID_focus, $ID_type_ep, $ID_form, $time_week, $amount_hour, $ID_type_doc, $type_cert, $name_profession, $count_in_group, $cost_hour, $price);
			
		}
	}
}
