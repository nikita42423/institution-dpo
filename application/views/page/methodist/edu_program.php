<main class="container-fluid">

	<div class="row justify-content-md-center">
		<div class="col col-lg-1">
		</div>
		<div class="col-md-auto">
			<h1 class="display-3 text-center mb-3">Образовательная программа</h1>
		</div>
		<div class="col col-lg-1">
			<h1 class="display-6 text-center mb-3 text-success"><?=$this->session->userdata('msg')?></h1>
		</div>
	</div>
	
	<!-- Фильтр -->
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col col-lg-1">
			</div>
			<div class="col-md-auto">

				<form class="justify-content-md-center mb-3 card" action="" method="post">
					<div class="card-header">
						Фильтр
					</div>
					<div class="card-body">
						<div class="row">
					
							<div class="col-auto">
								<label for="name_focus" class="form-label">Направление</label>
								<select class="form-select" id="id_focus">
									<option value="all" selected>Все</option>
									<?php foreach($focus as $row) {?>
									<option value="<?=$row['ID_focus']?>"><?=$row['name_focus']?></option>
									<?php }?>
								</select>
							</div>
							<div class="col-auto">
								<label for="name_type_ep" class="form-label">Вид ОП</label>
								<select class="form-select">
									<option value="all" selected>Все</option>
									<?php foreach($type_ep as $row) {?>
									<option value="<?=$row['ID_type_ep']?>"><?=$row['name_type_ep']?></option>
									<?php }?>
								</select>
							</div>
							<div class="col-auto">
								<label for="name_form" class="form-label">Форма обучения</label>
								<select class="form-select">
									<option value="all" selected>Все</option>
									<?php foreach($form_teach as $row) {?>
									<option value="<?=$row['ID_form']?>"><?=$row['name_form']?></option>
									<?php }?>
								</select>
							</div>
							<div class="col-auto">
								<label for="name_type_doc" class="form-label">Вид документа</label>
								<select class="form-select">
									<option value="all" selected>Все</option>
									<?php foreach($type_doc as $row) {?>
									<option value="<?=$row['ID_type_doc']?>"><?=$row['name_type_doc']?></option>
									<?php }?>
								</select>
							</div>
							
						</div>
					</div>
				</form>

			</div>
			<div class="col col-lg-1">
			</div>
		</div>
	</div>

	<!-- Таблица -->
	<div class="table-responsive">
		<div class="data_table"  id="program">

			<table id="table_program" class="table table-striped" style="width:100%">
				<thead>
					<tr>
						<th>№</th>
						<td>Наименование</td>
						<td>Направление</td>
						<td>Вид ОП</td>
						<td>Форма обучения</td>
						<td>Срок обучения в неделях</td>
						<td>Объем часов</td>
						<td>Вид документа</td>
						<td>Вид итоговой аттестации</td>
						<td>Наименование квалификации</td>
						<td>Наполняемость группы</td>
						<td>Стоимость 1 педчаса</td>
						<td>Цена</td>
						<td></td>
					</tr>
				</thead>
				<tbody id="table_body_program">
					<?php foreach ($edu_program as $row) {?>
					<tr>
						<th scope="row"><?=$row['ID_ep']?></th>
						<td><?=$row['name_ep']?></td>
						<td><?=$row['name_focus']?></td>
						<td><?=$row['name_type_ep']?></td>
						<td><?=$row['name_form']?></td>
						<td><?=$row['time_week']?></td>
						<td><?=$row['amount_hour']?></td>
						<td><?=$row['name_type_doc']?></td>
						<td><?=$row['type_cert']?></td>
						<td><?=$row['name_profession']?></td>
						<td><?=$row['count_in_group']?></td>
						<td><?=$row['cost_hour']?></td>
						<td><?=$row['price']?></td>
						<td>
							<!-- Изменить -->
							<button type="button" class="btn btn-primary">
								<i class="bi-pencil" aria-hidden="true"></i>
							</button>

							<!-- Удалить -->
							<a href="" class="btn btn-danger">
								<i class="bi-trash" aria-hidden="true"></i>
							</a>
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
	var table = $('#table_program').DataTable({
		buttons:['excel', 'pdf'] //['copy', 'csv', 'excel', 'pdf', 'print']
	});
	table.buttons().container().appendTo('#table_program_wrapper .col-md-6:eq(0)');
});
</script>