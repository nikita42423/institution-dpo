<?php
class User_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //Выбрать пользователя
    public function sel_user($login, $passwords)
    {
        $this->db->select('*');
        $this->db->from('users',  'role');
        $this->db->from('role');
        $this->db->where('login',  $login);
        $this->db->where('passwords',  $passwords);
        $this->db->where('users.ID_role = role.ID_role');
        $query = $this->db->get();
        
        if($query->num_rows()==1)
        {
            return $query->row();
        }
        else 
        {
            return false;
        }
    }

    public function add_user($data)
    {
        $this->db->insert('users', $data);
    }

    public function kill_session()
    {
        $this->session->sess_destroy();
    }
    
}