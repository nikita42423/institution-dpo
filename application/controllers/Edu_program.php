<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edu_program extends CI_Controller {

	//Просмотр образовательной программы
	public function browse()
	{
		//Сессия
		$data['session'] = $this->session->userdata('login_session');
		if (isset($data['session']))
		{
			//Данные из БД
			$this->load->model('edu_program_m');
			$this->load->model('focus_m');
			$this->load->model('type_ep_m');
			$this->load->model('form_teach_m');
			$this->load->model('type_doc_m');
			$data['edu_program'] = $this->edu_program_m->sel_edu_program(NULL, NULL, NULL, NULL);
			$data['focus'] = $this->focus_m->sel_focus();
			$data['type_ep'] = $this->type_ep_m->sel_type_ep();
			$data['form_teach'] = $this->form_teach_m->sel_form_teach();
			$data['type_doc'] = $this->type_doc_m->sel_type_doc();

			$this->load->view('page/methodist/modal_ep');
			$this->load->view('page/methodist/modal_upd_ep', $data);
			$this->load->view('template/header');
			$this->load->view('template/sidebar', $data);
			$this->load->view('page/methodist/filter_edu_program');
			$this->load->view('page/methodist/edu_program');
			$this->load->view('template/footer');
		}
		else
		{
			redirect('main/index');
		}
	}

	//Фильтрование обр. программы
	public function filter_edu_program()
    {
		if (!empty($_POST))
		{
			$ID_focus = $_POST['ID_focus'];
			$ID_type_ep = $_POST['ID_type_ep'];
			$ID_form = $_POST['ID_form'];
			$ID_type_doc = $_POST['ID_type_doc'];

			if ($ID_focus == 'all') {$ID_focus = NULL;}
			if ($ID_type_ep == 'all') {$ID_type_ep = NULL;}
			if ($ID_form == 'all') {$ID_form = NULL;}
			if ($ID_type_doc == 'all') {$ID_type_doc = NULL;}

			$this->load->model('edu_program_m');
			$edu_program = $this->edu_program_m->sel_edu_program($ID_focus, $ID_type_ep, $ID_form, $ID_type_doc);
			$str = '
			<table id="table_ep" class="table table-hover" style="width:100%">
				<thead class="table-dark">
					<tr>
						<td>Наименование</td>
						<td>Направление</td>
						<td>Стоимость</td>
						<td></td>
					</tr>
				</thead>
				<tbody>';
				foreach ($edu_program as $row) {
					$str .= '<tr>
						<td class="col-6">
							<button type="button" data-bs-toggle="modal" class="btn btn-light m-0" 
								data-bs-target="#modal_ep"
								data-id_ep="'.$row["ID_ep"].'"
								data-name_ep="'.$row["name_ep"].'"
								data-name_profession="'.$row["name_profession"].'"
								data-type_cert="'.$row["type_cert"].'"
								data-name_type_ep="'.$row["name_type_ep"].'"
								data-name_focus="'.$row["name_focus"].'"
								data-name_type_doc="'.$row["name_type_doc"].'"
								data-name_form="'.$row["name_form"].'"
								data-time_week="'.$row["time_week"].'"
								data-amount_hour="'.$row["amount_hour"].'"
								data-count_in_group="'.$row["count_in_group"].'"
							><span data-bs-toggle="tooltip" data-bs-placement="right" title="Подробнее">'.$row["name_ep"].'</span></button>
						</td>
						<td class="col-2">'.$row["name_focus"].'</td>
						<td class="col-1">'.$row["price"].'</td>
						<td class="col-3 text-end">
							<div class="btn-group" role="group"> 
			
								<!-- Изменить -->
								<button type="button" class="btn btn-primary m-0">
									<span data-bs-toggle="tooltip" data-bs-placement="left" title="Изменить"><i class="bi-pencil" aria-hidden="true"></span></i>
								</button>

								<!-- Учебный план -->
								<a type="submit" class="btn btn-dark m-0" href="discipline/browse_one?ID_ep='.$row["ID_ep"].'">Уч. план</a>

								<!-- График курсов -->
								<a type="submit" class="btn btn-dark m-0" href="course/index?ID_ep='.$row["ID_ep"].'">График</a>
							
							</div>
						</td>
					</tr>';
				}
			$str .= '
				</tbody>
			</table>
			
			<script>
				$(document).ready(function () {
					var table = $("#table_ep").DataTable({
						lengthChange:false,
						buttons:["excel", "pdf"]
					});
					table.buttons().container().appendTo("#table_ep_wrapper .col-md-6:eq(0)");
				});
			</script>';
			echo $str;
		}
	}

	//Добавление образовательный программы
	public function add_program()
	{
		//Сессия
		$data['session'] = $this->session->userdata('login_session');

		//Данные из БД
		$this->load->model('edu_program_m');
		$this->load->model('focus_m');
		$this->load->model('type_ep_m');
		$this->load->model('form_teach_m');
		$this->load->model('type_doc_m');

		$data['focus'] = $this->focus_m->sel_focus();
		$data['type_ep'] = $this->type_ep_m->sel_type_ep();
		$data['form_teach'] = $this->form_teach_m->sel_form_teach();
		$data['type_doc'] = $this->type_doc_m->sel_type_doc();

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('page/methodist/add_edu_program');
		$this->load->view('template/footer');

		if (!empty($_POST))
		{
			$name_ep = $this->input->post('name_ep');
			$name_profession = $this->input->post('name_profession');
			$type_cert = $this->input->post('type_cert');
			$ID_type_ep = $this->input->post('ID_type_ep');
			$ID_focus = $this->input->post('ID_focus');
			$ID_type_doc = $this->input->post('ID_type_doc');
			$ID_form = $this->input->post('ID_form');
			$time_week = $this->input->post('time_week');
			$amount_hour = $this->input->post('amount_hour');
			$count_in_group = $this->input->post('count_in_group');
			$short_name = $this->input->post('short_name');

			$this->load->model('edu_program_m');
			$ID_ep = $this->edu_program_m->add_edu_program($name_ep, $ID_focus, $ID_type_ep, $ID_form, $time_week, $amount_hour, $ID_type_doc, $type_cert, $name_profession, $count_in_group, $short_name);

			//$this->session->set_flashdata('ID_ep', $ID_ep); //Для переноски данных в другую страницу
			redirect('discipline/browse_one?ID_ep='.$ID_ep);
		}
	}

	//Изменение образовательный программы
	public function upd_edu_program()
	{
		if (!empty($_POST))
		{
			$ID_ep = $this->input->post('ID_ep');
			$name_ep = $this->input->post('name_ep');
			$name_profession = $this->input->post('name_profession');
			$type_cert = $this->input->post('type_cert');
			$ID_type_ep = $this->input->post('ID_type_ep');
			$ID_focus = $this->input->post('ID_focus');
			$ID_type_doc = $this->input->post('ID_type_doc');
			$ID_form = $this->input->post('ID_form');
			$time_week = $this->input->post('time_week');
			$amount_hour = $this->input->post('amount_hour');
			$count_in_group = $this->input->post('count_in_group');
			$short_name = $this->input->post('short_name');

			$this->load->model('edu_program_m');
			$this->edu_program_m->upd_edu_program($name_ep, $ID_focus, $ID_type_ep, $ID_form, $time_week, $amount_hour, $ID_type_doc, $type_cert, $name_profession, $count_in_group, $ID_ep, $short_name);

			redirect('edu_program/browse');
		}
	}
}