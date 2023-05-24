<?php
class Discipline_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    //Выбрать дисциплину
    public function sel_discipline($ID_ep)
    {
        $query = $this->db->select('d.ID_discipline, name_discipline, d.amount_hour, amount_hour_work, type_mid_cert, type_practice, amount_hour_practice')
                          ->join('edu_program', 'd.ID_ep=edu_program.ID_ep')
                          ->where_in('d.ID_ep', $ID_ep)
                          ->get('discipline as d');
        return $query->result_array();
    }

    //Выполнить процедуру "Добавить учебный план (дисцилпину)"
    public function add_discipline($name_discipline, $ID_ep, $amount_hour, $amount_hour_work, $type_practice, $amount_hour_practice, $type_mid_cert)
    {
        $sql = "CALL add_discipline (?,?,?,?,?,?,?)";
        $this->db->query($sql, array($name_discipline, $ID_ep, $amount_hour, $amount_hour_work, $type_practice, $amount_hour_practice, $type_mid_cert));
    }

    //Удалить дисциплину
    public function del_discipline($ID_discipline)
    {
        $this->db->where('ID_discipline', $ID_discipline)
                 ->delete('discipline');
    }

    //Выполнить процедуру "Добавить учебный план (дисцилпину)"
    public function upd_discipline($ID_discipline, $name_discipline, $ID_ep, $amount_hour, $amount_hour_work, $type_practice, $amount_hour_practice, $type_mid_cert)
    {
        $sql = "CALL upd_discipline (?,?,?,?,?,?,?,?)";
        $this->db->query($sql, array($ID_discipline, $name_discipline, $ID_ep, $amount_hour, $amount_hour_work, $type_practice, $amount_hour_practice, $type_mid_cert));
    }
}

