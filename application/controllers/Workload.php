<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workload extends CI_Controller {

    //Просмотр нагрузки преподавателя
	public function browse()
	{
		//Данные из БД
		$this->load->model('workload_m');
		$this->load->model('teacher_m');
		$data['workload'] = $this->workload_m->sel_workload(NULL);
		$data['teacher'] = $this->teacher_m->sel_teacher(NULL);

		$this->load->view('template/header');
        $this->load->view('template/sidebar');
		$this->load->view('page/methodist/filter_workload', $data);
		$this->load->view('page/methodist/workload');
		$this->load->view('template/footer');
	}

	//удаление нагрузки преподавателя
	public function del_workload()
	{
		if (!empty($_GET['ID_load']))
		{
			$data = array(
				'ID_load' => $this->input->get('ID_load'),
			);
			
			//Данные из БД
			$this->load->model('workload_m');
			$data['workload'] = $this->workload_m->del_workload($data);

			redirect('workload/browse');
		}
	}

	//Фильтрование нагрузки преподавателя
	public function filter_workload()
	{
		if (!empty($_POST))
		{
			$ID_teacher = $_POST['ID_user'];
			if ($ID_teacher == 'all') {$ID_teacher = NULL;}

			$this->load->model('workload_m');
			$workload = $this->workload_m->sel_workload($ID_teacher);
			$str = '';
				foreach ($workload as $row) {
				$str .= '<tr>
					<td>'.$row['name_course'].'</td>
					<td>'.$row['short_name'].'</td>
					<td>'.$row['date_start_teaching'].'</td>
					<td>'.$row['date_end_teaching'].'</td>
					<td>'.$row['name_discipline'].'</td>
					<td>'.$row['amount_hour'].'</td>
					<td>
						<div class="btn-group" role="group">
							<!-- Удалить -->
							<a href="workload/del_workload?ID_load='.$row['ID_load'].'" class="btn btn-dark">
								<i class="bi-trash" aria-hidden="true"></i>
							</a>
						</div>
					</td>
				</tr>';
				}

			echo $str;
		}
	}
}
