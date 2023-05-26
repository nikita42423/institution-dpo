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
                          ->where_in('e.ID_focus', $ID_focus)
                          ->where_in('e.ID_type_ep', $ID_type_ep)
                          ->where_in('e.ID_form', $ID_form)
                          ->where_in('e.ID_type_doc', $ID_type_doc)
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
    public function add_edu_program($name_ep, $ID_focus, $ID_type_ep, $ID_form, $time_week, $amount_hour, $ID_type_doc, $type_cert, $name_profession, $count_in_group)
    {
        $sql = "CALL add_program (?,?,?,?,?,?,?,?,?,?)";
        $this->db->query($sql, array($name_ep, $ID_focus, $ID_type_ep, $ID_form, $time_week, $amount_hour, $ID_type_doc, $type_cert, $name_profession, $count_in_group));
        
        $query = $this->db->select('ID_ep')
                          ->order_by('ID_ep', 'ASC')
                          ->get('edu_program');
        $row = $query->last_row();  //Получить последнюю запись из таблицы
        return $row->ID_ep;         //Возвращает ИД из последней записи
    }
}