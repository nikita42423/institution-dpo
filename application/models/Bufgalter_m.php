<?php
class Client_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    //Выбрать образовательную программу
    public function sel_bux()
    {
        $query = $this->db->get('form_teach');
        return $query->result_array();
    }
}