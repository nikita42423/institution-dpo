<?php
class Schedule_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    //Выбрать вид документа
    public function sel_course()
    {
        $query = $this->db->join('edu_program as p', 'c.ID_ep=p.ID_ep')
                          ->get('course as c');
        return $query->result_array();
    }

}