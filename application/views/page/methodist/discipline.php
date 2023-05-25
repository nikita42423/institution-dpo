<!-- Таблица -->
<main class="container">
    <div class="table-responsive">
		<div class="data_table"  id="program">

            <table id="table_discipline" class="table table-hover" style="width:100%">
				<thead class="table-dark">
					<tr>
                        <th>№пп</th>
						<th>Дисциплина</th>
						<th>Объем часов</th>
						<th>Объем часов лаб. и пр. работ</th>
						<th>Вид промеж. аттестации</th>
						<th>Вид практики</th>
						<th>Объем часов видов практики</th>
						<th></th>
					</tr>
				</thead>
				<tbody id="table_body_discipline">
					<?php 
                    $n = 1;
                    foreach ($discipline as $row) {?>
					<tr>
                        <td><?=$n++?></td>
						<td><?=$row['name_discipline']?></td>
						<td><?=$row['amount_hour']?></td>
						<td><?=$row['amount_hour_work']?></td>
						<td><?=$row['type_mid_cert']?></td>
						<td><?=$row['type_practice']?></td>
                        <td><?=$row['amount_hour_practice']?></td>
						<td>
                            <div class="btn-group" role="group">
                                <!-- Изменить -->
								<button type="button" class="btn btn-primary" data-bs-toggle="modal"
									data-bs-target="#modal_upd_discipline"
									data-id_ep="<?=$_GET['ID_ep']?>"
									data-id_discipline="<?=$row['ID_discipline']?>"
									data-name_discipline="<?=$row['name_discipline']?>"
									data-amount_hour="<?=$row['amount_hour']?>"
									data-amount_hour_work="<?=$row['amount_hour_work']?>"
									data-type_mid_cert="<?=$row['type_mid_cert']?>"
									data-type_practice="<?=$row['type_practice']?>"
									data-amount_hour_practice="<?=$row['amount_hour_practice']?>"
									><i class="bi-pencil" aria-hidden="true"></i>
								</button>

                                <!-- Удалить -->
                                <a href="discipline/del_discipline?ID_ep=<?=$_GET['ID_ep']?>&ID_discipline=<?=$row['ID_discipline']?>" class="btn btn-dark">
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
	var table = $('#table_discipline').DataTable({
		buttons:['excel', 'pdf'], //['copy', 'csv', 'excel', 'pdf', 'print']
	});
	table.buttons().container().appendTo('#table_discipline_wrapper .col-md-6:eq(0)');
});

// Обновление таблицы после выбора из выпадающего списка
$('.filter_discipline').change(function () {
	var table = $('#table_discipline').DataTable();
	table.clear().draw();
});
</script>