<!-- Таблица -->

<main class="container">
	<div class="table-responsive">
		<div class="data_table"  id="program">

			<table id="table_ep" class="table table-hover" style="width:100%">
				<thead class="table-dark">
					<tr>
						<td>Наименование</td>
						<td>Направление</td>
						<td>Стоимость</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($edu_program as $row) {?>
					<tr>
						<td class="col-6">
							<span data-bs-toggle="tooltip" data-bs-placement="right" title="Подробнее">
								<button type="button" data-bs-toggle="modal" class="btn btn-light m-0" 
									data-bs-target="#modal_ep"
									data-id_ep="<?=$row["ID_ep"]?>"
									data-name_ep="<?=$row["name_ep"]?>"
									data-name_profession="<?=$row["name_profession"]?>"
									data-type_cert="<?=$row["type_cert"]?>"
									data-name_type_ep="<?=$row["name_type_ep"]?>"
									data-name_focus="<?=$row["name_focus"]?>"
									data-name_type_doc="<?=$row["name_type_doc"]?>"
									data-name_form="<?=$row["name_form"]?>"
									data-time_week="<?=$row["time_week"]?>"
									data-amount_hour="<?=$row["amount_hour"]?>"
									data-count_in_group="<?=$row["count_in_group"]?>"
								><?=$row["name_ep"]?></button>
							</span>
						</td>
						<td class="col-2"><?=$row["name_focus"]?></td>
						<td class="col-1"><?=$row["price"]?></td>
						<td class="col-3 text-end">
							<div class="btn-group" role="group"> 
			
								<!-- Изменить -->
								<button type="button" class="btn btn-primary m-0">
									<span data-bs-toggle="tooltip" data-bs-placement="left" title="Изменить">
										<i class="bi-pencil" aria-hidden="true"></i>
									</span>
								</button>

								<!-- Учебный план -->
								<a type="submit" class="btn btn-dark m-0" href="discipline/browse_one?ID_ep=<?=$row["ID_ep"]?>">Уч. план</a>

								<!-- График курсов -->
								<a type="submit" class="btn btn-dark m-0" href="course/index?ID_ep=<?=$row["ID_ep"]?>">График</a>
							
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
			lengthChange:false,
			buttons:['excel', 'pdf'] //['copy', 'csv', 'excel', 'pdf', 'print']
		});
		table.buttons().container().appendTo('#table_ep_wrapper .col-md-6:eq(0)');
	});
</script>