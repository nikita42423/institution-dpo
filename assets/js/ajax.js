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
})

//Фильтрование дисциплины
$(document).ready(function(){
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
})

//Модальное окно для Вида ОП, Направления, Вида документа и Формы обучения
$(document).ready(function(){
	$('#modal_info').on('show.bs.modal', function (event) {

	var button = $(event.relatedTarget) 		// кнопка, которая вызывает модаль
	var id_info = button.data('id_info')		
	var name_info = button.data('name_info'); 	
	var modal = $(this);					    //Здесь изменяем содержимое модали
	modal.find('.modal-body #id_info').val(id_info);
	modal.find('.modal-body #name_info').val(name_info);
	})
});

//Модальное окно для Образовательной программы
$(document).ready(function(){
	$('#modal_ep').on('show.bs.modal', function (event) {

	var button = $(event.relatedTarget) 		// кнопка, которая вызывает модаль
	var ID_ep = button.data('ID_ep')
	var name_ep = button.data('name_ep');
    var name_profession = button.data('name_profession');
    var type_cert = button.data('type_cert');
    var ID_type_ep = button.data('ID_type_ep');
    var ID_focus = button.data('ID_focus');
    var ID_type_doc = button.data('ID_type_doc');
    var ID_form = button.data('ID_form');
    var time_week = button.data('time_week');
    var amount_hour = button.data('amount_hour');
    var count_in_group = button.data('count_in_group');

	var modal = $(this);					    //Здесь изменяем содержимое модали
	modal.find('.modal-body #ID_ep').val(ID_ep);
	modal.find('.modal-body #name_ep').val(name_ep);
    modal.find('.modal-body #name_profession').val(name_profession);
    modal.find('.modal-body #type_cert').val(type_cert);
    modal.find('.modal-body #ID_type_ep').val(ID_type_ep);
    modal.find('.modal-body #ID_focus').val(ID_focus);
    modal.find('.modal-body #ID_type_doc').val(ID_type_doc);
    modal.find('.modal-body #ID_form').val(ID_form);
    modal.find('.modal-body #time_week').val(time_week);
    modal.find('.modal-body #amount_hour').val(amount_hour);
    modal.find('.modal-body #count_in_group').val(count_in_group);
	})
});