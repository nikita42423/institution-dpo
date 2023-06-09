<?php
class Bufgalter_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    


   public function sel_edu_program()
   {
    $query = $this->db //->where('price = 0')
                        ->get('edu_program');
    return $query->result_array();
   }

   
   public function sel_rast($ID_ep)
   {


    $query = $this->db->where('ID_ep', $ID_ep)
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


      //добавление данных прайса при расчете стоимости
    public function add_price($ID_ep, $cost_hour, $price, $date)
    {
        // $data = array(
        //     'date_end_price' => $date
        // );
        // //изменить старую, указать что у нее закончился срок действияИзменить надо срок окончания!!!!
        // $query = $this->db->update('price_edu', $data)
        //                   ->where('ID_ep', $ID_ep)
        //                   ->where('date_end_price', NULL);
        $sql = 'update price_edu set date_end_price =? where ID_ep = ? ';
        $this->db->query($sql, array($date, $ID_ep));
        //длбавить новую цену                  
        $data = array(
            'ID_ep' => $ID_ep,
            'cost_hour' => $cost_hour,
            'price' => $price,
            'date_start_price' => $date
        );

        $query = $this->db->insert('price_edu', $data);

       // return $query;
    }


    //информация о полученных доходах
    public function sel_sum( $date1, $date2)
    {
    //     $this->db->join('course', 'course.ID_course = s.ID_course')
    //                 ->join('edu_program', 'edu_program.ID_ep = course.ID_ep')
    //                 ->join('focus', 'focus.ID_focus = edu_program.ID_focus')
    //                 ->join('price_edu', 'price_edu.ID_ep = edu_program.ID_ep')
    //                 ->where_in('edu_program.ID_focus', $ID_focus)
    //                 ->where_in('edu_program.ID_ep', $ID_ep)
    //               // ->where_in('s.ID_course', $ID_course)
    //               ->where('(status_application = "обучение" OR status_application = "зачислена") AND date_payment IS NOT NULL');

    //     if($date1 != NULL) $this->db->where("date_payment >= '$date1'");
    //     if($date2 != NULL) $this->db->where("date_payment <= '$date2'");

        
    //     $this->db->select('name_course, name_ep, count_in_group, count(*) as count_people');  //кол-во записей
    //     $this->db->select_sum('price'); //сумма цены
    //     $this->db->group_by('name_course, name_ep, count_in_group');
    //   //  $this->db->group_by('name_ep');

    //     $query = $this->db->get('statement as s');
    
    $sql = 'SELECT actual_prices.ID_ep,name_ep,price,
            SUM(IF(date_start_teaching BETWEEN ? and ?, count_in_group,0)) as count_in_group,
             SUM(IF(date_payment BETWEEN ? and ?, 1,0)) as count_people,
              SUM(IF(date_payment BETWEEN ? and ?, price,0)) as price
            FROM actual_prices LEFT JOIN course ON actual_prices.id_ep = course.id_ep 
            LEFT JOIN statement ON statement.ID_course = course.ID_course
            GROUP BY ID_ep,name_ep,price';
    $query = $this->db->query($sql, array($date1, $date2, $date1, $date2, $date1, $date2));
  //  var_dump($date1,$date2);
        return $query->result_array();
        // return $this->db->last_query();
    }


    
    //история прайса
    public function history_price($ID_ep, $date1, $date2)
    {
        $this->db->join('edu_program', 'edu_program.ID_ep = p.ID_ep')
                ->where_in('edu_program.ID_ep', $ID_ep);

        if($date1 != NULL) $this->db->where("date_start_price >= '$date1'");
        if($date2 != NULL) $this->db->where("date_end_price  <= '$date2'");

        $query = $this->db->get('price_edu as p');
        return $query->result_array();
    }



      //изменение данных прайса
      public function add_pr($ID_ep, $cost_hour, $price, $date)
      {
          $data = array(
              'cost_hour' => $cost_hour,
              'price' => $price,
              'date_end_price' => $date
          );
          $this->db->where('ID_ep', $ID_ep);
          $this->db->where('date_end_price', NULL);
  
          $this->db->update('price_edu', $data);
  
  
          $arr = array(
              'ID_ep' => $ID_ep,
              'cost_hour' => NULL,
              'price' => NULL,
              'date_start_price' => $date
          );
          $this->db->insert('price_edu', $arr);
          // return $query;
      }


    

    
   
    

}
