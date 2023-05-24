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


			// echo json_encode($_POST);
		    // $ID_ep = $_POST['ID_ep'];

			// $amount_hour = $_POST['amount_hour'];
			// $name_form = $_POST['name_form'];
			// $count_in_group = $_POST['count_in_group'];

			// $this->load->model('bufgalter_m');
			// $showopres = $this->bufgalter_m->sel_rast($ID_ep);

		//теперь делай расчет
		//Эти значения подставляй в формул
	     
		$res1 = $_POST['raster1'] * $_POST['amount_hour']; // сумма оплатф труда преподавателей
		$res2 = $res1  * $_POST['raster2'] / 100; //30% оплата труда администратор
		$fond_opl_truda = $res1 + $res2; // сумма ЗП + оплата труда
		$res3 = $fond_opl_truda * $_POST['raster3'] / 100; //страховка 30,2%
		$res4 = $fond_opl_truda * $_POST['raster4'] / 100;  // отчисления на развитие 10%
		$res5 = $fond_opl_truda * $_POST['raster5'] / 100; //отчисления для обеспечения 40%
		$res6 = $fond_opl_truda * $_POST['raster6'] / 100; //хозяйственные  2%
		$res7 =  $res1 + $res2 + $res3 + $res4 + $res5 + $res6 ; // общая сумма затрат
		$res8 = $res7 * $_POST['raster8']; // прибыль 20% от общей суммы затрат
		$res9 = $res8 +  $res7; //общая стоимость услуги
         
		$result = [];
		$result['res1'] = number_format($res1, 2, '.', '');
		$result['res2'] = number_format($res2, 2, '.', '');
		$result['res3'] = number_format($res3, 2, '.', '');
		$result['res4'] = number_format($res4, 2, '.', '');
		$result['res5'] = number_format($res5, 2, '.', '');
		$result['res6'] = number_format($res6, 2, '.', '');	
		$result['res7'] = number_format($res7, 2, '.', '');	
		$result['res8'] = number_format($res8, 2, '.', '');
		$result['res9'] = number_format($res9, 2, '.', '');

		// var_dump($result);
		echo json_encode($result);



		//давай поробуем сформировать результат как массив Имя=Значение посмотри формат json

		// 	$str = '
		// 	<form class="row g-3" action="" id="filtrbux" method="post">
		// 	<div class="col-md-3">
		// 	<label for="ID_ep" class="form-label">Образовательная программа</label>
		// 	<select class="form-select tt" id="ID_ep" name="form_teach">';
		// 		foreach ($showopres as $row) {
		// 						$str .= '<option value="'.$row['ID_ep'].'">'.$row['name_ep'].'</option>';
		// 					}
		// 	$str .='</select>
		//   </div>
		//   <div class="col-md-2" data-bs-target="#modal_ep">
		// 	<label for="amount_hour" class="form-label">Кол-во часов</label>
		// 	<input type="text" class="form-control" id="amount_hour" value="'.$row['amount_hour'].'" id="amount_hour" name=""  disabled>
		//   </div>
		//   <div class="col-md-2" data-bs-target="#modal_ep">
		// 	<label for="name_form" class="form-label">Форма обучения</label>
		// 	<input type="text" class="form-control" id="name_form" value="'.$row['name_form'].'"  id="ID_form" disabled>
		//   </div>
		//   <div class="col-md-2" data-bs-target="#modal_ep">
		// 	<label for="count_in_group" class="form-label">Человек</label>
		// 	<input type="text" class="form-control" id="count_in_group" value="'.$row['count_in_group'].'" id="count_in_group" disabled>
		//   </div>
		//   </form>
		// 	';

		//   echo $str;



		//   $scr1 = '
		//   <div class="data_table">
		// 			<table id="example" class="table table-striped" style="width:100%">
		// 				<thead>
		// 					<tr>
		// 						<th>СТАТЬИ ЗАТРАТ</th>
		// 						<th></th>
		// 						<th>СУММА</th>
							
		// 					</tr>
		// 				</thead>
		// 				<tbody>
		// 					<tr>
		// 						<td>Оплата труда преподавателей из расчета стоимости 1 учебного часа работы преподавателя в сумме _____________ руб </td>
		// 						<td> <div class="col-md-4">
        //                              <input type="text" class="form-control rechert" id="raster1" value="0">
        //                              </div></td>  <td><p id="'.$res1.'"></p></td>
								
								
		// 					</tr>
        //                     <tr>
		// 						<td>Оплата труда административно-управленческого и вспомогательного персонала из расчета 30% от суммы оплата труда преподавателей, руб</td>
		// 						<td> <div class="col-md-4">
        //                              <input type="text" class="form-control rechert" id="raster2" value="30">
        //                              </div></td>  <td><p id="'.$res2.'"></p></td>
								
		// 					</tr>
        //                     <tr>
		// 						<td>Страховые взносы в размере 30,2% от фонда оплаты труда, руб</td>
		// 						<td> <div class="col-md-4">
        //                              <input type="text" class="form-control rechert" id="raster3" value="30,2"> 
        //                              </div></td>  <td><p id="'.$res3.'"></p></td>
								
		// 					</tr>
        //                     <tr>
		// 						<td>Отчисления на развитие учебно-материальной базы учреждения в размере 10% от фонда оплаты труда, руб</td>
		// 						<td> <div class="col-md-4">
        //                              <input type="text" class="form-control rechert" id="raster4"  value="10">
        //                              </div></td>  <td><p id="'.$res4.'"></p></td>
								
		// 					</tr>
        //                     <tr>
		// 						<td>Отчисления для обеспечения деятельности платной услуги в размере 40% от фонда оплаты труда, руб</td>
		// 						<td> <div class="col-md-4">
        //                              <input type="text" class="form-control rechert" id="raster5" value="40">
        //                              </div></td>  <td><p id="'.$res5.'"></p></td>
								
		// 					</tr>
        //                     <tr>
		// 						<td>Хозяйственные и канцелярские расходы в размере 2% от фонда оплаты труда, руб</td>
		// 						<td> <div class="col-md-4">
        //                              <input type="text" class="form-control rechert" id="raster6" value="2">
        //                              </div></td>  <td><p id="'.$res6.'"></p></td>
								
		// 					</tr>
        //                     <tr>
		// 						<td>Общая сумма затрат, руб</td>
		// 						<td> <div class="col-md-4">
        //                              <input type="text" class="form-control rechert" id="raster7" value="0">
        //                              </div></td>  <td><p id="'.$res7.'"></p></td>
								
		// 					</tr>
        //                     <tr>
		// 						<td>Прибыль (20% от общей суммы затрат), руб</td>
		// 						<td> <div class="col-md-4">
        //                              <input type="text" class="form-control rechert" id="raster8" value="0">
        //                              </div></td>  <td><p id="'.$res8.'"></p></td>
								
		// 					</tr>
        //                     <tr>
		// 						<td>Общая стоимость услуги, руб</td>
		// 						<td> <div class="col-md-4">
        //                              <input type="text" class="form-control rechert" id="raster9" value="0">
        //                              </div></td>  <td><p id="'.$res9.'"></p></td>
								
		// 					</tr>
							
		// 				</tbody>
		// 			</table>
		// 		</div>
		//   ';

		//   echo $scr1;
			
		}

	}



   

	
}
