<?php
class Report_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //Выбрать сведения о рейтинге образовательных программ ДПО за период
    public function sel_rating_ep()
    {
        $sql = '
        SELECT
            name_type_ep,
            name_focus,
            name_ep,
            COUNT(CASE WHEN date_payment IS NOT NULL THEN price END) AS count_price,
            SUM(CASE WHEN date_payment IS NOT NULL THEN price END) AS sum_price
        FROM (edu_program AS e, course AS c, price_edu AS p, type_ep AS t, focus AS f) LEFT JOIN statement AS s ON s.ID_course=c.ID_course
        WHERE c.ID_ep=e.ID_ep AND p.ID_ep=e.ID_ep AND e.ID_type_ep=t.ID_type_ep AND e.ID_focus=f.ID_focus
        GROUP BY name_ep, name_type_ep, name_focus
        ORDER BY sum_price DESC';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    //Выбрать сведения о работе преподавателей за период 
    public function sel_work_teacher()
    {
        $sql = '
        SELECT
            full_name,
            profession,
            SUM(amount_hour) AS sum_hour
        FROM users AS u LEFT JOIN workload AS w ON u.ID_user=w.ID_teacher LEFT JOIN discipline AS d ON w.ID_discipline=d.ID_discipline
        WHERE ID_role = 5
        GROUP BY full_name, profession
        ';
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}