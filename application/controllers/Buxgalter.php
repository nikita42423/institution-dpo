<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buxgalter extends CI_Controller {

	public function index()
	{
         //Сессия
         $data['session'] = $this->session->userdata('login_session');
         $session=$data['session'];
         $ID_user = $session['ID_user'];

		 $this->load->model('bufgalter_m');
		 $data['edu_program'] = $this->bufgalter_m->sel_edu_program();
	

		$this->load->view('template/header.php');
		$this->load->view('page/buxgalter.php',  $data);

	}

	public function show_rachet()
	{
		if (!empty($_POST))
		{

			var_dump($_POST);
			$ID_ep = $_POST['ID_ep'];

			$amount_hour = $_POST['amount_hour'];
			$name_form = $_POST['name_form'];
			$count_in_group = $_POST['count_in_group'];

			// $this->load->model('bufgalter_m');
			// $showopres = $this->bufgalter_m->sel_rast($ID_ep);
		//теперь делай расчет
		//Эти значения подставляй в формул
	     
		$res1 = $_POST['raster1'] * $_POST['amount_hour']; // сумма оплатф труда преподавателей
		$res2 = $res1  * $_POST['raster2'] / 100;
		$fond_opl_truda = $res1 + $res2;
		$res3 = $fond_opl_truda * $_POST['raster3'] / 100;
		$otch_uzh = $fond_opl_truda;
		$res4 = $otch_uzh * $_POST['raster4'] / 100;
		$xozeh = $fond_opl_truda;
		$res5 = $xozeh *  $_POST['raster5'] / 100;
		$res6 = $_POST[''];
		$res7 = $_POST[''];
		$res1 = $_POST[''];
		$res9 = $_POST[''];


		//давай поробуем сформировать результат как массив Имя=Значение посмотри формат json

			$str = '
			<form class="row g-3" action="" id="filtrbux" method="post">
			<div class="col-md-3">
			<label for="validationDefault04" class="form-label">Образовательная программа</label>
			<select class="form-select tt" id="validationDefault04opt" name="form_teach">';
				foreach ($showopres as $row) {
								$str .= '<option value="'.$row['ID_ep'].'">'.$row['name_ep'].'</option>';
							}
			$str .='</select>
		  </div>
		  <div class="col-md-2" data-bs-target="#modal_ep">
			<label for="disabledTextInput" class="form-label">Кол-во часов</label>
			<input type="text" class="form-control" id="disabledTextInput" value="'.$row['amount_hour'].'" id="amount_hour" name=""  disabled>
		  </div>
		  <div class="col-md-2" data-bs-target="#modal_ep">
			<label for="disabledTextInput" class="form-label">Форма обучения</label>
			<input type="text" class="form-control" id="disabledTextInput" value="'.$row['name_form'].'"  id="ID_form" disabled>
		  </div>
		  <div class="col-md-2" data-bs-target="#modal_ep">
			<label for="disabledTextInput" class="form-label">Человек</label>
			<input type="text" class="form-control" id="disabledTextInput" value="'.$row['count_in_group'].'" id="count_in_group" disabled>
		  </div>
		  </form>
			';

			//echo $str;
			
		}

	}



   

	
}
