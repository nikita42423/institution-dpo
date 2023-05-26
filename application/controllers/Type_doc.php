<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type_doc extends CI_Controller {

    //Просмотр вида документа
	public function browse()
	{
        //Данные из БД
        $this->load->model('type_doc_m');
        $data['type_doc'] = $this->type_doc_m->sel_type_doc();

		$this->load->view('template/header.php');
        $this->load->view('template/sidebar.php');
		$this->load->view('page/info/type_doc.php', $data);
        $this->load->view('template/footer.php');
        
        $this->load->view('page/methodist/modal_info.php');
	}

    //Добавление вида документа
	public function add_type_doc()
	{
		if (!empty($_POST))
        {
            $data = array(
                'name_type_doc' => $this->input->post('name_type_doc')
            );

            $this->load->model('type_doc_m');
            $this->type_doc_m->add_type_doc($data);

            //Сообщение об успеха
            $this->session->set_flashdata('msg', 'Успешно добавлен!');

            redirect(base_url('type_doc/browse'));
        }
	}

    //Удаление вида документа
	public function del_type_doc()
	{
        $data = array(
            'ID_type_doc' => $this->input->get('ID_type_doc')
        );

        $this->load->model('type_doc_m');
        $this->type_doc_m->del_type_doc($data);

        //Сообщение об успеха
        $this->session->set_flashdata('msg', 'Успешно удален!');

        redirect(base_url('type_doc/browse'));
    }

    //Изменение вида документа
	public function upd_type_doc()
	{
        $id   = $this->input->post('ID_type_doc');
        $data = array(
            'name_type_doc' => $this->input->post('name_type_doc')
        );

        $this->load->model('type_doc_m');
        $this->type_doc_m->upd_type_doc($id, $data);

        //Сообщение об успеха
        $this->session->set_flashdata('msg', 'Успешно изменен!');

        redirect(base_url('type_doc/browse'));
    }
}
