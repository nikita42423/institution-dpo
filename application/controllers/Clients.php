<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {

	public function index()
	{
		//Сессия
		$data['session'] = $this->session->userdata('login_session');
		$session=$data['session'];
		$ID_user = $session['ID_user'];

		$this->load->model('client_m');
        $data['clientcours'] = $this->client_m->sel_cours();

		$this->load->view('template/header.php');
		$this->load->view('template/navbar_clients.php', $data);
		$this->load->view('page/clients_curs.php');

		
	
		
	}

	public function lizcab()
	{
		//Сессия
		$data['session'] = $this->session->userdata('login_session');
		$session=$data['session'];
		$ID_user = $session['ID_user'];
        

		$this->load->model('client_m');
		$data['client'] = $this->client_m->sel_user($ID_user);

		$this->load->view('template/header.php');
		$this->load->view('template/navbar_clients.php', $data);
		$this->load->view('page/clients.php', $data);
		
	}

	//изменение персональных данные клиента
	public function edit_client()
	{
		$full_name = $_POST['full_name'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];

		$ID_user = $_POST['ID_user'];

		$this->load->model('client_m');
		$update = $this->client_m->upd_user($ID_user, $full_name, $phone, $address);

		if($update == TRUE) $update = 'Изменение выполнено!';
		echo json_encode($update);
	}

	

	
}
