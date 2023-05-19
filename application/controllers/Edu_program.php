<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edu_program extends CI_Controller {

	//Просмотр образовательной программы
	public function browse()
	{
		$ID_focus = NULL;

		//Данные из БД
		$this->load->model('edu_program_m');
		$this->load->model('focus_m');
		$this->load->model('type_ep_m');
		$this->load->model('form_teach_m');
		$this->load->model('type_doc_m');
		$data['edu_program'] = $this->edu_program_m->sel_edu_program($ID_focus);
		
		$data['focus'] = $this->focus_m->sel_focus();
		$data['type_ep'] = $this->type_ep_m->sel_type_ep();
		$data['form_teach'] = $this->form_teach_m->sel_form_teach();
		$data['type_doc'] = $this->type_doc_m->sel_type_doc();

		

		$this->load->view('template/header.php');
		$this->load->view('template/sidebar.php');
		$this->load->view('page/methodist/edu_program.php', $data);
		
	}

	//Фильтрование
	public function filter_program()
    {
		if (!empty($_POST))
		{
			$ID_focus = $_POST['ID_focus'];

			$this->load->model('edu_program_m');
			$edu_program = $this->edu_program_m->sel_edu_program($ID_focus);
			
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
