<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edu_program extends CI_Controller {

	//Просмотр образовательной программы
	public function browse()
	{
		//Данные из БД
		$this->load->model('edu_program_m');
		$data['edu_program'] = $this->edu_program_m->sel_edu_program();

		$this->load->view('template/header.php');
		$this->load->view('template/sidebar.php');
		$this->load->view('page/edu_program.php', $data);
	}

    //Тестирование
    public function test()
    {
        $name_focus = $_POST['name_focus'];
        
        $this->load->model('edu_program_m');
        $edu_program = $this->edu_program_m->sel_edu_program($name_focus);

		//в переменную запишем все, что нужно потом выдать 
		$str = '<table id="table_program" class="table table-striped" style="width:100%">
						<thead>
							<tr>
								<th>№</th>
								<th>Наименование</th>
								<th></th>
							</tr>
						</thead>
						<tbody>';
							foreach ($edu_program as $row) {
							$str .='<tr> <th scope="row">'.$row['ID_type_ep'].'</th>
								<td>'.$row['name_type_ep'].'</td>
								<td></td>
                            </tr>';
                            $str .=' </tbody></table>';
                            echo $str;
                }
	}
    }
