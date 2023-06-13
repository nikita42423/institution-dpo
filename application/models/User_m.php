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

      //проверка логина
      public function validation_registration($login)
      {
          $this->db->where('login', $login);
          $query = $this->db->get('users');
          return $query->result_array();
      }
  
      //добавление клиента с курсом
      public function add_client_statement($full_name, $login, $passwords, $phone, $email, $ID_course)
      {
          $data = array(
              'full_name' => $full_name,
              'login' => $login,
              'passwords' => $passwords,
              'phone' => $phone,
              'email' => $email,
              'ID_role' => 4
          );
          $this->db->insert('users', $data);
          $id = $this->db->insert_id();   //получить ID_user
          $data2 = array(
              'ID_user' => $id,
              'ID_course' => $ID_course,
              'status_application' => 'подана'
          );
          $this->db->insert('statement', $data2);
      }

      
    
}