<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {

    //Просмотр преподавателя
	public function browse()
	{
        //Данные из БД
        $this->load->model('teacher_m');
        $data['teacher'] = $this->teacher_m->sel_teacher();

		$this->load->view('template/header');
        $this->load->view('template/sidebar');
		$this->load->view('page/methodist/teacher', $data);
        $this->load->view('page/methodist/modal_teacher');
        $this->load->view('template/footer');
	}

    //Добавление преподавателя
    public function add_teacher()
	{
        if (!empty($_POST)) {
            $full_name = $this->input->post('full_name');
            $profession = $this->input->post('profession');
            $work_exp = $this->input->post('work_exp');
            $login = $this->input->post('login');
            $passwords = $this->input->post('passwords');

            //Данные из БД
            $this->load->model('teacher_m');
            $this->teacher_m->add_teacher($full_name, $login, $passwords, $profession, $work_exp);
            redirect('teacher/browse');
        }

	}

    //Удаление преподавателя
	public function del_teacher()
	{
        $data = array(
            'ID_user' => $this->input->get('ID_user'),
            'ID_role' => 5
        );

        $this->load->model('teacher_m');
        $this->teacher_m->del_teacher($data);

        redirect(base_url('teacher/browse'));
    }

    //Изменить преподаватель
    public function upd_teacher()
	{
        $ID_user = $this->input->post('ID_user');
        $full_name = $this->input->post('full_name');
        $profession = $this->input->post('profession');
        $work_exp = $this->input->post('work_exp');
        $login = $this->input->post('login');
        $passwords = $this->input->post('passwords');

        $this->load->model('teacher_m');
        $this->teacher_m->upd_teacher($ID_user, $full_name, $login, $passwords, $profession, $work_exp);

        redirect(base_url('teacher/browse'));
    }
}
