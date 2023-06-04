<?php
class Bufgalter_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    


   public function sel_edu_program()
   {
    $query = $this->db //->where('price = 0')
                     ->where('edu_program.ID_form = form_teach.ID_form')
                     ->get('edu_program, form_teach');
    return $query->result_array();
   }

   
   public function sel_rast($ID_ep)
   {
    $query = $this->db->where('ID_ep', $ID_ep)
                      ->where('edu_program.ID_form = form_teach.ID_form')
                      ->get('edu_program, form_teach');
    return $query->row_array();
   }

     //отображение всех направлений
     public function sel_focus()
     {
      $query = $this->db->get('focus');
      return $query->result_array();
     }
 
     //отображение всех ДПО при выборе направления
     public function sel_focus_edu($ID_focus)
     {
      $query = $this->db->where('ID_focus', $ID_focus)
                        ->get('edu_program');
      return $query->result_array();
     }


         //вывод пустых price
    public function sel_price_null()
    {
        $query = $this->db->join('form_teach', 'form_teach.ID_form=edu_program.ID_form')
                        ->where('edu_program.ID_ep = price_edu.ID_ep')
                        ->where('price = 0 AND cost_hour = 0')
                        ->get('edu_program, price_edu');
        return $query->result_array();
    }


      //добавление данных прайса
    public function add_price($ID_ep, $cost_hour, $price, $date)
    {
        $data = array(
            'ID_ep' => $ID_ep,
            'cost_hour' => $cost_hour,
            'price' => $price,
            'date_start_price' => $date
        );

        $query = $this->db->insert('price_edu', $data);
        return $query;
    }

    //изменить данные прайса
    public function upd_price($ID_ep, $cost_hour, $price, $date)
    {
        $data = array(
            'cost_hour' => $cost_hour,
            'price' => $price,
            'date_start_price' => $date
        );
        $this->db->where('ID_ep', $ID_ep);


        $query = $this->db->update('price_edu', $data);
        return $query;
    }


    //информация о полученных доходах
    public function sel_sum($ID_focus, $ID_ep, $ID_course, $date1, $date2)
    {
        $this->db->join('course', 'course.ID_course = s.ID_course')
                    ->join('edu_program', 'edu_program.ID_ep = course.ID_ep')
                    ->join('focus', 'focus.ID_focus = edu_program.ID_focus')
                    ->join('price_edu', 'price_edu.ID_ep = edu_program.ID_ep')
                    ->where_in('edu_program.ID_focus', $ID_focus)
                    ->where_in('edu_program.ID_ep', $ID_ep)
                    ->where_in('s.ID_course', $ID_course)
                    ->where('status_application = "обучение" AND date_payment IS NOT NULL');

        if($date1 != NULL) $this->db->where("date_payment <= '$date1'");
        if($date2 != NULL) $this->db->where("date_payment >= '$date2'");

        $this->db->select('*');
        $this->db->select('count(*) as count_people');  //кол-во записей
        $this->db->select_sum('price'); //сумма цены
        $this->db->group_by('name_ep');

        $query = $this->db->get('statement as s');
        return $query->result_array();
        // return $this->db->last_query();
    }

    
   
    

}
