<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_teach extends CI_Controller {

    //Просмотр формы обучения
	public function browse()
	{
        //Данные из БД
        $this->load->model('form_teach_m');
        $data['form_teach'] = $this->form_teach_m->sel_form_teach();

		$this->load->view('template/header.php');
        $this->load->view('template/sidebar.php');
		$this->load->view('page/info/form_teach.php', $data);
        $this->load->view('template/footer.php');
        
        $this->load->view('page/methodist/modal_info.php');
	}

    //Добавление формы обучения
	public function add_form_teach()
	{
		if (!empty($_POST))
        {
            $data = array(
                'name_form' => $this->input->post('name_form')
            );

            $this->load->model('form_teach_m');
            $this->form_teach_m->add_form_teach($data);

            //Сообщение об успеха
            $this->session->set_flashdata('msg', 'Успешно добавлен!');

            redirect(base_url('form_teach/browse'));
        }
	}

    //Удаление формы обучения
	public function del_form_teach()
	{
        $data = array(
            'ID_form' => $this->input->get('ID_form')
        );

        $this->load->model('form_teach_m');
        $this->form_teach_m->del_form_teach($data);

        //Сообщение об успеха
        $this->session->set_flashdata('msg', 'Успешно удален!');

        redirect(base_url('form_teach/browse'));
    }

    //Изменение формы обучения
	public function upd_form_teach()
	{
        $id   = $this->input->post('ID_form');
        $data = array(
            'name_form' => $this->input->post('name_form')
        );

        $this->load->model('form_teach_m');
        $this->form_teach_m->upd_form_teach($id, $data);

        //Сообщение об успеха
        $this->session->set_flashdata('msg', 'Успешно изменен!');

        redirect(base_url('form_teach/browse'));
    }
}
