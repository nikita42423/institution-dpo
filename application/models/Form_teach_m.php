<?php
class Form_teach_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    //Выбрать форму обучения
    public function sel_form_teach()
    {
        $query = $this->db->get('form_teach');
        return $query->result_array();
    }

    //Добавить форму обучения
    public function add_form_teach($data)
    {
        $this->db->insert('form_teach', $data);
    }

    //Удалить форму обучения
    public function del_form_teach($data)
    {
        $this->db->delete('form_teach', $data);
    }

    //Изменить форму обучения
    public function upd_form_teach($id, $data)
    {
        $this->db->where('ID_form', $id)
                 ->update('form_teach', $data);
    }
}