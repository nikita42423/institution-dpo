<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {

	public function zaivk()
	{
		//Сессия
		$data['session'] = $this->session->userdata('login_session');
		$session=$data['session'];
		$ID_user = $session['ID_user'];
		if (isset($data['session']))
		{
			$this->load->model('focus_m');
			$this->load->model('form_teach_m');
			$this->load->model('statement_m');

			$data['focus'] = $this->focus_m->sel_focus();
			$data['form_teach'] = $this->form_teach_m->sel_form_teach();
			$data['statement'] = $this->statement_m->sel_statement(NULL, NULL, NULL);

			$this->load->view('template/header.php');

			$this->load->view('page/manager.php', $data);
			$this->load->view('template/footer.php');
		}
		else
		{
			redirect('main/index');
		}
	}

	public function formatiz()
	{
		//Сессия
		$data['session'] = $this->session->userdata('login_session');
		$session=$data['session'];
		$ID_user = $session['ID_user'];

		$this->load->model('client_m');
		$this->load->model('edu_program_m');
		$this->load->model('statement_m');

		$data['course'] = $this->client_m->course();
		$data['edu_prog'] = $this->edu_program_m->sel_edu_program(NULL, NULL, NULL, NULL);
		$data['statement'] = $this->statement_m->sel_accepted(NULL, NULL);
		$data['statement_end'] = $this->statement_m->sel_end(NULL, NULL, NULL);


		$this->load->view('template/header.php');

		$this->load->view('page/manager_formiz.php', $data);
		$this->load->view('template/footer.php');
	}


	//фильтрация заявок (менеджер)
	public function filter_zaivk()
	{
		$ID_focus = $_POST['ID_focus'];
		$ID_form = $_POST['ID_form'];
		$status = $_POST['status'];

		if($ID_focus == 'all') $ID_focus = NULL;
		if($ID_form == 'all') $ID_form = NULL;
		if($status == 'all') $status = NULL;

		$this->load->model('statement_m');
		$result = $this->statement_m->sel_statement($ID_focus, $ID_form, $status);

		echo json_encode($result);
	}

	//фильтрация заявок - зачислена (формирование зачисления)
	public function filter_accepted()
	{
		$ID_course = $_POST['ID_course'];
		$ID_ep = $_POST['ID_ep'];

		if($ID_course == 'all') $ID_course = NULL;
		if($ID_ep == 'all') $ID_ep = NULL;

		$this->load->model('statement_m');
		$result = $this->statement_m->sel_accepted($ID_course, $ID_ep);

		echo json_encode($result);
	}

	//изменение заявки - зачислена -> обучение 
	public function update_accepted()
	{
		$count = count($_POST['invalidCheck']);	//кол-во чекбоксов
		$this->load->model('statement_m');

		for($i = 0; $i < $count; $i++)
		{
			$data = $_POST['invalidCheck'][$i];
			if(isset($data)) $result = $this->statement_m->update_accepted($data);
		}

	}

	//прием заявок = зачислена
	public function success()
	{
		$ID_application = $_POST['ID_application'];
		$this->load->model('statement_m');

		$result = $this->statement_m->success_application($ID_application);
		if($result != TRUE) echo json_encode('Изменение не выполнено!');
	}

	
	// //удаление заявок
	// public function fail()
	// {
	// 	$ID_application = $_POST['ID_application'];
	// 	$this->load->model('statement_m');

	// 	$result = $this->statement_m->delete_application($ID_application);
	// 	if($result != TRUE) echo json_encode('Удаление не выполнено!');
	// }

	//фильтрация заявок об окончании
	public function filter_end()
	{
		$ID_course = $_POST['ID_course'];
		$ID_ep = $_POST['ID_ep'];
		$status = $_POST['status'];

		if($ID_course == 'all') $ID_course = NULL;
		if($ID_ep == 'all') $ID_ep = NULL;
		if($status == 'all') $status = NULL;

		$this->load->model('statement_m');
		$result = $this->statement_m->sel_end($ID_course, $ID_ep, $status);

		echo json_encode($result);
	}

	//изменение данных об окончании обучения
	public function update_end()
	{
		$ID_application = $_POST['ID_application'];
		$series_doc = $_POST['series_doc'];
		$date_give = $_POST['date_give'];

		$this->load->model('statement_m');

		$result = $this->statement_m->update_end($ID_application, $series_doc, $date_give);
		if($result != TRUE) $result = 'Изменение не выполнено!';
		echo json_encode($result);
	}

	//изменение статуса документа
	public function update_status_doc()
	{
		$ID_application = $_POST['ID_application'];
		$status_doc = $_POST['status_doc'];

		$this->load->model('statement_m');

		$result = $this->statement_m->update_status_doc($ID_application, $status_doc);
		if($result != TRUE) $result = 'Изменение не выполнено!';
		echo json_encode($result);
	}

	

	
}
