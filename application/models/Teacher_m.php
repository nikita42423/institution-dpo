<?php
class Teacher_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    //Выбрать преподаватель
    public function sel_teacher($ID_focus)
    {
        $query = $this->db->join('focus as f', 'f.ID_focus=u.ID_focus')
                          ->where('ID_role', 5)
                          ->where_in('u.ID_focus', $ID_focus)
                          ->get('users as u');
        return $query->result_array();
    }

    //Выполнить процедуру "Добавить преподаватель"
    public function add_teacher($full_name, $login, $passwords, $profession, $work_exp, $ID_focus)
    {
        $sql = "CALL add_teacher (?,?,?,?,?,?)";
        $this->db->query($sql, array($full_name, $login, $passwords, $profession, $work_exp, $ID_focus));
    }

    //Удалить преподаватель
    public function del_teacher($data)
    {
        $this->db->delete('users', $data);
    }

    //Выполнить процедуру "Изменить преподаватель"
    public function upd_teacher($ID_user, $full_name, $login, $passwords, $profession, $work_exp)
    {
        $sql = "CALL upd_teacher (?,?,?,?,?,?)";
        $this->db->query($sql, array($ID_user, $full_name, $login, $passwords, $profession, $work_exp));
    }
}