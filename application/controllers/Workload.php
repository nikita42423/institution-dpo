<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workload extends CI_Controller {

    //Просмотр нагрузки преподавателя
	public function browse()
	{
		//Сессия
		$data['session'] = $this->session->userdata('login_session');

		//Данные из БД
		$this->load->model('workload_m');
		$this->load->model('teacher_m');
		$this->load->model('focus_m');

		if (!empty($_GET['ID_teacher']))
		{
			$ID_teacher = $_GET['ID_teacher'];
		}
		else
		{
			$ID_teacher = NULL;
		}

		$data['workload'] = $this->workload_m->sel_workload($ID_teacher);
		$data['teacher'] = $this->teacher_m->sel_teacher(NULL);
		$data['focus'] = $this->focus_m->sel_focus();

		$this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
		$this->load->view('page/methodist/filter_workload');
		$this->load->view('page/methodist/workload');
		$this->load->view('template/footer');
	}

	//Просмотр нераспределенные нагрузки преподавателя
	public function browse_no_load()
	{
		//Сессия
		$data['session'] = $this->session->userdata('login_session');

		//Данные из БД
		$this->load->model('workload_m');
		$this->load->model('teacher_m');
		$this->load->model('focus_m');

		$data['focus'] = $this->focus_m->sel_focus();
		$ID_focus = 1;

		if (!empty($_POST))
		{
			$ID_focus = $_POST['id_focus_of_no_workload'];
		}
		$data['no_workload'] = $this->workload_m->sel_no_workload($ID_focus);
		$data['teacher'] = $this->teacher_m->sel_teacher($ID_focus);

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('page/methodist/filter_no_workload');
		$this->load->view('page/methodist/no_workload');
		$this->load->view('template/footer');
	}

	//Добавить нагрузки преподавателя
	public function add_workload()
	{
		if (!empty($_GET['ID_teacher'] && $_GET['ID_course'] && $_GET['ID_discipline']))
		{
			$data = array(
				'ID_teacher' 	=> $_GET['ID_teacher'],
				'ID_course'     => $_GET['ID_course'],
				'ID_discipline' => $_GET['ID_discipline']
			);
			
			$this->load->model('workload_m');
			$this->workload_m->add_workload($data);

			redirect('workload/browse_no_load');
		}
	}

	//удаление нагрузки преподавателя
	public function del_workload()
	{
		if (!empty($_GET['ID_load']))
		{
			$ID_teacher = $_GET['ID_teacher'];
			$data = array(
				'ID_load' => $this->input->get('ID_load'),
			);
			
			//Данные из БД
			$this->load->model('workload_m');
			$data['workload'] = $this->workload_m->del_workload($data);

			redirect('workload/browse?ID_teacher='.$ID_teacher);
		}
	}

	//Список преподавателей от направления
	public function filter_teacher_of_focus()
	{
		$ID_focus = $_POST['ID_focus'];
		$this->load->model('teacher_m');
		$teacher = $this->teacher_m->sel_teacher($ID_focus);
		$str = '';
			$str .= '<option value="">Выбрать...</option>';
			foreach($teacher as $row) {
				$str .= '<option value="'.$row['ID_user'].'">'.$row['full_name'].'</option>';
			}
		echo $str;
	}

	//Фильтрование нагрузки преподавателя
	public function filter_workload()
	{
		if (!empty($_POST))
		{
			$ID_teacher = $_POST['ID_user'];
			if ($ID_teacher == '') {$ID_teacher = NULL;}
			
			$this->load->model('workload_m');
			$workload = $this->workload_m->sel_workload($ID_teacher);
			$str = '';

			if (!empty($workload))
			{
				$count = 0;

				foreach ($workload as $row)
				{
					$count += $row['amount_hour'];
					$str .= '<tr>
						<td>'.$row['name_course'].'</td>
						<td>'.$row['short_name'].'</td>
						<td>'.$row['date_start_teaching'].'</td>
						<td>'.$row['date_end_teaching'].'</td>
						<td>'.$row['name_discipline'].'</td>
						<td>'.$row['amount_hour'].'</td>
						<td class="col-1 text-end">
						
							<!-- Удалить -->
							<a href="workload/del_workload?ID_load='.$row['ID_load'].'&ID_teacher='.$ID_teacher.'" class="btn btn-dark m-0">
								<span data-bs-toggle="tooltip" data-bs-placement="left" title="Удалить"><i class="bi-trash" aria-hidden="true"></i></span>
							</a>

						</td>
					</tr>';
				}
				$str .= '<tr><td colspan="7"><h3 class="">Всего '.$count.' часов </h3></td></tr>';
			}
			else
			{
				$str = '<tr><td colspan="7"><h1 class="text-center mt-3">Нет нагрузок этого преподавателя</h1></td></tr>';
			}
			echo $str;

		}
	}
}
