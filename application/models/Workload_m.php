<?php
class Workload_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    //Выбрать нагрузку преподавателей
    public function sel_workload($ID_teacher)
    {
        $query = $this->db->select('full_name, name_course, short_name, date_start_teaching, date_end_teaching, name_discipline, d.amount_hour, w.ID_load')
                          ->join('users as u', 'w.ID_teacher=u.ID_user')
                          ->join('course as c', 'w.ID_course=c.ID_course')
                          ->join('discipline as d', 'w.ID_discipline=d.ID_discipline')
                          ->join('edu_program as e', 'd.ID_ep=e.ID_ep')
                          ->where_in('w.ID_teacher', $ID_teacher)
                          ->get('workload as w');
        return $query->result_array();
    }

    //Выбрать нераспределенные нагрузки преподавателей
    public function sel_no_workload($ID_focus)
    {
        $sql = "SELECT edu_program.ID_ep, course.ID_course, discipline.ID_discipline, 
        name_ep,  name_course, name_discipline,date_start_teaching, date_end_teaching,
        COALESCE( discipline.amount_hour, edu_program.amount_hour,  0) AS amount_hour, edu_program.ID_focus
        FROM edu_program LEFT JOIN course ON edu_program.ID_ep  = course.ID_ep 
        LEFT JOIN discipline ON discipline.ID_ep = edu_program.ID_ep
        WHERE NOT EXISTS (select * FROM workload WHERE workload.ID_course=course.ID_course AND workload.ID_discipline = discipline.ID_discipline AND ID_teacher IS NOT NULL)";
        if ($ID_focus != NULL) {$sql .= " AND id_focus=$ID_focus";}
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    //Добавить нагрузку преподавателей
    public function add_workload($data)
    {
        $this->db->insert('workload', $data);
    }

    //Удалить нагрузку преподавателей
    public function del_workload($data)
    {
        $this->db->delete('workload', $data);
    }
}