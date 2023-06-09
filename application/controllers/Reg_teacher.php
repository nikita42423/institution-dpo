<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reg_teacher extends CI_Controller {

    //Просмотр преподавателя
	public function browse()
	{
		//Сессия
		$data['session'] = $this->session->userdata('login_session');

        //Данные из БД
        $this->load->model('teacher_m');
        $this->load->model('focus_m');
        $data['teacher'] = $this->teacher_m->sel_teacher(NULL);
        $data['focus'] = $this->focus_m->sel_focus();

		$this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
		$this->load->view('page/methodist/reg_teacher');
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
            $ID_focus = $this->input->post('ID_focus');

            //Данные из БД
            $this->load->model('teacher_m');
            $login_check = $this->teacher_m->sel_user();
            $i=0;

            //Проверка, существует ли логин
            foreach ($login_check as $row)
            {
                if ($login == $row['login']) {$i++; break;}
            }

            if ($i == 0)
            {
                $this->teacher_m->add_teacher($full_name, $login, $passwords, $profession, $work_exp, $ID_focus);
            }
            else
            {
                $this->session->set_flashdata('msg', 'Такой логин существует!');
            }
            redirect('reg_teacher/browse');
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

        redirect(base_url('reg_teacher/browse'));
    }

    //Изменение преподавателя
    public function upd_teacher()
	{
        $ID_user = $this->input->post('ID_user');
        $full_name = $this->input->post('full_name');
        $profession = $this->input->post('profession');
        $work_exp = $this->input->post('work_exp');
        $login = $this->input->post('login');
        $passwords = $this->input->post('passwords');

        //Данные из БД
        $this->load->model('teacher_m');
        $login_check = $this->teacher_m->sel_user();
        $i=0;    
            
        //Проверка, существует ли логин
        foreach ($login_check as $row)
        {
            if ($login == $row['login']) {$i++; break;}
        }

        if ($i == 0)
        {
            $this->teacher_m->upd_teacher($ID_user, $full_name, $login, $passwords, $profession, $work_exp);
        }
        else
        {
            $this->session->set_flashdata('msg', 'Такой логин существует!');
        }
        redirect(base_url('reg_teacher/browse'));
    }
}
