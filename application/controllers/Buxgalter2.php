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
	
	
}
