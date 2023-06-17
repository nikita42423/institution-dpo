<main class="container">

	<div class="row">
		<div class="col-md-auto">
			<h1 class="display-3 mb-3">Нагрузка преподавателей<a class="btn btn-primary m-3" href="reg_teacher/browse">Преподаватель</a>
			</h1>
		</div>
	</div>
	<hr>

	<!-- Фильтр -->
	<div class="container">

		<div class="row g-3 mb-3">
			<div class="col-auto">
				<label id="id_focus" class="form-label">Направление</label>
				<select class="form-select filter_teacher_of_focus" id="id_focus_of_workload">
					<option value="">Выбрать...</option>
					<option value="all">Все</option>
					<?php foreach($focus as $row) {?>
					<option value="<?=$row['ID_focus']?>"><?=$row['name_focus']?></option>
					<?php }?>
				</select>
			</div>

			<div class="col-auto">
				<label id="id_user" class="form-label">ФИО преподавателя</label>
				<select class="form-select filter_workload_of_teacher" id="id_teacher_of_workload">
					<!-- Тут список преподавателей -->
				</select>
			</div>

		</div>
	</div>




