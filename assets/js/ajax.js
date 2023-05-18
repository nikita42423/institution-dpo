$(document).ready(function(){
        $('#name_focus').change(function(){
            let name_focus = document.getElementById('name_focus').value;
            alert(name_focus);

            $.ajax({
                type: 'POST',
                url: 'edu_program/test',
                data: {name_focus: name_focus},
                dataType:'html',
                success: function(result) {
                   $('#program').html(result);
                }
            })
        })
    }
)