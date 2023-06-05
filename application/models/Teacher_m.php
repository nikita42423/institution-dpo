<?php
class Teacher_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    //Выбрать преподаватель
    public function sel_teacher()
    {
        $query = $this->db->where('ID_role', 5)
                          ->get('users');
        return $query->result_array();
    }

    //Выполнить процедуру "Добавить преподаватель"
    public function add_teacher($full_name, $login, $passwrods, $profession, $work_exp)
    {
        $sql = "CALL add_teacher (?,?,?,?,?)";
        $this->db->query($sql, array($full_name, $login, $passwrods, $profession, $work_exp));
    }

    //Удалить преподаватель
    public function del_teacher($data)
    {
        $this->db->delete('users', $data);
    }

    //Выполнить процедуру "Изменить преподаватель"
    public function upd_teacher($ID_user, $full_name, $login, $passwrods, $profession, $work_exp)
    {
        $sql = "CALL upd_teacher (?, ?,?,?,?,?)";
        $this->db->query($sql, array($ID_user, $full_name, $login, $passwrods, $profession, $work_exp));
    }
}