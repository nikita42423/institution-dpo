<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{

		//Сессия
		// $data['session'] = $this->session->userdata('login_session');
		// $session=$data['session'];

		// $ID_user = $session['ID_user'];
		// $data['ID_user'] = $ID_user;

		$this->load->model('client_m');
		$this->load->model('focus_m');
		$this->load->model('form_teach_m');

		$data['clientcours'] = $this->client_m->sel_cours();
		$data['focus'] = $this->focus_m->sel_focus();
		$data['form_teach'] = $this->form_teach_m->sel_form_teach();

		$this->load->view('template/header.php');
		$this->load->view('template/navbar_main.php',  $data);
		$this->load->view('page/main.php',  $data);
	//	$this->load->view('template/footer.php');
	
	}

	public function nabravel()
	{
		$this->load->view('template/header.php');
		$this->load->view('template/navb.php');
		$this->load->view('page/nabrav.php');

	}


}
