<?php
class Report_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //Выбрать сведения о количестве обучающихся на курсах
    public function sel_count_student()
    {
        $sql = '
        SELECT name_ep, edu_program.id_ep, short_name,
            SUM(CASE WHEN status_application="зачислена" THEN 1 ELSE 0 END) AS `count1`,
            SUM(CASE WHEN status_application="обучение" THEN 1 ELSE 0 END) AS `count2`,
            SUM(CASE WHEN status_application="окончена" THEN 1 ELSE 0 END) AS `count3`,
            SUM(CASE WHEN status_application="подана" THEN 1 ELSE 0 END) AS `count4`
        FROM edu_program LEFT JOIN course ON edu_program.ID_ep=course.ID_ep LEFT JOIN statement ON course.ID_course=statement.ID_course
        GROUP BY name_ep, edu_program.id_ep, short_name';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    //Выбрать сведения о рейтинге образовательных программ ДПО за период
    public function sel_rating_ep($date1, $date2)
    {
        $sql = '
        SELECT
            name_type_ep,
            name_focus,
            name_ep,
            COUNT(CASE WHEN ';

            if (!empty($date1)) {$sql .= 'date_payment >= "'.$date1.'" ';} else {$sql .= 'date_payment IS NOT NULL ';}
            if (!empty($date2)) {$sql .= 'AND date_payment <= "'.$date2.'" ';} else {$sql .= 'AND date_payment IS NOT NULL ';}

            $sql .= 'THEN price END) AS count_price,
            SUM(CASE WHEN ';

            if (!empty($date1)) {$sql .= 'date_payment >= "'.$date1.'" ';} else {$sql .= 'date_payment IS NOT NULL ';}
            if (!empty($date2)) {$sql .= 'AND date_payment <= "'.$date2.'" ';} else {$sql .= 'AND date_payment IS NOT NULL ';}

            $sql .= 'THEN price END) AS sum_price
        FROM (edu_program AS e, course AS c, price_edu AS p, type_ep AS t, focus AS f) LEFT JOIN statement AS s ON s.ID_course=c.ID_course
        WHERE c.ID_ep=e.ID_ep AND p.ID_ep=e.ID_ep AND e.ID_type_ep=t.ID_type_ep AND e.ID_focus=f.ID_focus
        GROUP BY name_ep, name_type_ep, name_focus
        ORDER BY sum_price DESC';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    //Выбрать сведения о работе преподавателей за период 
    public function sel_work_teacher($date1, $date2)
    {
        $sql = '
        SELECT
            full_name,
            profession,
            SUM(CASE WHEN ';

            if (!empty($date1)) {$sql .= 'date_start_teaching >= "'.$date1.'" ';} else {$sql .= 'date_start_teaching IS NOT NULL ';}
            if (!empty($date2)) {$sql .= 'AND date_start_teaching <= "'.$date2.'" ';} else {$sql .= 'AND date_start_teaching IS NOT NULL ';}

            $sql .= 'THEN amount_hour END) AS sum_hour
        FROM users AS u LEFT JOIN (workload AS w, discipline AS d, course AS c)
            ON u.ID_user=w.ID_teacher AND w.ID_discipline=d.ID_discipline AND w.ID_course=c.ID_course
        WHERE ID_role = 5
        GROUP BY full_name, profession
        ';
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}

