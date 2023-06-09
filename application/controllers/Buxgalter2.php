<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buxgalter2 extends CI_Controller {


    public function index()
	{
		 //Сессия
		 $data['session'] = $this->session->userdata('login_session');
         $session=$data['session'];
         $ID_user = $session['ID_user'];

		  //загрузка модели
	     $this->load->model('bufgalter_m');
		 $data['focus'] = $this->bufgalter_m->sel_focus();

		$data['edu_program'] = $this->bufgalter_m->sel_edu_program();
		$data['sum_table'] = $this->bufgalter_m->sel_sum(NULL, NULL, NULL, NULL, NULL);



		$this->load->view('template/header.php');
		$this->load->view('page/buxgalter2.php', $data);

	}

	public function show_epo()
	{
		$ID_focus = $_POST['ID_focus'];

		$this->load->model('bufgalter_m');
		$showepo = $this->bufgalter_m->sel_focus_edu($ID_focus);

		echo json_encode($showepo);
	}
	
	//образовательная программа для бухгалтера
	public function edu_price_bux()
	{
			//Сессия
			$data['session'] = $this->session->userdata('login_session');
			$session=$data['session'];
			$ID_user = $session['ID_user'];

			//загрузка модели
			$this->load->model('bufgalter_m');
			$this->load->model('type_ep_m');
			$this->load->model('form_teach_m');
			$this->load->model('type_doc_m');
			$this->load->model('edu_program_m');

			$data['focus'] = $this->bufgalter_m->sel_focus();
			$data['type_ep'] = $this->type_ep_m->sel_type_ep();
			$data['form_teach'] = $this->form_teach_m->sel_form_teach();
			$data['type_doc'] = $this->type_doc_m->sel_type_doc();
			$data['edu_p'] = $this->edu_program_m->sel_edu_program(NULL, NULL, NULL, NULL);



		$this->load->view('template/header.php');
		$this->load->view('page/buxgalter3.php', $data);
	}

	//фильтр для бухгалтера
	public function filter_buxg()
	{
		$ID_focus = $_POST['ID_focus'];
		$ID_type_ep = $_POST['ID_type_ep'];
		$ID_form = $_POST['ID_form'];
		$ID_type_doc = $_POST['ID_type_doc'];

		if($ID_focus == 'all') $ID_focus = NULL;
		if($ID_type_ep == 'all') $ID_type_ep = NULL;
		if($ID_form == 'all') $ID_form = NULL;
		if($ID_type_doc == 'all') $ID_type_doc = NULL;

		$this->load->model('edu_program_m');
		$edu_program = $this->edu_program_m->sel_edu_program($ID_focus, $ID_type_ep, $ID_form, $ID_type_doc);

		echo json_encode($edu_program);
	}

	// изменить цены и педчаса
	public function update_price()
	{
		$cost_hour = $_POST['cost_hour'];
		$price = $_POST['price'];

		$ID_ep = $_POST['ID_ep'];

		$this->load->model('bufgalter_m');
		$update = $this->bufgalter_m->upd_price($ID_ep, $cost_hour, $price);

		if($update == TRUE) $update = 'Изменение выполнено!';
		echo json_encode($update);
	}


	//фильтрация о полученных доходах
	public function get_sum()
	{
		$ID_focus = $_POST['ID_focus'];
		$ID_ep = $_POST['ID_ep'];

		$date1 = $_POST['date1'];
		$date2 = $_POST['date2'];

		if($ID_focus == 'all') $ID_focus = NULL;
		if($ID_ep == 'all') $ID_ep = NULL;
		if(empty($date1)) $date1 = NULL;
		if(empty($date2)) $date2 = NULL;

		
		
		$this->load->model('bufgalter_m');
		$result = $this->bufgalter_m->sel_sum($ID_focus, $ID_ep, $date1, $date2);

		echo json_encode($result);
	}


	
	
	
}
