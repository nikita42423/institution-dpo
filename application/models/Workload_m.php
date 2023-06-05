<?php
class Workload_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    //Выбрать нагрузку преподавателей
    public function sel_workload($ID_teacher)
    {
        $query = $this->db->select('name_course, short_name, date_start_teaching, date_end_teaching, name_discipline, d.amount_hour, w.ID_load')
                          ->join('users as u', 'w.ID_teacher=u.ID_user')
                          ->join('course as c', 'w.ID_course=c.ID_course')
                          ->join('discipline as d', 'w.ID_discipline=d.ID_discipline')
                          ->join('edu_program as e', 'd.ID_ep=e.ID_ep')
                          ->where_in('w.ID_teacher', $ID_teacher)
                          ->get('workload as w');
        return $query->result_array();
    }

    //Удалить нагрузку преподавателей
    public function del_workload($data)
    {
        $this->db->delete('workload', $data);
    }
}