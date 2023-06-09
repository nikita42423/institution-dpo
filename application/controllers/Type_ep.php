<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type_ep extends CI_Controller {

    //Просмотр вида ОП
	public function browse()
	{
		//Сессия
		$data['session'] = $this->session->userdata('login_session');
        if (isset($data['session'])) {
        //Данные из БД
        $this->load->model('type_ep_m');
        $data['type_ep'] = $this->type_ep_m->sel_type_ep();

		$this->load->view('template/header.php');
        $this->load->view('template/sidebar.php', $data);
		$this->load->view('page/info/type_ep.php');
        $this->load->view('template/footer.php');
        
        $this->load->view('page/methodist/modal_info.php');
        }
        else
        {
            redirect('main/index');
        }
	}

    //Добавление вида ОП
	public function add_type_ep()
	{
		if (!empty($_POST))
        {
            $data = array(
                'name_type_ep' => $this->input->post('name_type_ep')
            );

            $this->load->model('type_ep_m');
            $this->type_ep_m->add_type_ep($data);

            redirect(base_url('type_ep/browse'));
        }
	}

    //Удаление вида ОП
	public function del_type_ep()
	{
        $data = array(
            'ID_type_ep' => $this->input->get('ID_type_ep')
        );

        $this->load->model('type_ep_m');
        $this->type_ep_m->del_type_ep($data);

        redirect(base_url('type_ep/browse'));
    }

    //Изменение вида ОП
	public function upd_type_ep()
	{
        $id   = $this->input->post('ID_type_ep');
        $data = array(
            'name_type_ep' => $this->input->post('name_type_ep')
        );

        $this->load->model('type_ep_m');
        $this->type_ep_m->upd_type_ep($id, $data);

        redirect(base_url('type_ep/browse'));
    }
}
