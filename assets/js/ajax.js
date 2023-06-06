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

//изменение или добавление  прайса (бухгалтер)
$(document).ready(function(){

    $('#show_resh').submit(function(){
        let ID_ep = document.getElementById('ID_ep').value;
        let cost_hour = document.getElementById('res1').innerHTML;
        let price = document.getElementById('res9').innerHTML;
        let check_price = document.getElementById('check_price').checked;
        $.ajax({
            type: 'POST',
            url: 'buxgalter/edit_price',
            data: { ID_ep:ID_ep, cost_hour:cost_hour, price:price, check_price:check_price},
            dataType: 'json',
            success: function(result){
                alert(result);
            }
        })
    })
});

//изменение списка при выборе checkbox (бухгалтера)
$(document).ready(function(){
    $('input[name=check_price]').change(function(e) {
        e.preventDefault();
        let check_price = document.getElementById('check_price').checked;
        if(check_price == true) document.querySelector('#filtrbux_button').innerHTML = 'Изменить';
        else if(check_price == false) document.querySelector('#filtrbux_button').innerHTML = 'Добавить';
        $.ajax({
            type: 'POST',
            url: 'buxgalter/edit_select',
            data: { check_price:check_price},
            dataType: 'json',
            success: function(result){
                document.getElementById('ID_ep').options.length = 0;    //очистка выпадающего меню
              //если массив пустой
              if(!result || !result.length) $('#ID_ep').append(`<option>Пусто</option>`);
              //не пустой
              else if(result || result.length)
              {
              
              for(i in result)
              {
                  $('#ID_ep').append(`<option value="${result[i].ID_ep}">${result[i].name_ep}</option>`);
              }
            }
         }
        })
    })
});

//фильтрация для бухгалтера - о полученных доходах
$(document).ready(function(){
    $('.filter_sum_buxg').change(function(){
        let ID_focus = document.getElementById('id_focus').value;
        let ID_ep = document.getElementById('id_ep').value;
        let date1 = document.getElementById('begin_date').value;
        let date2 = document.getElementById('end_date').value;

        $.ajax({
            type: 'POST',
            url: 'buxgalter2/get_sum',
            data: ({ID_focus: ID_focus, ID_ep: ID_ep, date1:date1, date2:date2}),
            success: function(result) {
                let data =  JSON.parse(result);
                $('#example_body').empty();  //очистка таблицы
                for(i in data)
                {
                    $('#example').append(`<tr>
                            <td>${data[i].name_ep}</td>
                            <td>${data[i].name_course}</td>
                            <td>${data[i].count_people} / ${data[i].count_in_group}</td>
                            <td>${data[i].price}</td>
                        </tr>`);
                }
            }
        })
    })
});


//фильтрация + вывод (история прайса)
$(document).ready(function(){
    $('.filter_history').change(function(){
        let ID_ep = document.getElementById('id_ep').value;
        let date1 = document.getElementById('date1').value;
        let date2 = document.getElementById('date2').value;

        $.ajax({
            type: 'POST',
            url: 'buxgalter/filter_history',
            data: ({ID_ep: ID_ep, date1:date1, date2:date2}),
            success: function(result) {
                let data =  JSON.parse(result);
                $('#example_history').empty();  //очистка таблицы
                for(i in data)
                {
                    $('#example').append(`<tr>
                            <td>${data[i].name_ep}</td>
                            <td>${data[i].date_start_price}</td>
                            <td>${data[i].cost_hour}</td>
                            <td>${data[i].price}</td>
                        </tr>`);

                }
            }
        })
    })
});

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


//Зачисление клента на курсы (Подача заявки)
$(document).ready(function(){
    $('#add_statement').submit(function(event){
        event.preventDefault();
        var site = window.location.origin;  //базовый адрес

        let ID_course = document.getElementById('ID_course').value;
        let ID_user = document.getElementById('ID_user').value;

         //если ID_user пустой, тогда переход на авторизацию
         if(!ID_user){
            alert('Ошибка! Нужно авторизоваться');
            window.location.replace(site + '/login/index');
        } 

        $.ajax({
            type: 'POST',
            url: 'clients/add_stat',
            data: { ID_course:ID_course, ID_user:ID_user},
            dataType: 'json',
            success: function(result){
                alert(result);
            window.location.replace(site + '/clients/lizcab');  //переход страницы
            }
        })
    })
});


