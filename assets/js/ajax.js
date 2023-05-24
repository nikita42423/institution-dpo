//Фильтрование образовательной программы
$(document).ready(function(){
    $('.filter_ep').change(function(){
        let ID_focus = document.getElementById('id_focus').value;
        let ID_type_ep = document.getElementById('id_type_ep').value;
        let ID_form = document.getElementById('id_form').value;
        let ID_type_doc = document.getElementById('id_type_doc').value;

        $.ajax({
            type: 'POST',
            url: 'edu_program/filter_edu_program',
            data: ({ID_focus: ID_focus, ID_type_ep: ID_type_ep, ID_form: ID_form, ID_type_doc: ID_type_doc}),
            dataType:'html',
            success: function(result) {
                $('#table_body_ep').html(result);
            }
        })
    })


//Фильтрование дисциплины

    $('.filter_discipline').change(function(){ 
        let ID_ep = document.getElementById('id_ep').value;
        $.ajax({
            type: 'POST',
            url: 'discipline/filter_discipline',
            data: ({ID_ep: ID_ep}),
            dataType:'html',
            success: function(result) {
                $('#table_body_discipline').html(result);
            }
        })
    })


//Модальное окно для Вида ОП, Направления, Вида документа и Формы обучения

	$('#modal_info').on('show.bs.modal', function (event) {

	var button = $(event.relatedTarget) 		// кнопка, которая вызывает модаль
	var id_info = button.data('id_info')		
	var name_info = button.data('name_info'); 	
	var modal = $(this);					    //Здесь изменяем содержимое модали
	modal.find('.modal-body #id_info').val(id_info);
	modal.find('.modal-body #name_info').val(name_info);
	})


//Модальное окно для Образовательной программы

	$('#modal_ep').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 		// кнопка, которая вызывает модаль

        var ID_ep = button.data('ID_ep')
        var name_ep = button.data('name_ep');
        var name_profession = button.data('name_profession');
        var type_cert = button.data('type_cert');
        var name_type_ep = button.data('name_type_ep');
        var name_focus = button.data('name_focus');
        var name_type_doc = button.data('name_type_doc');
        var name_form = button.data('name_form');
        var time_week = button.data('time_week');
        var amount_hour = button.data('amount_hour');
        var count_in_group = button.data('count_in_group');

        var modal = $(this);					    //Здесь изменяем содержимое модали
        modal.find('.modal-body #ID_ep').val(ID_ep);
        modal.find('.modal-body #name_ep').val(name_ep);
        modal.find('.modal-body #name_profession').val(name_profession);
        modal.find('.modal-body #type_cert').val(type_cert);

        modal.find('.modal-body #name_type_ep').val(name_type_ep);
        modal.find('.modal-body #name_focus').val(name_focus);
        modal.find('.modal-body #name_type_doc').val(name_type_doc);
        modal.find('.modal-body #name_form').val(name_form);

        modal.find('.modal-body #time_week').val(time_week);
        modal.find('.modal-body #amount_hour').val(amount_hour);
        modal.find('.modal-body #count_in_group').val(count_in_group);
	})


//Модальное окно для изменения Дисциплины

    $('#modal_upd_discipline').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // кнопка, которая вызывает модаль
        
        var id_ep = button.data('id_ep');
        var id_discipline = button.data('id_discipline');		
        var name_discipline = button.data('name_discipline');
        var amount_hour = button.data('amount_hour');
        var amount_hour_work = button.data('amount_hour_work');
        var type_mid_cert = button.data('type_mid_cert');
        var type_practice = button.data('type_practice');
        var amount_hour_practice = button.data('amount_hour_practice');

        var modal = $(this); //Здесь изменяем содержимое модали
        modal.find('.modal-body #id_ep').val(id_ep);
        modal.find('.modal-body #id_discipline').val(id_discipline);
        modal.find('.modal-body #name_discipline').val(name_discipline);
        modal.find('.modal-body #amount_hour').val(amount_hour);
        modal.find('.modal-body #amount_hour_work').val(amount_hour_work);
        modal.find('.modal-body #type_mid_cert').val(type_mid_cert);
        modal.find('.modal-body #type_practice').val(type_practice);
        modal.find('.modal-body #amount_hour_practice').val(amount_hour_practice);
    })
      
});