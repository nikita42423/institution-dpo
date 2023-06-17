<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {


	public function lizcab()
	{
		//Сессия
		$data['session'] = $this->session->userdata('login_session');
		$session=$data['session'];
		$ID_user = $session['ID_user'];

		if (isset($data['session']))
		{
			$this->load->model('client_m');
			$data['client'] = $this->client_m->sel_user($ID_user);
			$data['history'] = $this->client_m->get_history_course($ID_user);

			$this->load->view('template/header.php');
		//	$this->load->view('template/navbar_clients.php', $data);
			$this->load->view('page/clients.php', $data);
		}
		else
		{
			redirect('main/index');
		}
		
	}

	//изменение персональных данные клиента
	public function edit_client()
	{
		$full_name = $_POST['full_name'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$file_dogovor = $_POST['file_dogovor'];

		$ID_user = $_POST['ID_user'];
		$this->load->model('client_m');
		if(!empty($_FILES))
		{
			$dir = 'files/';
			$dat = strripos(basename($_FILES['file_dogovor']['name']), '.', $offset = 0);
			$sub = substr(basename($_FILES['file_dogovor']['name']), $dat);
			$file_dogovor = $dir.$ID_user.$sub;
			if(move_uploaded_file($_FILES['file_dogovor']['tmp_name'], $file_dogovor))
			{
				$this->client_m->upd_user($ID_user, $file_dogovor);
			}
			else
			{
				echo "Возможная атака с помощью файловой загрузки!\n";
			}
		}
		$this->load->model('client_m');
		$update = $this->client_m->upd_user($ID_user, $full_name, $phone, $address, $file_dogovor);

		if($update == TRUE) $update = 'Изменение выполнено!';
		echo json_encode($update);
	}


	//добавление заявки клиента
	public function add_stat()
	{
		$ID_course = $_POST['ID_course'];
		$ID_user = $_POST['ID_user'];
		
		$this->load->model('client_m');
		$valid = $this->client_m->validation_statement($ID_course, $ID_user);
		if(!$valid){
			$create = $this->client_m->add_statement($ID_course, $ID_user);
			if($create != TRUE) echo json_encode('Заявка не оформлена!');
			else echo json_encode($create);
		}
		else echo json_encode('Такая заявка существует! Выберите другую');
	}


	//фильтрация по курсам
	public function filter_client()
	{
		$ID_focus = $_POST['ID_focus'];
		$ID_form = $_POST['ID_form'];
		$date1 = $_POST['date1'];
		$date2 = $_POST['date2'];

		if($ID_focus == 'all') $ID_focus = NULL;
		if($ID_form == 'all') $ID_form = NULL;
		if(empty($date1)) $date1 = NULL;
		if(empty($date2)) $date2 = NULL;

		$this->load->model('client_m');
		$course = $this->client_m->sel_course($ID_focus, $ID_form, $date1, $date2);

		echo json_encode($course);
	}


	
	

	
}
