
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

	public function index()
	{
        $this->load->view('template/header.php');

		$this->load->view('page/login.php');

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
				'ID_user' => $ID_user,
				'full_name' => $full_name,
				'ID_role' => $ID_role
			);

			$this->session->set_userdata('login_session', $session);

			switch($ID_role)
			{
				case '1': redirect((base_url('director/index')));
				break;
				case '3': redirect(base_url('manager/index'));
				break;
				case '2': redirect(base_url('type_ep/browse'));
				break;
				case '6': redirect(base_url('buxgalter/index'));
				break;
				case '4': redirect(base_url('clients/index'));
				break;
				case '5': redirect(base_url('teachers/index'));
				break;
			}
		}
		else
		{
			$this->session->set_flashdata('login_false', 'Неверный логин или пароль!');
			redirect(base_url('Login/index'));
		}
	}


public function add_user()
{
	if (!empty($_POST))
        {
            $data = array(
                'full_name' => $this->input->post('full_name'),
                'phone'       => $this->input->post('phone'),
                'email'          => $this->input->post('email'),
				'login'       => $this->input->post('login'),
                'passwords'       => $this->input->post('passwords'),
				'ID_role'       => $this->input->post('ID_role')

            );

            $this->load->model('user_m');
            $this->user_m->add_user($data);

            redirect(base_url('Login/index'));
        }
}


public function kill_all_session()
{
	$this->load->model('user_m');
	$this->user_m->kill_session();
	redirect(base_url());
}

}
