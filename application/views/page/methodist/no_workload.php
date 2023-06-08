<!-- Таблица -->
<main class="container">
    <div class="table-responsive">
		<div class="data_table">

            <table id="table_workload" class="table table-hover" style="width:100%">
				<thead class="table-dark">
					<tr>
						<th>Программа</th>
						<th>Курс</th>
						<th>Дисциплина</th>
						<th>Дата старта</th>
						<th>Дата окончания</th>
						<th>Объем часов</th>
						<th></th>
					</tr>
				</thead>
				<tbody id="table_body_no_workload">
					<?php 
                    foreach ($no_workload as $row) {?>
					<tr>
						<td><?=$row['name_ep']?></td>
						<td><?=$row['name_course']?></td>
						<td><?=$row['name_discipline']?></td>
						<td><?=$row['date_start_teaching']?></td>
						<td><?=$row['date_end_teaching']?></td>
						<td><?=$row['amount_hour']?></td>
						<td>
                            <!-- Назначить преподаватель -->
                            <div class="dropdown">
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi-person-add" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        <?php foreach ($teacher as $row1) {?>
                                            <li><a class="dropdown-item" href="workload/add_workload?ID_teacher=<?=$row1['ID_user']?>&ID_course=<?=$row['ID_course']?>&ID_discipline=<?=$row['ID_discipline']?>"><?=$row1['full_name']?></a></li>
                                        <?php }?>
                                    </ul>
                                </div>
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