<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Methodist extends CI_Controller {

    //Просмотр
	public function index()
	{
        //Данные из БД
        $this->load->model('info_m');
        $data['type_ep'] = $this->info_m->sel_type_ep();

		$this->load->view('template/header.php');
		$this->load->view('page/methodist.php', $data);
	}

    //Добавление вида ОП
	public function add_type_ep()
	{
		if (!empty($_POST))
        {
            $data = array(
                'name_type_ep' => $this->input->post('name_type_ep')
            );

            $this->load->model('info_m');
            $this->info_m->add_type_ep($data);

            //Сообщение об успеха
            $this->session->set_flashdata('msg', 'Успешно добавлен!');

            redirect(base_url('methodist/index'));
        }
	}

    //Удаление категории|Кузнецов
	public function del_type_ep()
	{
        $data = array(
            'ID_type_ep' => $this->input->get('ID_type_ep')
        );

        $this->load->model('info_m');
        $this->info_m->del_type_ep($data);

        //Сообщение об успеха
        $this->session->set_flashdata('msg', 'Успешно удален!');

        redirect(base_url('methodist/index'));
    }

    //Изменение категории|Кузнецов
	public function upd_type_ep()
	{
        $id   = $this->input->post('ID_type_ep');
        $data = array(
            'name_type_ep' => $this->input->post('name_type_ep')
        );

        $this->load->model('info_m');
        $this->info_m->upd_type_ep($id, $data);

        //Сообщение об успеха
        $this->session->set_flashdata('msg', 'Успешно изменен!');

        redirect(base_url('methodist/index'));
    }
}
