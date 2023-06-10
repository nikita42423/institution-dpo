<main class="container mb-3">

    <div class="row justify-content-md-center mb-3">
        <div class="col-md-auto">
            <h1 class="display-6 text-center mb-3">Регистрация преподавателя</h1>
        </div>
    </div>

    <form id="form_add_discipline" method="post" action="teacher/add_teacher" role="form" class="row g-3">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                
                <label for="full_name" class="form-label">ФИО преподавателя</label>
                <input type="text" class="form-control mb-3" id="full_name" name="full_name" value="" required>

                <div class="row mb-3">
                    <div class="col">
                        <label for="profession" class="form-label">Профессия</label>
                        <input type="text" class="form-control" id="profession" name="profession" value="" required>
                    </div>
                    <div class="col">
                        <label for="work_exp" class="form-label">Направление</label>
                        <select class="form-select" id="id_focus" name="ID_focus">
                            <?php foreach($focus as $row) {?>
                            <option value="<?=$row['ID_focus']?>"><?=$row['name_focus']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="work_exp" class="form-label">Трудовой стаж</label>
                        <input type="text" class="form-control" id="work_exp" name="work_exp" value="" required>
                    </div>
                </div>
                
                <div class="row mb-5">
                    <div class="col">
                        <label for="login" class="form-label">Логин</label>
                        <input type="text" class="form-control" id="login" name="login" value="">
                    </div>
                    <div class="col">
                        <label for="passwords" class="form-label">Пароль</label>
                        <input type="password" class="form-control" id="passwords" name="passwords" value="">
                    </div>
                </div>

                <button class="btn btn-primary btn-lg container-fluid" type="submit">Добавить</button>

            </div>
            <div class="col-3"></div>
        </div>
    </form>
    
</main>

<!-- Таблица -->
<main class="container">
    <div class="table-responsive">
		<div class="data_table">

            <table id="table_teacher" class="table table-hover" style="width:100%">
				<thead class="table-dark">
					<tr>
						<th>ФИО</th>
						<th>Логин</th>
						<th>Пароль</th>
						<th>Профессия</th>
                        <th>Направление</th>
						<th>Трудовой стаж</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php 
                    foreach ($teacher as $row) {?>
					<tr>
						<td><?=$row['full_name']?></td>
						<td><?=$row['login']?></td>
						<td><?=$row['passwords']?></td>
						<td><?=$row['profession']?></td>
                        <td><?=$row['name_focus']?></td>
						<td><?=$row['work_exp']?></td>
						<td class="text-end">
                            <div class="btn-group" role="group">
                                <!-- Изменить -->
                                <button type="button" class="btn btn-primary m-0" data-bs-toggle="modal"
                                    data-bs-target="#modal_teacher"
                                    data-id_user="<?=$row['ID_user']?>"
                                    data-full_name="<?=$row['full_name']?>"
                                    data-profession="<?=$row['profession']?>"
                                    data-work_exp="<?=$row['work_exp']?>"
                                    data-login="<?=$row['login']?>"
                                    data-passwords="<?=$row['passwords']?>">
                                    <i class="bi-pencil" aria-hidden="true"></i>
                                </button>

                                <!-- Удалить -->
                                <a href="teacher/del_teacher?ID_user=<?=$row['ID_user']?>" class="btn btn-dark m-0">
                                    <i class="bi-trash" aria-hidden="true"></i>
                                </a>
                            </div>
						</td>
					</tr>
					<?php }?>
				</tbody>
			</table>

		</div>

	</div>
</main>

<!-- Скрипт для таблицы (поиск и пагинация) -->
<script>
$(document).ready(function () {
	var table = $('#table_teacher').DataTable({
		buttons:['excel', 'pdf'], //['copy', 'csv', 'excel', 'pdf', 'print']
	});
	table.buttons().container().appendTo('#table_teacher_wrapper .col-md-6:eq(0)');
});
</script>