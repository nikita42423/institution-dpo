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

		$this->load->view('template/header.php');
		$this->load->view('template/sidebar.php');
		$this->load->view('page/methodist/filter_program.php', $data);
		$this->load->view('page/methodist/edu_program.php', $data);
	}

	//Фильтрование обр. программы
	public function filter_program()
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
			$this->db->last_query();
			$str = '';
				foreach ($edu_program as $row) {
				$str .= '<tr>
					<th scope="row">'.$row['ID_ep'].'</th>
					<td>'.$row['name_ep'].'</td>
					<td>'.$row['name_focus'].'</td>
					<td>'.$row['name_type_ep'].'</td>
					<td>'.$row['name_form'].'</td>
					<td>'.$row['time_week'].'</td>
					<td>'.$row['amount_hour'].'</td>
					<td>'.$row['name_type_doc'].'</td>
					<td>'.$row['type_cert'].'</td>
					<td>'.$row['name_profession'].'</td>
					<td>'.$row['count_in_group'].'</td>
					<td>'.$row['cost_hour'].'</td>
					<td>'.$row['price'].'</td>
					<td>
						<!-- Изменить -->
						<button type="button" class="btn btn-primary">
							<i class="bi-pencil" aria-hidden="true"></i>
						</button>

						<!-- Удалить -->
						<a href="" class="btn btn-danger">
							<i class="bi-trash" aria-hidden="true"></i>
						</a>
					</td>
				</tr>';
				}

			echo $str;
		}
	}

	//Добавление программы
	public function add_program()
	{
		$ID_focus = NULL;

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
		$this->load->view('page/add_program.php', $data);

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
			$cost_hour = $this->input->post('cost_hour');
			$price = $this->input->post('price');

			$this->load->model('edu_program_m');
			$ID_ep = $this->edu_program_m->add_edu_program($name_ep, $ID_focus, $ID_type_ep, $ID_form, $time_week, $amount_hour, $ID_type_doc, $type_cert, $name_profession, $count_in_group, $cost_hour, $price);
			
		}
	}

}
    // //Тестирование
    // public function test1()
    // {
    //     $name_focus = $_POST['name_focus'];
        
    //     $this->load->model('edu_program_m');
    //     $edu_program = $this->edu_program_m->sel_edu_program($name_focus);

	// 	//в переменную запишем все, что нужно потом выдать 
	// 	$str = '<table id="table_program" class="table table-striped" style="width:100%">
	// 					<thead>
	// 						<tr>
	// 							<th>№</th>
	// 							<th>Наименование</th>
	// 							<th></th>
	// 						</tr>
	// 					</thead>
	// 					<tbody>';
	// 						foreach ($edu_program as $row) {
	// 						$str .='<tr> <th scope="row">'.$row['ID_type_ep'].'</th>
	// 							<td>'.$row['name_type_ep'].'</td>
	// 							<td></td>
    //                         </tr>';
    //                         $str .=' </tbody></table>';
    //                         echo $str;
    //             }
	// }
    // }
