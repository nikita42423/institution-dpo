<main class="col-md-9 ms-sm-auto col-lg-11 px-md-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<div class="row">
			<div class="col-auto">
				<h1 class="display-3 text-center mb-3">График курсов</h1>
			</div>
			<div class="col-auto align-self-center">
				<a class="btn btn-primary m-3" href="course/form_course">Формировать</a>
			</div>
			<div class="col-auto align-self-center">
				<div class="dropdown">
					<button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
						Образовательная программа
					</button>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="course/index">Все</a></li>
						<?php foreach($edu_program as $row) {?>
							<li><a class="dropdown-item" href="course/index?ID_ep=<?=$row['ID_ep']?>"><?=$row['name_ep']?></a></li>
						<?php }?>
					</ul>
				</div>
			</div>
			<div class="col-auto align-self-center">
				<div class="dropdown">
					<button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
						Направление
					</button>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="course/index">Все</a></li>
						<?php foreach($focus as $row) {?>
							<li><a class="dropdown-item" href="course/index?ID_focus=<?=$row['ID_focus']?>"><?=$row['name_focus']?></a></li>
						<?php }?>
					</ul>
				</div>
			</div>
			<div class="col-auto align-self-center text-end">
				<h1 class="display-6 text-success mb-3"><?=$this->session->flashdata('msg');?></h1>
			</div>
		</div>
	</div>

	<table id="table_course" class="table table-hover table-bordered border-dark table-sm" style="width:100%">
		<thead>
			<!-- Заголовок -->
			<tr>
				<th class="text-nowrap text-center" rowspan="2">Курс</th>
				<th class="text-table-rotate" rowspan="2">Код ОП</th>
				<th class="text-nowrap text-center" rowspan="2">Наименование ОП</th>
				<?php
				for ($i = 1; $i <= 45; $i++) {
					$data = new DateTime($header_table[$i]);
					echo '<th class="text-table-rotate" style="padding-left: 0px;padding-right: 0px;">'.$data->format('d.m').'</th>';
				}?>
			</tr>
			<tr>
				<?php
				for ($i = 1; $i <= 45; $i++) {
					echo '<th class="text-center" style="padding: 0px;">'.$i.'</th>';
				}?>
			</tr>
		</thead>
		<tbody>
			<?php
				$i=1;
				$j=1;
				$s=0;
				foreach ($course as $row) {
					echo '<tr>';
					$s = $row['count1'] + $row['count2'] + $row['count3'];

					//Проверка, переполнен ли курс
					if ($s >= $row['count_in_group'])
					{
						if ($row['count1'] == 0 && $row['count2'] == 0)
						{
							$class = 'class="table-success';
						}
						else
						{
							$class = 'class="table-danger';
						}

						//занято
						$td1 = '<td colspan="';
						$td2 = '" '.$class.' p-0 text-center align-middle border-dark" data-bs-html="true" data-bs-toggle="tooltip" data-bs-placement="top" title="Подана: '.$row['count1'].'<br>Зачислена: '.$row['count2'].'<br>Окончена: '.$row['count3'].'<br>"><small>'.$s.'<small></td>';
						
						//Курс
						echo '<td class="d-grid gap-2 m-0 pt-1 pb-1"><a class="btn btn-danger btn-sm disabled">'.$row['name_course'].'</a></td>';
					}
					else
					{
						if ($row['count1'] != 0)
						{
							$class = 'class="table-primary';
						} else if ($row['count2'] != 0)
						{
							$class = 'class="table-warning';
						} else if ($row['count3'] != 0)
						{
							$class = 'class="table-success';
						} else
						{
							$class = 'class="table-secondary';
						}

						//свободно
						$td1 = '<td colspan="';
						$td2 = '" '.$class.' p-0 text-center align-middle border-dark" data-bs-html="true" data-bs-toggle="tooltip" data-bs-placement="top" title="Подана: '.$row['count1'].'<br>Зачислена: '.$row['count2'].'<br>Окончена: '.$row['count3'].'<br>"><small>'.$s.'<small></td>';
						
						//Курс (проверка, если курс начнется обучение, то недоступены заявки)
						if ($row['status_course'] == 'Обучение')
						{
							echo '<td class="d-grid gap-2 m-0 pt-1 pb-1"><a class="btn btn-danger btn-sm disabled">'.$row['name_course'].'</a></td>';
						}
						else
						{
							echo '<td class="d-grid gap-2 m-0 pt-1 pb-1"><a class="btn btn-primary btn-sm ">'.$row['name_course'].'</a></td>';
						}
					}
				?>

				<!-- Код ОП -->
				<td class="text-center"><?=$row['ID_ep']?></td>
				<td data-bs-toggle="tooltip" data-bs-placement="top" title="<?=$row['name_ep']?>">
						<span class="d-inline-block text-truncate" style="max-width: 150px;"><?=$row['name_ep']?></span>
					
				</td>
				<?php
				$date1 = new DateTime($row['date_start_teaching']);
				$date2 = new DateTime($row['date_end_teaching']);
				
				for ($i = 1; $i <= 45; $i++) {
					$d = $header_table[$i];
					$date = new DateTime($d);

					if ($date >= $date1 && $date <= $date2) {
						
						if ($date == $date2) {
							echo $td1.$j.$td2;
							$j=1;
						} else {
							$j++;
						}
					}
					else {
						echo "<td></td>";
					}

				}
				echo '</tr>';
			}?>
			
		</tbody>
	</table>
	<div class="mt-3">
		<p><b>Цветы и их обозначения:</b></p>
		<small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-secondary-emphasis bg-secondary-subtle border border-secondary-subtle rounded-2">Свободна</small>
		<small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-2">Подана</small>
		<small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-2">Обучение</small>
		<small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-success-emphasis bg-success-subtle border border-success-subtle rounded-2">Закончена</small>
		<small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-2">Переполнена</small>
	</div>
</main>