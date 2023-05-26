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


// Фильтрование расчет стоимости услуги
$(document).ready(function(){
    $('#ID_ep').change(function(){ 
        let ID_ep = document.getElementById('ID_ep').value;
       //alert(ID_ep);
        $.ajax({
            type: 'POST',
            url: 'buxgalter/shic_op',
            data: {ID_ep:ID_ep},
            dataType:'json',
            success: function(result) {
                document.getElementById('amount_hour').value = result.amount_hour;
                document.getElementById('name_form').value = result.name_form;
                document.getElementById('count_in_group').value = result.count_in_group;

                $('#aaa p').html('');
                $('#raster1').val(0);

            }
        })
    })
});

// Фильтрация ДПО при выборе направления
$(document).ready(function(){
    $('#ID_focus').change(function(){ 
        let ID_focus = document.getElementById('ID_focus').value;

        // alert(ID_focus);
        $.ajax({
            type: 'POST',
            url: 'buxgalter2/show_epo',
            data: {ID_focus:ID_focus},
            dataType:'json',
            success: function(result) {
                var selectBox = document.getElementById('ID_epo');
                selectBox.innerHTML = '';
                for(var i = 0; i < result.length; i++){
                    selectBox.options.add( new Option(result[i].name_ep, result[i].id_ep) );
                }
            }
        })
    })
});


//расчет услуги
$(document).ready(function(){
    $('.rechert').keyup(function(){
        let ID_ep = document.getElementById('ID_ep').value;
        
        let amount_hour = document.getElementById('amount_hour').value;
        let name_form = document.getElementById('name_form').value;
        let count_in_group = document.getElementById('count_in_group').value;
        // let arr = new Array();
        let id = [];
        let v = [];
        for (let i=1; i<10; i++){
            idelem='raster'+i;
            id[i-1] = idelem;
            v[i-1] = document.getElementById(idelem).value;
        }
 

      
      //  ids = '#res'+ id.substring(6,7);
 //  alert(id +' '+v);
        $.ajax({

            type: 'POST',
            url: 'buxgalter/show_rachet',
            data: ({raster1: v[0], raster2: v[1], raster3: v[2], raster4: v[3], raster5: v[4],
                raster6: v[5], raster7: v[6], raster8: v[7], raster9: v[8], 
                 ID_ep: ID_ep, amount_hour: amount_hour, name_form: name_form, count_in_group: count_in_group}),
                dataType:'html',
            success: function(result) {
                //а здесь из этого массива выберем и подставим куда нужно
              //  $('#show_resh').html(result);
               result =  JSON.parse(result);
              // alert(result);
            //    rvalue = [];
                // for (i in result){
                //     rvalue.push(result[i]);
                // }
            //   alert(rvalue);
                // посмотри что ты получил это объект а нам надо массив  я хотела не только значенимя получить но и имена куда вставить значения ИД
              const aArr = Object.entries(result);
              aArr.forEach(([key, value])=>{
                    id = '#'+key;
                    $(id).html(value);
                })
                 


          



            }
        })
    })
})

//Изменение данные клиента (персональные данные)
$(document).ready(function(){

    $('#edit_client').submit(function(){
        let ID_user = document.getElementById('ID_user').value;
        let full_name = document.getElementById('full_name').value;
        let phone = document.getElementById('phone').value;
        let address = document.getElementById('address').value;
        $.ajax({
            type: 'POST',
            url: 'clients/edit_client',
            data: { ID_user:ID_user, full_name:full_name, phone:phone, address:address},
            dataType: 'json',
            success: function(result){
                alert(result);
            }
        })
    })
});

