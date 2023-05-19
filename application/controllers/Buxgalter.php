<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buxgalter extends CI_Controller {

	public function index()
	{
         //Сессия
         $data['session'] = $this->session->userdata('login_session');
         $session=$data['session'];
         $ID_user = $session['ID_user'];


		$this->load->model('bufgalter_m');
		$this->bufgalter_m->sel_bux($data);

		$this->load->view('template/header.php');
		$this->load->view('page/buxgalter.php',  $data);

	}

   

	
}
