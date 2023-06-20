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
			$this->load->model('bufgalter_m');	//ОП
			$this->load->model('client_m');		//курсы
			$this->load->model('form_teach_m');
			$this->load->model('statement_m');

			$data['focus'] = $this->focus_m->sel_focus();
			$data['edu_program'] = $this->bufgalter_m->sel_edu_program();
			$data['course'] = $this->client_m->course();
			$data['form_teach'] = $this->form_teach_m->sel_form_teach();
			$data['statement'] = $this->statement_m->sel_stat_2(NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
		$this->load->model('bufgalter_m');	//ОП
		$this->load->model('statement_m');

		$data['course'] = $this->client_m->course();
		$data['edu_prog'] = $this->bufgalter_m->sel_edu_program();
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
		$ID_ep = $_POST['ID_ep'];
		$ID_form = $_POST['ID_form'];
		$status = $_POST['status'];
		$ID_course = $_POST['ID_course'];
		$date1 = $_POST['date1'];
		$date2 = $_POST['date2'];

		if($ID_focus == 'all') $ID_focus = NULL;
		if($ID_form == 'all') $ID_form = NULL;
		if($status == 'all') $status = NULL;
		if($ID_ep == 'all') $ID_ep = NULL;
		if($ID_course == 'all') $ID_course = NULL;
		if(empty($date1)) $date1 = NULL;
		if(empty($date2)) $date2 = NULL;

		$this->load->model('statement_m');
		$result = $this->statement_m->sel_stat_2($ID_focus, $ID_form, $status, $ID_ep, $ID_course, $date1, $date2);

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

	//фильтрация ОП (менеджер)
	public function filter_registr_client()
	{
		$ID_ep = $_POST['ID_ep'];


		if($ID_ep == 'all') $ID_ep = NULL;

		$this->load->model('course_m');
		$result = $this->course_m->filter_ep($ID_ep);

		echo json_encode($result);
	}

	//регистрация клиента (Менеджер)
	public function add_client()
	{
		if (!empty($_POST))
        {
			$full_name = $this->input->post('full_name');
			$phone = $this->input->post('phone');
			$email = $this->input->post('email');
			$login = $this->input->post('login');
			$passwords = $this->input->post('passwords');
			$ID_course = $this->input->post('id_course_client');

            $this->load->model('user_m');
			$valid = $this->user_m->validation_registration($login);
			if(empty($valid))
			{
				$this->user_m->add_client_statement($full_name, $login, $passwords, $phone, $email, $ID_course);
			}
			redirect(base_url('manager/zaivk'));
        }
	}


	//фильтрация направления
	public function filter_focus()
	{
		$ID_focus = $_POST['ID_focus'];

		if($ID_focus == 'all') $ID_focus = NULL;

		$this->load->model('edu_program_m');
		$result = $this->edu_program_m->filter_focus($ID_focus);

		echo json_encode($result);
	}


	
	//зачисление приказа
	public function add_order()
	{
		if (!empty($_POST))
        {
			$number_pricaz = $this->input->post('number_pricaz');
			$date_pricaz = $this->input->post('date_pricaz');
			$ID_course = $this->input->post('id_course_pricaz');

            $this->load->model('statement_m');
			if($ID_course != 'all') $this->statement_m->update_pricaz($number_pricaz, $date_pricaz, $ID_course);

			redirect(base_url('manager/zaivk'));
        }
	}

	
	
}
