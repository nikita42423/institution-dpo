<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {

	public function zaivk()
	{
		//Сессия
		$data['session'] = $this->session->userdata('login_session');
		$session=$data['session'];
		$ID_user = $session['ID_user'];


		$this->load->view('template/header.php');

		$this->load->view('page/manager.php', $data);
		$this->load->view('template/footer.php');
	}

	public function formatiz()
	{
		//Сессия
		$data['session'] = $this->session->userdata('login_session');
		$session=$data['session'];
		$ID_user = $session['ID_user'];


		$this->load->view('template/header.php');

		$this->load->view('page/manager_formiz.php', $data);
		$this->load->view('template/footer.php');
	}

	
}
