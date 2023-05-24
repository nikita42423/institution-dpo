<!-- Таблица -->

<main class="container">
	<div class="table-responsive">
		<div class="data_table"  id="program">

			<table id="table_ep" class="table table-hover" style="width:100%">
			<thead class="table-dark">
					<tr>
						<th>№</th>
						<td>Наименование</td>
						<td>Направление</td>
						<td>Стоимость</td>
						<td></td>
					</tr>
				</thead>
				<tbody id="table_body_ep">
					<?php foreach ($edu_program as $row) {?>
					<tr>
						<th scope="row"><?=$row['ID_ep']?></th>
						<td>
							<button type="button" data-bs-toggle="modal" class="btn btn-light" 
								data-bs-target="#modal_ep"
								data-id_ep="<?=$row['ID_ep']?>"
								data-name_ep="<?=$row['name_ep']?>"
								data-name_profession="<?=$row['name_profession']?>"
								data-type_cert="<?=$row['type_cert']?>"
								data-name_type_ep="<?=$row['name_type_ep']?>"
								data-name_focus="<?=$row['name_focus']?>"
								data-name_type_doc="<?=$row['name_type_doc']?>"
								data-name_form="<?=$row['name_form']?>"
								data-time_week="<?=$row['time_week']?>"
								data-amount_hour="<?=$row['amount_hour']?>"
								data-count_in_group="<?=$row['count_in_group']?>"
							><span data-bs-toggle="tooltip" data-bs-placement="right" title="Подробнее"><?=$row['name_ep']?></span></button>
						</td>
						<td><?=$row['name_focus']?></td>
						<td><?=$row['price']?></td>
						<td>
							<div class="btn-group" role="group"> 
			
								<!-- Изменить -->
								<button type="button" class="btn btn-primary">
									<span data-bs-toggle="tooltip" data-bs-placement="left" title="Изменить"><i class="bi-pencil" aria-hidden="true"></span></i>
								</button>

								<!-- Учебный план -->
								<a type="submit" class="btn btn-dark" href="discipline/browse_one?ID_ep=<?=$row['ID_ep']?>">Уч. план</a>

								<!-- График курсов -->
								<a type="submit" class="btn btn-dark" href="schedule/browse">График</a>
							
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
		var table = $('#table_ep').DataTable({
			buttons:['excel', 'pdf'] //['copy', 'csv', 'excel', 'pdf', 'print']
		});
		table.buttons().container().appendTo('#table_ep_wrapper .col-md-6:eq(0)');
	});
</script>