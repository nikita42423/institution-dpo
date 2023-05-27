<?php
class Client_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    //Выбрать образовательную программу
    public function sel_cours()
    {
        $query = $this->db->where('course.ID_ep = edu_program.ID_ep')
                          ->get('course, edu_program');
        return $query->result_array();
    }


    // пользователь для клиента (персональные данные)
    public function sel_user($ID_user)
    {
        $query = $this->db->where('users.ID_role = role.ID_role')
                            ->where('ID_user', $ID_user)
                          ->get('users, role');
       return $query->result_array();
    }


     //изменить данные клиента (персональные данные)
     public function upd_user($ID_user, $full_name, $phone, $address)
     {
         $data = array(
             'full_name' => $full_name,
             'phone' => $phone,
             'address' => $address
         );
         $this->db->where('ID_user', $ID_user);
 
         $query = $this->db->update('users', $data);
         return $query;
     }


      //добавление заявки клиента
    public function add_statement($ID_course, $ID_user)
    {
        $data = array(
            'ID_course' => $ID_course,
            'ID_student' => $ID_user,
            'status_application' => 'подана'
        );

        $query = $this->db->insert('statement', $data);
        return $query;
    }

    //история курсов клиента
    public function get_history_course($ID_user)
    {
        $query = $this->db->where('statement.ID_student =  users.ID_user')
                            ->where('statement.ID_course = course.ID_course')
                            ->where('course.ID_ep = edu_program.ID_ep')
                            ->where('edu_program.ID_focus = focus.ID_focus')
                            ->where('edu_program.ID_type_ep = type_ep.ID_type_ep')
                            ->where('ID_user', $ID_user)
                          ->get('statement, users, course, edu_program, focus, type_ep');
       return $query->result_array();
    }



     
    }