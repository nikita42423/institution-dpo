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
		$data['session'] = $this->session->userdata('login_session');
		$session=$data['session'];

		if (isset($data['session']))
		{
			$ID_user = $session['ID_user'];
			$data['ID_user'] = $ID_user;

		}
		else $data['ID_user'] = '';
		

		$this->load->model('client_m');
		$this->load->model('focus_m');
		$this->load->model('form_teach_m');
		$this->load->model('course_m');

		$data['clientcours'] = $this->client_m->sel_course(NULL, NULL, NULL, NULL);
		$data['focus'] = $this->focus_m->sel_focus();
		$data['form_teach'] = $this->form_teach_m->sel_form_teach();

		$data['course'] = $this->course_m->sel_course(NULL, NULL);

		$date = new DateTime('2023-09-01');
		for ($i = 1; $i <= 45; $i++) {
			$data['header_table'][$i] = $date->format('Y-m-d');
			$date->modify('+7 day');
		}


		$this->load->view('template/header.php');
		$this->load->view('template/navbar_main1.php',  $data);
		$this->load->view('page/main.php',  $data);
	//	$this->load->view('template/footer.php');
	
	}

	public function nabravel()
	{
		$this->load->view('template/header.php');
		$this->load->view('template/navb.php');
		$this->load->view('page/nabrav.php');

	}


	//Выход и удаление сессии
	public function out()
	{
		session_destroy();
		redirect('main/index');
	}




	//фильтрация гостя по ОП (курсы)
	public function filter_guest()
	{
		//Сессия
		$data['session'] = $this->session->userdata('login_session');
		$session=$data['session'];

		if(isset($data['session']))
		{
			$ID_user = $session['ID_user'];
		}
		else $ID_user = '';

		$this->load->model('course_m');

		$ID_ep = $_POST['ID_ep'];
		$course = $this->course_m->sel_course($ID_ep);
		$str = '';

		$date = new DateTime('2023-09-01');
		for ($i = 1; $i <= 45; $i++) {
			$header_table[$i] = $date->format('Y-m-d');
			$date->modify('+7 day');
		}

		foreach ($course as $row) {
			$str .= '<tr>';

				if ($row['count_user'] >= $row['count_in_group'])
				{
				  //занято
				  $td = '<td class="table-danger text-danger-emphasis">-</td>';
				  $str .= '<td class="d-grid gap-2 m-0 pt-1 pb-1"><button type="button" class="btn btn-danger btn-sm disabled" >-</button></td>';
				}
				else
				{
				  //свободно
				  $td = '<td class="table-primary text-primary-emphasis">+</td>';
				  $str .= '<td class="d-grid gap-2 m-0 pt-1 pb-1"><button type="button" class="btn btn-primary btn-sm" onclick="receptionApplication('.$row['ID_course'].', '.$ID_user.')" >Запись</button></td>';
				}
			  $str .= '<td>'.$row['name_course'].'</td>
						<td>'.$row['ID_ep'].'</td>
						<td>'.$row['short_name'].'</td>';

			  $date1 = new DateTime($row['date_start_teaching']);
			  $date2 = new DateTime($row['date_end_teaching']);

			  for ($i = 1; $i <= 45; $i++) {
				$d = $header_table[$i];
				$date = new DateTime($d);

				if ($date >= $date1 && $date <= $date2) {
				  $str .= $td;
				}
				else {
				  $str .= "<td></td>";
				}

			  }
			  $str .= '</tr>';
			}
			echo $str;
	}



}
