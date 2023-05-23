<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discipline extends CI_Controller {
	
	//Просмотр учебного плана (дисциплины)
	public function browse()
	{
		$in = $this->session->flashdata('ID_ep');

		if (!empty($in)) {
			$ID_ep = $this->session->flashdata('ID_ep');
		} else {
			$ID_ep = NULL;
		}

		//Данные из БД
		$this->load->model('edu_program_m');
		$this->load->model('discipline_m');
        $data['edu_program'] = $this->edu_program_m->sel_edu_program(NULL, NULL, NULL, NULL);
		$data['discipline'] = $this->discipline_m->sel_discipline($ID_ep);

		$this->load->view('template/header.php');
		$this->load->view('template/sidebar.php');
		$this->load->view('page/methodist/add_discipline.php', $data);
		$this->load->view('page/methodist/discipline.php', $data);
	}

	//Добавление учебного плана (дисциплины)
	public function add_discipline()
	{
		if (!empty($_POST))
		{
			$ID_ep 				  = $this->input->post('ID_ep');
			$name_discipline 	  = $this->input->post('name_discipline');
			$amount_hour 		  = $this->input->post('amount_hour');
			$amount_hour_work 	  = $this->input->post('amount_hour_work');
			$type_mid_cert 		  = $this->input->post('type_mid_cert');
			$type_practice		  = $this->input->post('type_practice');
			$amount_hour_practice = $this->input->post('amount_hour_practice');

			$this->load->model('discipline_m');
			$this->discipline_m->add_discipline($name_discipline, $ID_ep, $amount_hour, $amount_hour_work, $type_mid_cert, $type_practice, $amount_hour_practice);
			
			redirect('discipline/browse');
		}
	}

	//Фильтрование учебного плана (дисциплины)
	public function filter_discipline()
	{
		if (!empty($_POST))
		{
			$ID_ep = $_POST['ID_ep'];

			$this->load->model('discipline_m');
			$discipline = $this->discipline_m->sel_discipline($ID_ep);
			$str = '';
			$n = 1;
			foreach ($discipline as $row) {
			$str .='<tr>
				<td>'.$n++.'</td>
				<td>'.$row['name_discipline'].'</td>
				<td>'.$row['amount_hour'].'</td>
				<td>'.$row['amount_hour_work'].'</td>
				<td>'.$row['type_mid_cert'].'</td>
				<td>'.$row['type_practice'].'</td>
				<td>'.$row['amount_hour_practice'].'</td>
				<td>
					<div class="btn-group" role="group">
						<!-- Изменить -->
						<button type="button" class="btn btn-primary">
							<i class="bi-pencil" aria-hidden="true"></i>
						</button>
						<!-- Удалить -->
						<a href="" class="btn btn-danger">
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
