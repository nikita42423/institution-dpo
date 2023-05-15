<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buxgalter2 extends CI_Controller {


    public function index()
	{
		 //Сессия
		 $data['session'] = $this->session->userdata('login_session');
         $session=$data['session'];
         $ID_user = $session['ID_user'];

		$this->load->view('template/header.php');
		$this->load->view('page/buxgalter2.php', $data);
		$this->load->view('template/footer.php');
	}

	
}
