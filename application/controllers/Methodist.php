<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Methodist extends CI_Controller {

	public function index()
	{
		$this->load->view('template/header.php');
		$this->load->view('page/methodist.php');
		$this->load->view('template/footer.php');
	}

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
}
