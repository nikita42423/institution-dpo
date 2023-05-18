$(document).ready(function(){
    $('#name_focus').change(function(){
        let name_focus = document.getElementById('name_focus').value;
        alert(name_focus);

        $.ajax({
            type: 'POST',
            url: 'type_doc/test',
            data: {name_focus: name_focus},
            dataType:'html',
            success: function(result) {
                $('#program').html(result);
            }
        })
    })
})

// $(document).ready(function(){
//     $('#name_focus').change(function(){
//         let name_focus = document.getElementById('name_focus').value;
//         alert(name_focus);

//         $.ajax({
//             type: 'POST',
//             url: 'edu_program/test',
//             data: {name_focus: name_focus},
//             dataType:'html',
//             success: function(result) {
//                 $('#program').html(result);
//             }
//         })
//     })
// })

//Модальное окно для Вида ОП, Направления, Вида документа и Формы обучения
$(document).ready(function(){
	$('#modal_info').on('show.bs.modal', function (event) {

	var button = $(event.relatedTarget) 		// кнопка, которая вызывает модаль
	var id_info = button.data('id_info')		//получим  data-id_type_doc атрибут
	var name_info = button.data('name_info'); 	// получим  data-name_type_doc атрибут
	var modal = $(this);					    //Здесь изменяем содержимое модали
	modal.find('.modal-body #id_info').val(id_info);
	modal.find('.modal-body #name_info').val(name_info);
	})
});