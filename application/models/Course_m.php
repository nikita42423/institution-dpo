<?php
class Course_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    //Выбрать курс
    public function sel_course($ID_ep, $ID_focus)
    {
        $sql = '
        SELECT
            COUNT(CASE WHEN status_application = "подана" AND date_payment IS NOT NULL THEN 1 END) AS count1,
            COUNT(CASE WHEN status_application = "зачислена" THEN 1 END) AS count2,
            COUNT(CASE WHEN status_application = "окончена" THEN 1 END) AS count3,
            c.ID_course,
            name_course,
            short_name,
            name_focus,
            name_type_ep,
            count_in_group,
            date_start_teaching,
            date_end_teaching,
            c.ID_ep,
            name_ep,
            edu_program.ID_focus,
            status_course
        FROM course AS c
        	LEFT JOIN statement as s ON s.ID_course=c.ID_course
        	LEFT JOIN edu_program ON c.ID_ep=edu_program.ID_ep
            LEFT JOIN focus ON edu_program.ID_focus=focus.ID_focus
            LEFT JOIN type_ep ON edu_program.ID_type_ep=type_ep.ID_type_ep
        WHERE 1=1 ';
        if (!empty($ID_ep)) {$sql .= 'AND c.ID_ep='.$ID_ep.' ';}
        if (!empty($ID_focus)) {$sql .= 'AND edu_program.ID_focus='.$ID_focus.' ';}
        $sql .= 'GROUP BY c.ID_course, c.ID_ep, name_course, short_name, name_focus, name_type_ep, count_in_group';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    //Добавить график курсов
    public function add_course($name_course, $ID_ep, $date_start_teaching, $date_end_teaching)
    {
        $object = array(
            'name_course' => $name_course,
            'ID_ep' => $ID_ep,
            'date_start_teaching' => $date_start_teaching,
            'date_end_teaching' => $date_end_teaching,
            'status_course' => 'Запланирован'
        );
        $this->db->insert('course', $object);
    }

    //Обновить статус курсов
    public function end_course()
    {
        $this->db->set('status_course', 'Архив')
                 ->where('status_course', 'Запланирован')
                 ->or_where('status_course', 'Обучение')
                 ->or_where('status_course', 'Окончен')
                 ->update('course');
    }
    
    //Список курсов по ОП
    public function filter_ep($ID_ep)
    {
        $query = $this->db->where_in('ID_ep', $ID_ep)
                            ->get('course');
        return $query->result_array();
    }

    //Изменить курсов
    public function upd_course($ID_course, $date1, $date2)
    {
        $this->db->set('date_start_teaching', $date1)
                 ->set('date_end_teaching', $date2)
                 ->where('ID_course', $ID_course)
                 ->update('course');
    }

    //Удалить курс
    public function del_course($ID_course)
    {
        $this->db->where('ID_course', $ID_course)
                 ->delete('course');
    }

    //Добавить один курс
    public function add_one_course($data)
    {
        $this->db->insert('course', $data);
    }
}