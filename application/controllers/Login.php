
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

	public function index()
	{
        $this->load->view('template/header.php');
	    $this->load->view('template/navbar_main.php');
		$this->load->view('page/login.php');
	    $this->load->view('template/footer.php');
	}
}