//передача значения модального окна (Подача заявки)
$(document).on('click', '.addStatement', function () {
    var name_course = $(this).data('name_course');
    var ID_course = $(this).data('id_course');

    $('#nameCourseModal').text(name_course);
    $('#ID_course').val(ID_course);
});


//фильтрация для бухгалтера
$(document).ready(function(){
    $('.filter_buxg').change(function(){
        let ID_focus = document.getElementById('id_focus').value;
        let ID_type_ep = document.getElementById('id_type_ep').value;
        let ID_form = document.getElementById('id_form').value;
        let ID_type_doc = document.getElementById('id_type_doc').value;

        $.ajax({
            type: 'POST',
            url: 'buxgalter2/filter_buxg',
            data: ({ID_focus: ID_focus, ID_type_ep: ID_type_ep, ID_form: ID_form, ID_type_doc: ID_type_doc}),
            success: function(result) {
                let data =  JSON.parse(result);
                $('#search_buxg').empty();  //очистка таблицы
                for(i in data)
                {
                    $('#example').append(`<tr>
                            <td>${data[i].ID_ep}</td>
                            <td>${data[i].name_ep}</td>
                            <td>${data[i].name_focus}</td>
                            <td>${data[i].amount_hour}</td>
                            <td>${data[i].cost_hour}</td>
                            <td>${data[i].price}</td>
                            <td>
                                <button type="button" class="btn btn-primary editPrice" data-bs-toggle="modal" data-bs-target="#editPrice" data-id_ep="${data[i].ID_ep}" data-cost_hour="${data[i].cost_hour}" data-price="${data[i].price}">
                                    изменить
                                </button>
                           </td>
                        </tr>`);
                }
            }
        })
    })
});


//фильтрация для клиента (курсы)
$(document).ready(function(){
    $('.filter_client').change(function(){
        let ID_focus = document.getElementById('id_focus').value;
        let ID_form = document.getElementById('id_form').value;
        let date1 = document.getElementById('date1').value;
        let date2 = document.getElementById('date2').value;
        $.ajax({
            type: 'POST',
            url: 'clients/filter_client',
            data: ({ID_focus: ID_focus, ID_form: ID_form, date1: date1, date2: date2}),
            success: function(result) {
                let data =  JSON.parse(result);
                $('#client_curs').empty();  //очистка таблицы
                for(i in data)
                {
                    $('#curs').append(`<tr>
                            <td>${data[i].name_ep}</td>
                          
                            <td>${data[i].price}</td>
                            <td>
                            <button type="button" class="btn btn-primary addStatement" data-bs-toggle="modal" data-bs-target="#addStatement" data-id_course="${data[i].ID_course}" data-name_course="${data[i].name_course}">
                                график курсов
                            </button>
                           </td>
                        </tr>`);
                }
            }
        })
    })
});


//передача значения модального окна (Изменение прайса - Бухгалтер)
$(document).on('click', '.editPrice', function () {
    var ID_ep = $(this).data('id_ep'),
        cost_hour = $(this).data('cost_hour'),
        price = $(this).data('price');
    $('#ID_ep').val(ID_ep);
    $('#cost_hour').val(cost_hour);
    $('#price').val(price);
});

//Изменение данные прайса
$(document).ready(function(){

    $('#edit_price').submit(function(){
        let ID_ep = document.getElementById('ID_ep').value;
        let cost_hour = document.getElementById('cost_hour').value;
        let price = document.getElementById('price').value;
        $.ajax({
            type: 'POST',
            url: 'buxgalter2/update_price',
            data: { ID_ep:ID_ep, cost_hour:cost_hour, price:price},
            dataType: 'json',
            success: function(result){
                alert(result);
            }
        })
    })
});


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
    });
