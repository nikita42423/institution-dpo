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
            'date_end_teaching' => $date_end_teaching
        );
        $this->db->insert('course', $object);
    }

    //Очистить график курсов
    public function empty_course()
    {
        $this->db->empty_table('course');
    }
    
    //Список курсов по ОП
    public function filter_ep($ID_ep)
    {
        $query = $this->db->where_in('ID_ep', $ID_ep)
                            ->get('course');
        return $query->result_array();
    }

    
}