<?php
class Edu_program_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    //Выбрать образовательную программу
    public function sel_edu_program($ID_focus)
    {
        $query = $this->db->join('focus', 'focus.ID_focus=e.ID_focus')
                          ->join('type_ep', 'type_ep.ID_type_ep=e.ID_type_ep')
                          ->join('form_teach', 'form_teach.ID_form=e.ID_form')
                          ->join('type_doc', 'type_doc.ID_type_doc=e.ID_type_doc')
                          ->where_in('e.ID_focus', $ID_focus)
                          ->get('edu_program as e');
        return $query->result_array();
    }
}