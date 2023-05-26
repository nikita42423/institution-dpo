<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Focus extends CI_Controller {

    //Просмотр направления
	public function browse()
	{
        //Данные из БД
        $this->load->model('focus_m');
        $data['focus'] = $this->focus_m->sel_focus();

		$this->load->view('template/header.php');
        $this->load->view('template/sidebar.php');
		$this->load->view('page/info/focus.php', $data);
        $this->load->view('template/footer.php');
        
        $this->load->view('page/methodist/modal_info.php');
	}

    //Добавление направления
	public function add_focus()
	{
		if (!empty($_POST))
        {
            $data = array(
                'name_focus' => $this->input->post('name_focus')
            );

            $this->load->model('focus_m');
            $this->focus_m->add_focus($data);

            //Сообщение об успеха
            $this->session->set_flashdata('msg', 'Успешно добавлен!');

            redirect(base_url('focus/browse'));
        }
	}

    //Удаление направления
	public function del_focus()
	{
        $data = array(
            'ID_focus' => $this->input->get('ID_focus')
        );

        $this->load->model('focus_m');
        $this->focus_m->del_focus($data);

        //Сообщение об успеха
        $this->session->set_flashdata('msg', 'Успешно удален!');

        redirect(base_url('focus/browse'));
    }

    //Изменение направления
	public function upd_focus()
	{
        $id   = $this->input->post('ID_focus');
        $data = array(
            'name_focus' => $this->input->post('name_focus')
        );

        $this->load->model('focus_m');
        $this->focus_m->upd_focus($id, $data);

        //Сообщение об успеха
        $this->session->set_flashdata('msg', 'Успешно изменен!');

        redirect(base_url('focus/browse'));
    }
}
