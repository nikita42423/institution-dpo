<?php
class Focus_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    //Выбрать направление
    public function sel_focus()
    {
        $query = $this->db->get('focus');
        return $query->result_array();
    }

    //Добавить направление
    public function add_focus($data)
    {
        $this->db->insert('focus', $data);
    }

    //Удалить направление
    public function del_focus($data)
    {
        $this->db->delete('focus', $data);
    }

    //Изменить направление
    public function upd_focus($id, $data)
    {
        $this->db->where('ID_focus', $id)
                 ->update('focus', $data);
    }
}