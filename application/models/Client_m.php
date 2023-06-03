<?php
class Client_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    //Выбрать образовательную программу (не так)
    public function sel_cours()
    {
        $query = $this->db->where('course.ID_ep = edu_program.ID_ep')
                          ->where('price_edu.ID_ep = edu_program.ID_ep')
                          ->get('course, edu_program, price_edu');
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


    
    //Выбрать курс
    public function sel_course($ID_focus, $ID_form, $date1, $date2)
    {
        $this->db->join('focus', 'focus.ID_focus=e.ID_focus')
                          ->join('form_teach', 'form_teach.ID_form=e.ID_form')
                          ->join('price_edu', 'price_edu.ID_ep=e.ID_ep')          //отображение цены
                          ->where_in('e.ID_focus', $ID_focus)
                          ->where_in('e.ID_form', $ID_form)
                          ->where('c.ID_ep = e.ID_ep');
                          if($date1 != NULL) $this->db->where("c.date_start_teaching <= '$date1'");
                          if($date2 != NULL) $this->db->where("c.date_end_teaching >= '$date2'");
                          $query = $this->db->get('edu_program as e, course as c');
        return $query->result_array();
    }


     
    }