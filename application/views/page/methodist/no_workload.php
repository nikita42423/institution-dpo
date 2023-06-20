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
						<th>Дата начала</th>
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
						<td>
							<?php if (!empty($row['name_course']))
							{
								echo $row['name_course'];
							}
							else
							{
								echo '<small class="d-inline-flex px-2 py-1 fw-semibold text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-2">Отсутствует</small>';
							}?>	
						</td>
						<td><?=$row['name_discipline']?></td>
						<td><?=$row['date_start_teaching']?></td>
						<td><?=$row['date_end_teaching']?></td>
						<td><?=$row['amount_hour']?></td>
						<td class="text-end">
                            <!-- Назначить преподаватель -->
                            <div class="dropdown">
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle m-0" type="button" data-bs-toggle="dropdown" aria-expanded="false" <?php if (empty($row['name_course'])) {echo "disabled";}?>>
                                        <i class="bi-person-add" aria-hidden="true"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        <?php
										$i = 0;
										foreach ($teacher as $row1) {
											if ($row['ID_focus'] == $row1['ID_focus']) {?>
                                            	<li><a class="dropdown-item" href="workload/add_workload?ID_teacher=<?=$row1['ID_user']?>&ID_course=<?=$row['ID_course']?>&ID_discipline=<?=$row['ID_discipline']?>&ID_focus=<?=$row['ID_focus']?>"><?=$row1['full_name']?></a></li>
                                        	<?php $i++;} 
										}
										if ($i == 0) {echo '<li><a class="dropdown-item">Нет преподавателя</a></li>';}
										?>
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
		lengthChange:false,
		buttons:['excel', 'pdf'], //['copy', 'csv', 'excel', 'pdf', 'print']
	});
	table.buttons().container().appendTo('#table_workload_wrapper .col-md-6:eq(0)');
});
</script>