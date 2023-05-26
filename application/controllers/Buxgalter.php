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

	public function shic_op()
	{

	
		$ID_ep = $_POST['ID_ep'];

		

		$this->load->model('bufgalter_m');
		$showopres = $this->bufgalter_m->sel_rast($ID_ep);

		echo json_encode($showopres);


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
			// // echo $showopres; 
		//теперь делай расчет
		//Эти значения подставляй в формул
	     
		



		//давай поробуем сформировать результат как массив Имя=Значение посмотри формат json

			

		  $res1 = $_POST['raster1'] * $_POST['amount_hour']; // сумма оплатф труда преподавателей
		  $res2 = $res1  * $_POST['raster2'] / 100; //30% оплата труда администратор
		  $fond_opl_truda = $res1 + $res2; // сумма ЗП + оплата труда
		  $res3 = $fond_opl_truda * $_POST['raster3'] / 100; //страховка 30,2%
		  $res4 = $fond_opl_truda * $_POST['raster4'] / 100;  // отчисления на развитие 10%
		  $res5 = $fond_opl_truda * $_POST['raster5'] / 100; //отчисления для обеспечения 40%
		  $res6 = $fond_opl_truda * $_POST['raster6'] / 100; //хозяйственные  2%
		  $res7 =  $res1 + $res2 + $res3 + $res4 + $res5 + $res6 ; // общая сумма затрат
		  $res8 = $res7 * $_POST['raster8'] / 100; // прибыль 20% от общей суммы затрат
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



			
		}

	}



   

	
}
