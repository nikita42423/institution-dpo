		<main class="col-md-9 ms-sm-auto col-lg-11 px-md-4">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="display-3 text-center mb-3">График курсов<a class="btn btn-primary m-3" href="course/form_course">Формировать</a></h1>
                <h1 class="display-6 text-center mb-3 text-success"><?=$this->session->userdata('msg')?></h1>
			</div>

			<table id="table_course" class="table table-hover table-bordered border-dark" style="width:100%">
				<thead>
					<tr class="">
						<th class="text-table-rotate" rowspan="2">Курс</th>
						<th class="text-table-rotate" rowspan="2">Код ОП</th>
						<th class="text-nowrap text-center" rowspan="2">Наименование ОП</th>
						<?php
						for ($i = 1; $i <= 45; $i++) {
							echo '<th class="text-table-rotate" style="padding-left: 0px;padding-right: 0px;">'.$header_table[$i].'</th>';
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

					foreach ($course as $row) {?>
					<tr>
						<td><?=$row['name_course']?></td>
						<td><?=$row['ID_ep']?></td>
						<td><?=$row['short_name']?></td>
						<?php
						$color[1]='class="table-primary"';
						$color[2]='class="table-secondary"';
						$color[3]='class="table-success"';
						$color[4]='class="table-danger"';
						$color[5]='class="table-warning"';
						$color[6]='class="table-info"';
						$color[7]='class="table-dark"';

						$date1 = new DateTime($row['date_start_teaching']);
						$date2 = new DateTime($row['date_end_teaching']);
	
						for ($i = 1; $i <= 45; $i++) {
							$d = $header_table[$i];
							$date = new DateTime($d);

							if ($date >= $date1 && $date <= $date2) {
								echo '<td class="table-primary text-primary-emphasis">+</td>';
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
					<small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-2">Свободен</small>
					<small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-2">Занят</small>
			</div>
		</main>
		
 	 </div>
</div>

</body>
</html>