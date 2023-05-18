<?php
class Info_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    //Выбрать
    public function sel_info()
    {
        $query = $this->db->get('type_ep');
        return $query->result_array();
    }

    //Добавить
    public function add_info($data)
    {
        $this->db->insert('type_ep', $data);
    }

    //Удалить
    public function del_info($data)
    {
        $this->db->delete('type_ep', $data);
    }

    //Изменить
    public function upd_info($id, $data)
    {
        $this->db->where('ID_type_ep', $id)
                 ->update('type_ep', $data);
    }
}