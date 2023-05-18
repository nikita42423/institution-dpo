<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {

	public function index()
	{
		//Сессия
		$data['session'] = $this->session->userdata('login_session');
		$session=$data['session'];
		$ID_user = $session['ID_user'];
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


		$this->load->view('template/header.php');
		$this->load->view('template/navbar_clients.php', $data);
		$this->load->view('page/clients.php');
	
		
	}

	
}
