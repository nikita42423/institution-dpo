
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

	public function index()
	{
        $this->load->view('template/header.php');
	    $this->load->view('template/navbar_main.php');
		$this->load->view('page/login.php');
	    $this->load->view('template/footer.php');
	}

	//Выполнение входа
public function log_action()
{
	$login = $this->input->post('login');
	$passwords = $this->input->post('passwords');
   
	$this->load->model('user_m');
	$result = $this->user_m->sel_user($login, $passwords);

	if($result != false)
	{
		//Пользователь
		$ID_user = $result->ID_user;
		$full_name = $result->full_name;
		$ID_role = $result->ID_role;
	

		$session = array(
			'ID_user' => $ID_users,
			'full_name' => $full_name,
			'ID_role' => $role
		);

		$this->session->set_userdata('login_session', $session);

		switch($role)
		{
			case 'Директор': redirect((base_url('director/index')));
			break;
			case 'Менеджер': redirect(base_url('manager/index'));
			break;
			case 'Методист': redirect(base_url('metod/index'));
			break;
			case 'Бухгалтер': redirect(base_url('buglter/index'));
			break;
			case 'Клиент': redirect(base_url('clients/index'));
			break;
			case 'Преподаватель': redirect(base_url('teachers/index'));
			break;
		}
	}
	else
	{
		$this->session->set_flashdata('login_false', 'Неверный логин или пароль!');
		redirect(base_url('Login/index'));
	}
}
