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