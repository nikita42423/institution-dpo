<?php
class Edu_program_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    //Выбрать образовательную программу
    public function sel_edu_program($ID_focus, $ID_type_ep, $ID_form, $ID_type_doc)
    {
        $query = $this->db->join('focus', 'focus.ID_focus=e.ID_focus')
                          ->join('type_ep', 'type_ep.ID_type_ep=e.ID_type_ep')
                          ->join('form_teach', 'form_teach.ID_form=e.ID_form')
                          ->join('type_doc', 'type_doc.ID_type_doc=e.ID_type_doc')
                          ->join('price_edu', 'price_edu.ID_ep=e.ID_ep', 'left')
                          ->where_in('e.ID_focus', $ID_focus)
                          ->where_in('e.ID_type_ep', $ID_type_ep)
                          ->where_in('e.ID_form', $ID_form)
                          ->where_in('e.ID_type_doc', $ID_type_doc)
                          ->where('date_end_price', NULL)
                          ->get('edu_program as e');
        return $query->result_array();
    }

    //Выбрать образовательную программу (возвращает только одну строку)
    public function sel_edu_program_one($ID_ep)
    {
        $query = $this->db->where('ID_ep', $ID_ep)
                          ->get('edu_program');
        return $query->row();
    }

    //Выполнить процедуру "Добавить образовательную программу"
    public function add_edu_program($name_ep, $ID_focus, $ID_type_ep, $ID_form, $time_week, $amount_hour, $ID_type_doc, $type_cert, $name_profession, $count_in_group, $short_name)
    {
        $sql = "CALL add_program (?,?,?,?,?,?,?,?,?,?,?)";
        $this->db->query($sql, array($name_ep, $ID_focus, $ID_type_ep, $ID_form, $time_week, $amount_hour, $ID_type_doc, $type_cert, $name_profession, $count_in_group, $short_name));
        
        $query = $this->db->select('ID_ep')
                          ->order_by('ID_ep', 'ASC')
                          ->get('edu_program');
        $row = $query->last_row();  //Получить последнюю запись из таблицы
        
        $datetime = new DateTime();
        $now = $datetime->format('Y-m-d');
        $this->db->query("INSERT INTO price_edu(ID_ep, date_start_price) VALUES ('$row->ID_ep','$now')");

        return $row->ID_ep;         //Возвращает ИД из последней записи
    }

    //Выполнить процедуру "Изменить образовательную программу"
    public function upd_edu_program($name_ep, $ID_focus, $ID_type_ep, $ID_form, $time_week, $amount_hour, $ID_type_doc, $type_cert, $name_profession, $count_in_group, $ID_ep, $short_name)
    {
        $sql = "CALL upd_edu_program (?,?,?,?,?,?,?,?,?,?,?,?)";
        $this->db->query($sql, array($name_ep, $ID_focus, $ID_type_ep, $ID_form, $time_week, $amount_hour, $ID_type_doc, $type_cert, $name_profession, $count_in_group, $ID_ep, $short_name));
    }

    //Выбрать образовательную программу для курсов
    public function sel_edu_program_for_course()
    {
        $query = $this->db->get('edu_program');
        return $query->result_array();
    }

    //список ОП по направлению
    public function filter_focus($ID_focus)
    {
        $query = $this->db->where_in('ID_focus', $ID_focus)
                            ->get('edu_program');
        return $query->result_array();
    }

     
}