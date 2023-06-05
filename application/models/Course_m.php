<?php
class Course_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    //Выбрать курс
    public function sel_course($ID_ep)
    {
        $query = $this->db->join('edu_program as p', 'c.ID_ep=p.ID_ep')
                          ->where_in('c.ID_ep', $ID_ep)
                          ->get('course as c');
        return $query->result_array();
    }
    
    //Добавить график курсов
    public function add_course($name_course, $ID_ep, $date_start_teaching, $date_end_teaching)
    {
        $object = array(
            'name_course' => $name_course,
            'ID_ep' => $ID_ep,
            'date_start_teaching' => $date_start_teaching,
            'date_end_teaching' => $date_end_teaching
        );
        $this->db->insert('course', $object);
    }
}