$(document).ready(function(){

    //Фильтрование образовательной программы
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
                $('#program').html(result);
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

    //Список преподавателей зависит от направления
    $('.filter_teacher_of_focus').change(function(){
        let ID_focus = document.getElementById('id_focus_of_workload').value;

        if (ID_focus == 'all') {
            let ID_user = null;
            $.ajax({
                type: 'POST',
                url: 'workload/filter_workload',
                data: ({ID_user: ID_user}),
                dataType:'html',
                success: function(result) {
                    $('#table_body_workload').html(result);
                }
            })
        }
        else {
            $.ajax({
                type: 'POST',
                url: 'workload/filter_teacher_of_focus',
                data: ({ID_focus: ID_focus}),
                dataType:'html',
                success: function(result) {
                    $('#id_teacher_of_workload').html(result);
                }
            })
        }
    })

    //Фильтрование нагрузки преподавателя зависит от преподавателя
    $('.filter_workload_of_teacher').change(function(){
        let ID_user = document.getElementById('id_teacher_of_workload').value;
        $.ajax({
            type: 'POST',
            url: 'workload/filter_workload',
            data: ({ID_user: ID_user}),
            dataType:'html',
            success: function(result) {
                $('#table_body_workload').html(result);
            }
        })
    })

    //Фильтрование сведений о рейтинге образовательных программ ДПО за период
    $('.filter_rating_ep').change(function(){
        let date1 = document.getElementById('date1_rating_ep').value;
        let date2 = document.getElementById('date2_rating_ep').value;
        $.ajax({
            type: 'POST',
            url: 'director/filter_rating_ep',
            data: ({date1: date1, date2: date2}),
            dataType:'html',
            success: function(result) {
                $('#table_director').html(result);
            }
        })
    })

    //Фильтрование сведений о работе преподавателей за период
    $('.filter_work_teacher').change(function(){
        let date1 = document.getElementById('date1_work_teacher').value;
        let date2 = document.getElementById('date2_work_teacher').value;
        $.ajax({
            type: 'POST',
            url: 'director/filter_work_teacher',
            data: ({date1: date1, date2: date2}),
            dataType:'html',
            success: function(result) {
                $('#table_director').html(result);
            }
        })
    })

    //Модальное окно для Вида ОП, Направления, Вида документа и Формы обучения
	$('#modal_info').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 		
        var id_info = button.data('id_info')		
        var name_info = button.data('name_info'); 	
        var modal = $(this);					    
        modal.find('.modal-body #id_info').val(id_info);
        modal.find('.modal-body #name_info').val(name_info);
	})

    //Модальное окно для Образовательной программы
	$('#modal_ep').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 		

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

        var modal = $(this);					    
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

    //Модальное окно для изменения Образовательной программы
	$('#modal_upd_ep').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id_ep = button.data('id_ep')
        var name_ep = button.data('name_ep');
        var name_profession = button.data('name_profession');
        var type_cert = button.data('type_cert');

        var id_type_ep = button.data('id_type_ep');
        var name_type_ep = button.data('name_type_ep');
        var id_focus = button.data('id_focus');
        var name_focus = button.data('name_focus');
        var id_type_doc = button.data('id_type_doc');
        var name_type_doc = button.data('name_type_doc');
        var id_form = button.data('id_form');
        var name_form = button.data('name_form');
        
        var time_week = button.data('time_week');
        var amount_hour = button.data('amount_hour');
        var count_in_group = button.data('count_in_group');

        var modal = $(this);					    
        modal.find('.modal-body #id_ep').val(id_ep);
        modal.find('.modal-body #name_ep').val(name_ep);
        modal.find('.modal-body #name_profession').val(name_profession);
        modal.find('.modal-body #type_cert').val(type_cert);
  
        modal.find('.modal-body #name_type_ep').val(id_type_ep);
        modal.find('.modal-body #name_type_ep').text(name_type_ep);
        modal.find('.modal-body #name_focus').val(id_focus);
        modal.find('.modal-body #name_focus').text(name_focus);
        modal.find('.modal-body #name_type_doc').val(id_type_doc);
        modal.find('.modal-body #name_type_doc').text(name_type_doc);
        modal.find('.modal-body #name_form').val(id_form);
        modal.find('.modal-body #name_form').text(name_form);

        modal.find('.modal-body #time_week').val(time_week);
        modal.find('.modal-body #amount_hour').val(amount_hour);
        modal.find('.modal-body #count_in_group').val(count_in_group);
	})

    //Модальное окно для Преподавателя
	$('#modal_teacher').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 		
        var id_user = button.data('id_user');
        var full_name = button.data('full_name');
        var profession = button.data('profession');
        var work_exp = button.data('work_exp');
        var login = button.data('login');
        var passwords = button.data('passwords');
        var modal = $(this);					    
        modal.find('.modal-body #id_user').val(id_user);
        modal.find('.modal-body #full_name').val(full_name);
        modal.find('.modal-body #profession').val(profession);
        modal.find('.modal-body #work_exp').val(work_exp);
        modal.find('.modal-body #login').val(login);
        modal.find('.modal-body #passwords').val(passwords);
        
	})
});

