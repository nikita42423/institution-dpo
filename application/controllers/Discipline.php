<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discipline extends CI_Controller {

	//Просмотр одного учебного плана (дисциплины)
	public function browse_one()
	{
		//Сессия
		$data['session'] = $this->session->userdata('login_session');

		if (isset($data['session']))
		{
			if (!empty($_GET['ID_ep'])) {
				$ID_ep = $_GET['ID_ep'];
				
				//Данные из БД
				$this->load->model('edu_program_m');
				$this->load->model('discipline_m');
				
				$data['ep']		    = $this->edu_program_m->sel_edu_program_one($ID_ep);
				$data['discipline'] = $this->discipline_m->sel_discipline($ID_ep);

				
				$this->load->view('template/header.php');
				$this->load->view('template/sidebar.php', $data);
				$this->load->view('page/methodist/add_discipline.php');
				$this->load->view('page/methodist/discipline.php');
				$this->load->view('template/footer.php');

				$this->load->view('page/methodist/modal_upd_discipline.php');
			}
		}
		else
		{
			redirect('main/index');
		}
	}

	//Добавление учебного плана (дисциплины)
	public function add_discipline()
	{
		if (!empty($_POST))
		{
			$ID_ep 				  = $this->input->post('ID_ep');
			$name_discipline 	  = $this->input->post('name_discipline');
			$amount_hour 		  = $this->input->post('amount_hour');
			$amount_hour_work 	  = $this->input->post('amount_hour_work');
			$type_mid_cert 		  = $this->input->post('type_mid_cert');
			$type_practice		  = $this->input->post('type_practice');
			$amount_hour_practice = $this->input->post('amount_hour_practice');

			$this->load->model('discipline_m');
			$this->discipline_m->add_discipline($name_discipline, $ID_ep, $amount_hour, $amount_hour_work, $type_practice, $amount_hour_practice, $type_mid_cert);
			
			redirect("discipline/browse_one?ID_ep=$ID_ep");
		}
	}

	//Удаление дисциплины
	public function del_discipline()
	{
		if (!empty($_GET['ID_discipline']))
		{
			$ID_discipline = $_GET['ID_discipline'];
			$ID_ep = $_GET['ID_ep'];

			$this->load->model('discipline_m');
			$this->discipline_m->del_discipline($ID_discipline);
			
			redirect("discipline/browse_one?ID_ep=$ID_ep");
		}
	}

	//Изменение дисциплины
	public function upd_discipline()
	{
		if (!empty($_POST))
		{
			$ID_ep 				  = $this->input->post('ID_ep');
			$ID_discipline		  = $this->input->post('ID_discipline');
			$name_discipline 	  = $this->input->post('name_discipline');
			$amount_hour 		  = $this->input->post('amount_hour');
			$amount_hour_work 	  = $this->input->post('amount_hour_work');
			$type_practice 		  = $this->input->post('type_practice');
			$amount_hour_practice = $this->input->post('amount_hour_practice');
			$type_mid_cert		  = $this->input->post('type_mid_cert');

			$this->load->model('discipline_m');
			$this->discipline_m->upd_discipline($ID_discipline, $name_discipline, $ID_ep, $amount_hour, $amount_hour_work, $type_practice, $amount_hour_practice, $type_mid_cert);
			
			redirect("discipline/browse_one?ID_ep=$ID_ep");
		}
	}

}
