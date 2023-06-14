<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buxgalter extends CI_Controller {

	public function index()
	{
		//Сессия
		$data['session'] = $this->session->userdata('login_session');
		$session=$data['session'];
		$ID_user = $session['ID_user'];

		if (isset($data['session']))
		{
			$this->load->model('bufgalter_m');
			$data['edu_program'] = $this->bufgalter_m->sel_price_null();
		

			$this->load->view('template/header.php');
			$this->load->view('page/buxgalter.php',  $data);
		}
		else
		{
			redirect('main/index');
		}
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
		//Эти значения подставляй в формул

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

		  echo json_encode($result);
		
		}

	}


	//изменение выпадающего списка программы (Бухгалтера)
	public function edit_select()
	{
		$check_price = $_POST['check_price'];
		$this->load->model('bufgalter_m');

		//если выбран price = 0
		if($check_price == 'true') $result = $this->bufgalter_m->sel_price_null();
		//если не price = 0
		else if($check_price == 'false') $result = $this->bufgalter_m->sel_edu_program();

		echo json_encode($result);
	}


	//изменение или добавление цены
	public function edit_price()
	{
		$ID_ep = $_POST['ID_ep'];
		$cost_hour = $_POST['cost_hour'];
		$price = $_POST['price'];
		$date = $_POST[date('Y-m-d')];
		$date = $_POST[date('Y-m-d')];

		$check_price = $_POST['check_price'];
		
		$this->load->model('bufgalter_m');
		// if($check_price == 'true')
		// {
		// 	$showopres = $this->bufgalter_m->upd_price($ID_ep, $cost_hour, $price, $date);
		// 	if($showopres != TRUE) echo json_encode('Изменение не выполнено!');
		// }
		// else if($check_price == 'false')
		// {
			$showopres = $this->bufgalter_m->add_price($ID_ep, $cost_hour, $price, $date);
			if($showopres != TRUE) echo json_encode('Изменение не выполнено!');
		// }
	}


    //история прайса
	public function posmotr_bux()
	{
         //Сессия
         $data['session'] = $this->session->userdata('login_session');
         $session=$data['session'];
         $ID_user = $session['ID_user'];

		 $this->load->model('bufgalter_m');
		 $data['edu_program'] = $this->bufgalter_m->sel_edu_program();
		 $data['history'] = $this->bufgalter_m->history_price(NULL, NULL, NULL);

		$this->load->view('template/header.php');
		$this->load->view('page/buxgalter3.php',  $data);

	}
   

	//фильтрация и вывод для просмотра истории прайса
	public function filter_history()
	{
		$ID_ep = $_POST['ID_ep'];
		$date1 = $_POST['date1'];
		$date2 = $_POST['date2'];

		if($ID_ep == 'all') $ID_ep = NULL;
		if(empty($date1)) $date1 = NULL;
		if(empty($date2)) $date2 = NULL;

		$this->load->model('bufgalter_m');
		$result = $this->bufgalter_m->history_price($ID_ep, $date1, $date2);

		echo json_encode($result);
	}


	
}
