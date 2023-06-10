<?php
class Statement_m extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //отображение заявки
    public function sel_statement($ID_focus, $ID_form, $status)
    {
        $this->db->join('users', 'users.ID_user = s.ID_user')
                        ->join('course', 'course.ID_course = s.ID_course')
                        ->join('edu_program', 'edu_program.ID_ep = course.ID_ep')
                        ->join('focus', 'focus.ID_focus = edu_program.ID_focus')
                        ->join('form_teach', 'form_teach.ID_form = edu_program.ID_form')
                        ->join('type_doc', 'type_doc.ID_type_doc = edu_program.ID_type_doc')
                        ->where_in('edu_program.ID_focus', $ID_focus)
                        ->where_in('edu_program.ID_form', $ID_form);
        if($status != NULL) $this->db->where_in('s.status_application', $status);

        $query = $this->db->get('statement as s');
        return $query->result_array();
    }

    //отображение заявки - зачислена
    public function sel_accepted($ID_course, $ID_ep)
    {
        $this->db->join('users', 'users.ID_user = s.ID_user')
                        ->join('course', 'course.ID_course = s.ID_course')
                        ->join('edu_program', 'edu_program.ID_ep = course.ID_ep')
                        ->where_in('s.ID_course', $ID_course)
                        ->where_in('edu_program.ID_ep', $ID_ep)
                        ->where('status_application = "зачислена"');

        $query = $this->db->get('statement as s');
        return $query->result_array();
    }

    //изменение заявки - зачислена -> обучение
    public function update_accepted($ID_application)
    {
        $data = array(
            'status_application' => 'обучение'
        );
        $this->db->where('ID_application', $ID_application);

        $query = $this->db->update('statement', $data);
        return $query;
    }

    //прием заявки = зачислена
    public function success_application($ID_application)
    {
        $today = date('Y-m-d');
        $data = array(
            'status_application' => 'зачислена',
            'date_payment' => $today,
            'date_contract' => $today,
        );
        $this->db->where('ID_application', $ID_application);

        $query = $this->db->update('statement', $data);
        return $query;
    }

     //удаление заявки
    public function delete_application($ID_application)
    {
        $this->db->where('ID_application', $ID_application);

        $query = $this->db->delete('statement');
        return $query;
    }

    
    //отображение заявки об окончании
    public function sel_end($ID_course, $ID_ep, $status)
    {
        $this->db->join('users', 'users.ID_user = s.ID_user')
                        ->join('course', 'course.ID_course = s.ID_course')
                        ->join('edu_program', 'edu_program.ID_ep = course.ID_ep')
                        ->where_in('course.ID_course', $ID_course)
                        ->where_in('edu_program.ID_ep', $ID_ep);

                        if($status != NULL) $this->db->where('status_application', $status);
                        else{
                            $this->db->where('(status_application = "обучение"');
                            $this->db->or_where('status_application = "окончена")');
                        }

        $query = $this->db->get('statement as s');
        return $query->result_array();
        // return $this->db->last_query();
    }

    //изменение дока об окончании обучения
    public function update_end($ID_application, $series_doc, $date_give)
    {
        $today = date('Y-m-d'); //текущая дата
        $data = array(
            'status_application' => 'окончена',
            'status_doc' => 'подтвержденный',
            'date_end' => $today,
            'series_doc' => $series_doc,
            'date_give' => $date_give,
        );
        $this->db->where('ID_application', $ID_application);

        $query = $this->db->update('statement', $data);
        return $query;
    }

    //изменение статуса документа
    public function update_status_doc($ID_application, $status_doc)
    {
        $data = array(
            'status_doc' => $status_doc
        );
        $this->db->where('ID_application', $ID_application);

        $query = $this->db->update('statement', $data);
        return $query;
    }


}