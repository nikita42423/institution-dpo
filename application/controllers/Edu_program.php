<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edu_program extends CI_Controller {

	//Просмотр образовательной программы
	public function browse()
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

		$this->load->view('page/methodist/modal_ep.php');
		$this->load->view('template/header.php');
		$this->load->view('template/sidebar.php');
		$this->load->view('page/methodist/filter_edu_program.php', $data);
		$this->load->view('page/methodist/edu_program.php', $data);
		$this->load->view('template/footer.php');
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
			$str = '';
				foreach ($edu_program as $row) {
				$str .= '<tr>
					<th scope="row">'.$row['ID_ep'].'</th>
					<td>
						<button type="button" data-bs-toggle="modal" class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Подробнее"
							data-bs-target="#modal_ep"
							data-id_ep="'.$row['ID_ep'].'"
							data-name_ep="'.$row['name_ep'].'"
							data-name_profession="'.$row['name_profession'].'"
							data-type_cert="'.$row['type_cert'].'"
							data-ID_type_ep="'.$row['ID_type_ep'].'"
							data-ID_focus="'.$row['ID_focus'].'"
							data-ID_type_doc="'.$row['ID_type_doc'].'"
							data-ID_form="'.$row['ID_form'].'"
							data-time_week="'.$row['time_week'].'"
							data-amount_hour="'.$row['amount_hour'].'"
							data-count_in_group="'.$row['count_in_group'].'"
						><span data-bs-toggle="tooltip" data-bs-placement="right" title="Подробнее">'.$row['name_ep'].'</span></button>
					</td>
					<td>'.$row['name_focus'].'</td>
					<td>'.$row['price'].'</td>
					<td>
						<div class="btn-group" role="group"> 
		
							<!-- Изменить -->
							<button type="button" class="btn btn-primary">
								<span data-bs-toggle="tooltip" data-bs-placement="left" title="Изменить"><i class="bi-pencil" aria-hidden="true"></i></span>
							</button>

							<!-- Учебный план -->
							<a type="submit" class="btn btn-dark" href="discipline/browse_one?ID_ep='.$row['ID_ep'].'">Уч. план</a>
						
						</div>
					</td>
				</tr>';
				}

			echo $str;
		}
	}

	//Добавление образовательный программы
	public function add_program()
	{
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

		$this->load->view('template/header.php');
		$this->load->view('template/sidebar.php');
		$this->load->view('page/methodist/add_edu_program.php', $data);
		$this->load->view('template/footer.php');

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

			$this->load->model('edu_program_m');
			$ID_ep = $this->edu_program_m->add_edu_program($name_ep, $ID_focus, $ID_type_ep, $ID_form, $time_week, $amount_hour, $ID_type_doc, $type_cert, $name_profession, $count_in_group);

			$this->session->set_flashdata('ID_ep', $ID_ep); //Для переноски данных в другую страницу
			redirect('discipline/browse');
		}
	}

}