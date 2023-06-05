<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workload extends CI_Controller {

    //Просмотр нагрузки преподавателя
	public function browse()
	{
		//Данные из БД
		$this->load->model('workload_m');
		$data['workload'] = $this->workload_m->sel_workload(NULL);

		$this->load->view('template/header');
        $this->load->view('template/sidebar');
		$this->load->view('page/methodist/filter_workload', $data);
		$this->load->view('page/methodist/workload');
		$this->load->view('template/footer');
	}
}
