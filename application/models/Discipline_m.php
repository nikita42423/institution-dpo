<?php
class Discipline_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    //Выбрать дисциплину
    public function sel_discipline($ID_ep)
    {
        $query = $this->db->join('edu_program', 'd.ID_ep=edu_program.ID_ep')
                          ->where_in('d.ID_ep', $ID_ep)
                          ->get('discipline as d');
        return $query->result_array();
    }

    //Выполнить процедуру "Добавить учебный план (дисцилпину)"
    public function add_discipline($name_discipline, $ID_ep, $amount_hour, $amount_hour_work, $type_mid_cert, $type_practice, $amount_hour_practice)
    {
        $sql = "CALL add_discipline (?,?,?,?,?,?,?)";
        $this->db->query($sql, array($name_discipline, $ID_ep, $amount_hour, $amount_hour_work, $type_mid_cert, $type_practice, $amount_hour_practice));
    }
}

