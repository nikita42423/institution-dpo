<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

    //Просмотр графика курсов
	public function index()
	{
		//Сессия
		$data['session'] = $this->session->userdata('login_session');
		if (isset($data['session']))
		{
			if (!empty($_GET['ID_ep']))
			{
				$ID_ep = $this->input->get('ID_ep');
			}
			else
			{
				$ID_ep = NULL;
			}

			if (!empty($_GET['ID_focus']))
			{
				$ID_focus = $this->input->get('ID_focus');
			}
			else
			{
				$ID_focus = NULL;
			}

			//Данные из БД
			$this->load->model('course_m');
			$this->load->model('edu_program_m');
			$this->load->model('focus_m');
			$data['course'] = $this->course_m->sel_course($ID_ep, $ID_focus);
			$data['edu_program'] = $this->edu_program_m->sel_edu_program(NULL,NULL,NULL,NULL);
			$data['focus'] = $this->focus_m->sel_focus();

			$date = new DateTime('2023-09-01');
			for ($i = 1; $i <= 45; $i++) {
				$data['header_table'][$i] = $date->format('Y-m-d');
				$date->modify('+7 day');
			}

			$this->load->view('template/header.php');
			$this->load->view('template/sidebar.php', $data);
			$this->load->view('page/methodist/course.php');
			$this->load->view('template/footer.php');
		}
		else
		{
			redirect('main/index');
		}
	}

	//Формировать график курсов
	public function form_course()
	{
		// //Данные из БД
		// $this->load->model('edu_program_m');
		// $this->load->model('course_m');

		// //Очистить таблицу
		// $this->course_m->empty_course();

		// //Выполнение добавления курсов
		// $data['edu_program'] = $this->edu_program_m->sel_edu_program_for_course();
		// $date = new DateTime('2023-09-01');

		// for ($i = 1; $i <= 45; $i++) {
		// 	$data['header_table'][$i] = $date->format('y.m.d');
		// 	$date->modify('+7 day');
		// }

		// foreach ($data['edu_program'] as $row) {
		// 	//Сколько курсов за год
		// 	$count_course = intdiv(45, $row['time_week']);
		// 	$i=1;
		// 	$t=1;
		// 	echo $count_course.'<br>';

		// 	while ($i <= $count_course)
		// 	{
		// 		$name_course = $row['short_name'].'-'.$i;

		// 		if ($t <= 45) {
		// 			$date_start_teaching = $data['header_table'][$t];
		// 			$t += $row['time_week'] - 1;
		// 			$date_end_teaching = $data['header_table'][$t];
		// 			$t++;
		// 			$ID_ep = $row['ID_ep'];
				
		// 			echo $name_course.' | '.$ID_ep.' | '.$date_start_teaching.' | '.$date_end_teaching.' <br>';
		// 			$this->course_m->add_course($name_course, $ID_ep, $date_start_teaching, $date_end_teaching);
		// 		}
		// 		$i++;
		// 	}
		// }
		
		$this->session->set_flashdata('msg', 'График успешно сформирован!');
		redirect('course/index');
	}
}
