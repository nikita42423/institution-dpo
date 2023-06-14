<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Email extends CI_Controller {

    public function send_email() {
        //Для отправки емайла
        $config['email'] = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.email.ru',
            'smtp_port' => 2525,
            'smtp_user' => 'nikita42423@bk.ru',
            'smtp_pass' => '',
            'mailtype' => 'html',
            'charset' => 'utf-8'
        );

        $this->load->library('email', $config);
        $this->email->from('nikita42423@bk.ru', 'nikita42423');
        $this->email->to('gosak12984@aaorsi.com');
        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');
        $this->email->send();
    }

    public function send_email_on_button_click() {
        if ($this->input->post('submit')) {
            $this->send_email();
            redirect('clients/lizcab');
        }
    }
}
