<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Director extends CI_Controller {

	//Просмотр сведений о количестве обучающихся на курсах
	public function report_count_student()
	{
		//Сессия
		$data['session'] = $this->session->userdata('login_session');
		if (isset($data['session'])) {
			//Сессия
			$data['session'] = $this->session->userdata('login_session');

			//Данные из БД
			$this->load->model('report_m');
			$data['count_student'] = $this->report_m->sel_count_student(NULL, NULL);

			$this->load->view('template/header');
			$this->load->view('template/sidebar_director', $data);
			$this->load->view('page/director/report_count_student');
			$this->load->view('template/footer');
		}
		else
		{
			redirect('main/index');
		}
	}

	//Фильтрование сведений о рейтинге образовательных программ ДПО за период
	public function filter_count_student()
	{
		if (!empty($_POST))
		{
			$date1 = $_POST['date1'];
			$date2 = $_POST['date2'];

			//Данные из БД
			$this->load->model('report_m');
			$data['count_student'] = $this->report_m->sel_count_student($date1, $date2);

			$str = '
			<table class="table table-hover table-sm" id="table_count_student">
            <thead class="table-dark">
                <tr>
                    <th colspan="2">Программа</th>
                    <th class="text-center">подана</th>
                    <th class="text-center">зачислена</th>
                    <th class="text-center">окончена</th>
                    <th class="text-center">Всего</th>
                </tr>
            </thead>
            <tbody>';
                
                $s1 = 0; $s2 = 0; $s3 = 0; $label = ""; $value = "";
                foreach ($data['count_student'] as $row) {
                    $s1 += $row['count1'];
                    $s2 += $row['count2'];
                    $s3 += $row['count3'];
                    $ss1 = $row['count1'] + $row['count2'] + $row['count3'];
                    $label .= $row['short_name'].',';
                    $value .= $ss1.',';

                    $str .= '<tr>
                        <td>'.$row['short_name'].'</td>
                        <td>'.$row['name_ep'].'</td>
                        <td class="text-center">'.$row['count1'].'</td>
                        <td class="text-center">'.$row['count2'].'</td>
                        <td class="text-center">'.$row['count3'].'</td>
                        <td class="text-center"><b>'.$ss1.'</b></td>
                    </tr>';
                }
                    $str .= '<tr>
                        <td colspan="2"><b>Всего</b></td>
                        <td class="text-center"><b>'.$s1.'</b></td>
                        <td class="text-center"><b>'.$s2.'</b></td>
                        <td class="text-center"><b>'.$s3.'</b></td>
                        <td class="text-center"><b>'.($s1 + $s2 + $s3).'</b></td>
                    </tr>
            </tbody>
        </table>

        <!-- Сбор данных -->
        <input type="hidden" id="chart_label" value="'.$label.'">
        <input type="hidden" id="chart_value" value="'.$value.'">
		';
			echo $str;
		}
	}

	//Просмотр сведений о рейтинге образовательных программ ДПО
	public function report_rating_ep()
	{
		//Сессия
		$data['session'] = $this->session->userdata('login_session');
		if (isset($data['session'])) {
			//Данные из БД
			$this->load->model('report_m');
			$data['rating_ep'] = $this->report_m->sel_rating_ep(NULL, NULL);

			$this->load->view('template/header');
			$this->load->view('template/sidebar_director', $data);
			$this->load->view('page/director/report_rating_ep');
			$this->load->view('template/footer');
		}
		else
		{
			redirect('main/index');
		}
	}

	//Фильтрование сведений о рейтинге образовательных программ ДПО за период
	public function filter_rating_ep()
	{
		if (!empty($_POST))
		{
			$date1 = $_POST['date1'];
			$date2 = $_POST['date2'];

			//Данные из БД
			$this->load->model('report_m');
			$data['rating_ep'] = $this->report_m->sel_rating_ep($date1, $date2);

			$str = '
			<table class="table table-hover table-sm" id="table_rating_ep">
            <thead class="table-dark">
                <tr>
                    <th>№Рейтинг</th>
                    <th>Вид</th>
                    <th>Направление</th>
                    <th>Наименование ОП</th>
                    <th class="col-1">Кол-во</th>
                    <th>Сумма</th>
                </tr>
            </thead>
            <tbody>';
				$i=1; $label=''; $value='';
				foreach ($data['rating_ep'] as $row) {
					$label .= $row['short_name'].',';
					$value .= $row['sum_price'].',';
					$str .= '<tr>
						<td>'.$i++.'</td>
						<td>'.$row['name_type_ep'].'</td>
						<td>'.$row['name_focus'].'</td>
						<td>'.$row['name_ep'].'</td>
						<td>'.$row['count_price'].'</td>';

						if ($row['sum_price'] == NULL)
						{
							$str .= '<td><b>0.00₽</b></td>';
						}
						else
						{
							$str .= '<td><b>'.$row['sum_price'].'₽</b></td>';
						}                  
					$str .= '</tr>';
                }
			$str .= '</tbody>
        </table>

		<!-- Сбор данных -->
		<input type="hidden" id="chart_label" value="'.$label.'">
		<input type="hidden" id="chart_value" value="'.$value.'">
		';
			echo $str;
		}
	}

	//Просмотр сведений о работе преподавателей за период
	public function report_work_teacher()
	{
		//Сессия
		$data['session'] = $this->session->userdata('login_session');
		if (isset($data['session'])) {
			//Данные из БД
			$this->load->model('report_m');
			$data['work_teacher'] = $this->report_m->sel_work_teacher(NULL, NULL);

			$this->load->view('template/header');
			$this->load->view('template/sidebar_director', $data);
			$this->load->view('page/director/report_work_teacher');
			$this->load->view('template/footer');
		}
		else
		{
			redirect('main/index');
		}
	}

	//Фильтрование сведений о работе преподавателей за период
	public function filter_work_teacher()
	{
		if (!empty($_POST))
		{
			$date1 = $_POST['date1'];
			$date2 = $_POST['date2'];

			//Данные из БД
			$this->load->model('report_m');
			$data['work_teacher'] = $this->report_m->sel_work_teacher($date1, $date2);

			$str = '
			<table class="table table-hover table-sm" id="table_work_teacher">
            <thead class="table-dark">
                <tr>
					<th>№</th>
					<th>ФИО преподавателя</th>
					<th>Специальность</th>
					<th>Кол-во часов</th>
                </tr>
            </thead>
            <tbody>';
				$i=1; $label=''; $value='';
				foreach ($data['work_teacher'] as $row) {
					$label .= $row['full_name'].',';
					$str .= '<tr>
						<td>'.$i++.'</td>
						<td>'.$row['full_name'].'</td>
						<td>'.$row['profession'].'</td>';

						if ($row['sum_hour'] == NULL)
						{
							$value .= '0,';
							$str .= '<td><b>0</b></td>';
						}
						else
						{
							$value .= $row['sum_hour'].',';
							$str .= '<td><b>'.$row['sum_hour'].'</b></td>';
						}                  
					$str .= '</tr>';
                }
			$str .= '</tbody>
        </table>

		<!-- Сбор данных -->
        <input type="hidden" id="chart_label" value="'.$label.'">
        <input type="hidden" id="chart_value" value="'.$value.'">
		';
			echo $str;
		}
	}
}
