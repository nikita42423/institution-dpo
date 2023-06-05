<!-- Таблица -->
<main class="container">
    <div class="table-responsive">
		<div class="data_table">

            <table id="table_workload" class="table table-hover" style="width:100%">
				<thead class="table-dark">
					<tr>
						<th>Курс</th>
						<th>Наименование ОП</th>
						<th>Дата начала</th>
						<th>Дата окончания</th>
						<th>Дисциплина</th>
						<th>Объем часов</th>
						<th></th>
					</tr>
				</thead>
				<tbody id="table_body_workload">
					<?php 
                    foreach ($workload as $row) {?>
					<tr>
						<td><?=$row['name_course']?></td>
						<td><?=$row['short_name']?></td>
						<td><?=$row['date_start_teaching']?></td>
						<td><?=$row['date_end_teaching']?></td>
						<td><?=$row['name_discipline']?></td>
						<td><?=$row['amount_hour']?></td>
						<td>
                            <div class="btn-group" role="group">
                                <!-- Удалить -->
                                <a href="workload/del_workload?ID_load=<?=$row['ID_load']?>" class="btn btn-dark">
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
	var table = $('#table_workload').DataTable({
		buttons:['excel', 'pdf'], //['copy', 'csv', 'excel', 'pdf', 'print']
	});
	table.buttons().container().appendTo('#table_workload_wrapper .col-md-6:eq(0)');
});
</script>