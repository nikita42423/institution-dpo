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
					if (!empty($_GET['ID_teacher']))
					{
						$count = 0;
						foreach ($workload as $row) {
							$count += $row['amount_hour'];?>
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

						<?php }
						echo '<tr><td colspan="7"><h3 class="">Всего '.$count.' часов </h3></td></tr>';
					}?>
				</tbody>
			</table>

		</div>

	</div>
</main>