//-----------------------------------------------------------------------------------------------------------------------

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

        $.ajax({

            type: 'POST',
            url: 'buxgalter/show_rachet',
            data: ({raster1: v[0], raster2: v[1], raster3: v[2], raster4: v[3], raster5: v[4],
                raster6: v[5], raster7: v[6], raster8: v[7], raster9: v[8], 
                 ID_ep: ID_ep, amount_hour: amount_hour, name_form: name_form, count_in_group: count_in_group}),
                dataType:'html',
            success: function(result) {
                //а здесь из этого массива выберем и подставим куда нужно
            
               result =  JSON.parse(result);
            
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
                            <button class="btn btn-primary viewingCourse" type="button" data-bs-toggle="offcanvas" data-id_ep="${data[i].ID_ep}" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                График курсов
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

//педеча гость фильтры 

$(document).on('click', '.viewingCourse', function () {
    var ID_ep = $(this).data('id_ep');
    $('#recept_application_tbody').empty();  //очистка таблицы
    $.ajax({
        type: 'POST',
        url: 'main/filter_guest',
        data: ({ ID_ep:ID_ep }),
        dataType: 'html',
        success: function(result){

            $('#recept_application_tbody').html(result);
        }
    })
});


//прием заявок (Гость)
function receptionApplication(id, user)
{
   
    var site = window.location.origin;  //базовый адрес

    // //если ID_user пустой, тогда переход на авторизацию
    if(!user){
        window.location.replace(site + '/login/index'); 
    }
    //если сессия есть, то выполнить
    else {
        $.ajax({
            type: 'POST',
            url: 'clients/add_stat',
            data: {ID_course:id, ID_user:user},
            success: function(result){
                result =  JSON.parse(result);
                if(result != true){ 
                    alert(result);
                }
                else if(result == true){
                    window.location.replace(site + '/clients/lizcab');  //переход страницы
                } 
            }
        })
    }

}



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

//фильтрация - заявки (менеджер)
$(document).ready(function(){
    $('.filter_zayav').change(function(){
        let ID_focus = document.getElementById('id_focus').value;
        let ID_ep = document.getElementById('id_ep').value;
        let ID_course = document.getElementById('id_course').value;
        let ID_form = document.getElementById('id_form').value;
        let status = document.getElementById('status').value;
        let date1 = document.getElementById('date1').value;
        let date2 = document.getElementById('date2').value;

        $.ajax({
            type: 'POST',
            url: 'manager/filter_zaivk',
            data: ({ID_focus: ID_focus, ID_form: ID_form, status:status, ID_ep:ID_ep, ID_course:ID_course, date1:date1, date2:date2}),
            success: function(result) {
                let data =  JSON.parse(result);
                $('#zayav_tbody').empty();  //очистка таблицы
                let visible = '';
                for(i in data)
                {
                    if(data[i].status_application == 'подана'){
                        visible = 'visible';
                    }
                    else{
                        visible = 'invisible';
                    }

                    $('#zayav').append(`<tr>
                            <td>${data[i].ID_application}</td>
                            <td>${data[i].full_name}</td>
                            <td>${data[i].phone}</td>
                            <td>${data[i].email}</td>
                            <td data-bs-toggle="tooltip" data-bs-placement="right" title="${data[i].name_ep}" class=" text-truncate" style="max-width: 150px;">${data[i].name_ep}</td>
                            <td>${data[i].name_course}</td>
                            <td>${data[i].date_start_teaching}</td>
                            <td>${data[i].date_end_teaching}</td>
                            <td>${data[i].date_contract}</td>
                            <td>${data[i].date_payment}</td>
                            <td>${data[i].status_application}</td>
                            <td>
                            <!-- Принять дата договора-->
                            <button type="button" class="btn btn-success ${visible}" onclick="editStatement(${data[i].ID_application})" id="success_btn" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="принять дата договора">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
    <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
    </svg>
    </button>
                                
                               
                            </td>
                        </tr>`);
                }
            }
        })
    });

  

//фильтрация - об окончании (менеджер)
$(document).ready(function(){
    $('.filter_end').change(function(){
        let ID_course = document.getElementById('id_course_end').value;
        let ID_ep = document.getElementById('id_ep_end').value;
        let status = document.getElementById('status_end').value;

        $.ajax({
            type: 'POST',
            url: 'manager/filter_end',
            data: ({ID_course: ID_course, ID_ep: ID_ep, status: status}),
            success: function(result) {    
                let data =  JSON.parse(result);
                $('#zachit_end_tbody').empty();  //очистка таблицы
                for(i in data)
                {
                    $('#zachit_end').append(`<tr>
                            <td>${data[i].full_name}</td>
                            <td>${data[i].name_course}</td>
                            <td>${data[i].name_ep}</td>
                            <td>${data[i].date_start_teaching}</td>
                            <td>${data[i].date_end_teaching}</td>
                            <td>${data[i].series_doc}</td>
                            <td>${data[i].date_give}</td>
                            <td>${data[i].status_doc}</td>
                            <td><!-- Добавить данные -->
                            <button type="button" class="btn btn-primary editEndStatement" data-bs-toggle="modal" data-id_application="${data[i].ID_application}" data-full_name="${data[i].full_name}" data-series_doc="${data[i].series_doc}" data-date_give="${data[i].date_give}" data-bs-target="#exampleModal">
                            <i class="bi bi-pencil-fill"></i>
                            </button>
                         </td>
            
                         <td><!-- Изменить данные -->
                            <button type="button" class="btn btn-warning editEndStatus" data-id_application="${data[i].ID_application}" data-full_name="${data[i].full_name}" data-status_doc="${data[i].status_doc}" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                            <i class="bi bi-file-earmark-medical-fill"></i>
                            </button>
                         </td>
                        </tr>`);
                }
            }
        })
    })
});


//передача значения модального окна (Окончание обучения - менеджер)
$(document).on('click', '.editEndStatement', function () {
    var ID_statement = $(this).data('id_application');
    var full_name = $(this).data('full_name');
    var series_doc = $(this).data('series_doc');
    var date_give = $(this).data('date_give');

    $('#ID_statement_end_save').val(ID_statement);
    $('#full_name_end_save').val(full_name);
    $('#series_doc').val(series_doc);
    $('#date_give').val(date_give);
});


//передача значения модального окна (Изменение статуса документа - менеджер)
$(document).on('click', '.editEndStatus', function () {
    var ID_statement = $(this).data('id_application');
    var full_name = $(this).data('full_name');
    var status_doc = $(this).data('status_doc');

    $('#ID_statement_end_edit').val(ID_statement);
    $('#full_name_end_edit').val(full_name);
    $('#status_doc').val(status_doc);
});



    //изменение заявки
    $('#edit_application').submit(function(){
        let ID_application = document.getElementById('success').value;
        alert(ID_application);


        
        $.ajax({
            type: 'POST',
            url: 'manager/success',
            data: {ID_application:ID_application},
            dataType: 'json',
            success: function(result){
                alert(result);
            }
        })
    })
});


  //изменение заявки
  function editStatement(id)
  {
      $.ajax({
          type: 'POST',
          url: 'manager/success',
          data: {ID_application:id},
          dataType: 'json',
          success: function(result){
              alert(result);
          }
      })
  
        let ID_focus = document.getElementById('id_focus').value;
        let ID_ep = document.getElementById('id_ep').value;
        let ID_course = document.getElementById('id_course').value;
        let ID_form = document.getElementById('id_form').value;
        let status = document.getElementById('status').value;
        let date1 = document.getElementById('date1').value;
        let date2 = document.getElementById('date2').value;
  
      $.ajax({
          type: 'POST',
          url: 'manager/filter_zaivk',
          data: ({ID_focus: ID_focus, ID_form: ID_form, status:status, ID_ep:ID_ep, ID_course:ID_course, date1:date1, date2:date2}),
          success: function(result) {
              let data =  JSON.parse(result);
              $('#zayav_tbody').empty();  //очистка таблицы
              let visible = '';
              for(i in data)
              {
                if(data[i].status_application == 'подана'){
                    visible = 'visible';
                }
                else{
                    visible = 'invisible';
                }

                  $('#zayav').append(`<tr>
                          <td>${data[i].ID_application}</td>
                          <td>${data[i].full_name}</td>
                          <td>${data[i].phone}</td>
                          <td>${data[i].email}</td>
                          <td data-bs-toggle="tooltip" data-bs-placement="right" title="<?=$row['name_ep']?>" class=" text-truncate" style="max-width: 150px;">${data[i].name_ep}</td>
                          <td>${data[i].name_course}</td>
                          <td>${data[i].date_start_teaching}</td>
                          <td>${data[i].date_end_teaching}</td>
                          <td>${data[i].date_contract}</td>
                          <td>${data[i].date_payment}</td>
                          <td>${data[i].status_application}</td>
                          <td>
                          <!-- Принять дата договора-->
                          <button type="button" class="btn btn-success ${visible}" onclick="editStatement(${data[i].ID_application})" id="success_btn" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="принять дата договора">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
  <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
  </svg>
  </button>
                              
                             
                          </td>	
                      </tr>`);
              }
          }
      })
  }
  
  //удаление заявки
  function deleteStatement(id)
  {
      $.ajax({
          type: 'POST',
          url: 'manager/fail',
          data: {ID_application:id},
          dataType: 'json',
          success: function(result){
              alert(result);
          }
      })
  
      let ID_focus = document.getElementById('id_focus').value;
      let ID_ep = document.getElementById('id_ep').value;
      let ID_course = document.getElementById('id_course').value;
      let ID_form = document.getElementById('id_form').value;
      let status = document.getElementById('status').value;
      let date1 = document.getElementById('date1').value;
      let date2 = document.getElementById('date2').value;
  
      $.ajax({
          type: 'POST',
          url: 'manager/filter_zaivk',
          data: ({ID_focus: ID_focus, ID_form: ID_form, status:status, ID_ep:ID_ep, ID_course:ID_course, date1:date1, date2:date2}),
          success: function(result) {
              let data =  JSON.parse(result);
              $('#zayav_tbody').empty();  //очистка таблицы
              let visible = '';
              for(i in data)
              {
                if(data[i].status_application == 'подана'){
                    visible = 'visible';
                }
                else{
                    visible = 'invisible';
                }

                  $('#zayav').append(`<tr>
                          <td>${data[i].full_name}</td>
                          <td>${data[i].phone}</td>
                          <td>${data[i].email}</td>
                          <td>${data[i].name_type_doc}</td>
                          <td>${data[i].name_focus}</td>
                          <td>${data[i].name_ep}</td>
                          <td>${data[i].name_course}</td>
                          <td>${data[i].date_start_teaching}</td>
                          <td>${data[i].date_end_teaching}</td>
                          <td>${data[i].date_contract}</td>
                          <td>${data[i].date_payment}</td>
                          <td>${data[i].status_application}</td>
                          <td>
                          <!-- Принять дата договора-->
                          <button type="button" class="btn btn-success ${visible}" onclick="editStatement(${data[i].ID_application})" id="success_btn" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="принять дата договора">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
  <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
  </svg>
  </button>
                              
                            
                          </td>	
                      </tr>`);
              }
          }
      })
  }
  


//формирование документа об окончании обучения
$(document).ready(function(){
    $('#editEndStatement').submit(function(){
        let ID_application = document.getElementById('ID_statement_end_save').value;
        let series_doc = document.getElementById('series_doc').value;
        let date_give = document.getElementById('date_give').value;
        $.ajax({
            type: 'POST',
            url: 'manager/update_end',
            data: { ID_application:ID_application, series_doc:series_doc, date_give:date_give},
            dataType: 'json',
            success: function(result){
            }
        })
    })
});

//изменение статуса документа
$(document).ready(function(){
    $('#editEndStatus').submit(function(){
        let ID_application = document.getElementById('ID_statement_end_edit').value;
        let status_doc = document.getElementById('status_doc').value;
        $.ajax({
            type: 'POST',
            url: 'manager/update_status_doc',
            data: { ID_application:ID_application, status_doc:status_doc},
            dataType: 'json',
            success: function(result){
            }
        })
    })
});




//фильтрация - заявки зачислена (формирование для зачисления)
$(document).ready(function(){
    $('.filter_accept').change(function(){
        let ID_course = document.getElementById('id_course_accept').value;
        let ID_ep = document.getElementById('id_ep_accept').value;

        $.ajax({
            type: 'POST',
            url: 'manager/filter_accepted',
            data: ({ID_course: ID_course, ID_ep: ID_ep}),
            success: function(result) {
                let data =  JSON.parse(result);
                $('#zachit_tbody').empty();  //очистка таблицы
                for(i in data)
                {
                    $('#zachit').append(`<tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input mx-auto" type="checkbox" value="${data[i].ID_application}" id="invalidCheck" name="invalidCheck[]">
                                </div>
                            </td>
                            <td>${data[i].full_name}</td>
                            <td>${data[i].name_course}</td>
                        </tr>`);
                }
            }
        })
    })

    //при нажатии Выбрать все - чекбоксы
    $('.check_button').click(function(){
        // $('.form-check #invalidCheck').prop('checked', 'checked');
        if($('.form-check #invalidCheck').prop('checked'))
        {
            $('.form-check #invalidCheck').prop('checked', false);
            $(this).html('Выбрать все');
        }

        else{
            $('.form-check #invalidCheck').prop('checked', 'checked');
            $(this).html('Отменить все');
        }
    })

    //изменение заявки - зачислена -> обучение
    $('#update_accepted').submit(function(){
        $.ajax({
            type: 'POST',
            url: 'manager/update_accepted',
            data: $('#invalidCheck:checked').serialize(),
            success: function(result) {
                }
            })
        })

});





//Модальное окно для изменения Дисциплины

    $('#modal_upd_discipline').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        
        var id_ep = button.data('id_ep');
        var id_discipline = button.data('id_discipline');		
        var name_discipline = button.data('name_discipline');
        var amount_hour = button.data('amount_hour');
        var amount_hour_work = button.data('amount_hour_work');
        var type_mid_cert = button.data('type_mid_cert');
        var type_practice = button.data('type_practice');
        var amount_hour_practice = button.data('amount_hour_practice');

        var modal = $(this); 
        modal.find('.modal-body #id_ep').val(id_ep);
        modal.find('.modal-body #id_discipline').val(id_discipline);
        modal.find('.modal-body #name_discipline').val(name_discipline);
        modal.find('.modal-body #amount_hour').val(amount_hour);
        modal.find('.modal-body #amount_hour_work').val(amount_hour_work);
        modal.find('.modal-body #type_mid_cert').val(type_mid_cert);
        modal.find('.modal-body #type_practice').val(type_practice);
        modal.find('.modal-body #amount_hour_practice').val(amount_hour_practice);
    });




    //фильтрация ОП (для менеджера)
$(document).ready(function(){
    $('.filter_registr_client').change(function(){
        let ID_ep = document.getElementById('id_ep_client').value;

        $.ajax({
            type: 'POST',
            url: 'manager/filter_registr_client',
            data: ({ID_ep: ID_ep}),
            success: function(result) {
                let data =  JSON.parse(result);
                document.getElementById('id_course_client').options.length = 0;    //очистка выпадающего меню
                for(i in data)
                {
                    let data1 = new Date(data[i].date_start_teaching);
                    let data2 = new Date(data[i].date_end_teaching);
                    let format1 = data1.getDay() + '.' + (data1.getMonth()+1) + '.' + data1.getFullYear();
                    let format2 = data2.getDay() + '.' + (data2.getMonth()+1) + '.' + data2.getFullYear();
                    $('#id_course_client').append(`<option value="${data[i].ID_course}">${data[i].name_course} ${format1} по ${format2}</option>`);
                }
            }
        })
    })

});

