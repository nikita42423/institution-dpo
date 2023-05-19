<?php
class Client_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    //Выбрать образовательную программу
    public function sel_cours()
    {
        $query = $this->db->get('edu_program');
        return $query->result_array();
    }
}