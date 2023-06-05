<main class="container">

	<div class="row">
		<div class="col-md-auto">
			<h1 class="display-3 mb-3">Нагрузка преподавателей<a class="btn btn-primary m-3" href="teacher/browse">Преподаватель</a>
			</h1>
		</div>
	</div>
	<hr>

	<!-- Фильтр -->
	<div class="container">

		<div class="row g-3 mb-3">
			<div class="col-auto">
				<input type="text" readonly class="form-control-plaintext" value="ФИО преподавателя">
			</div>
			<div class="col-auto">
				<select class="form-select filter_workload" id="id_user">
					<option value="all" selected>Все</option>
					<?php foreach($teacher as $row) {?>
					<option value="<?=$row['ID_user']?>"><?=$row['full_name']?></option>
					<?php }?>
				</select>
			</div>

		</div>
	</div>