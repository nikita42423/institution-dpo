		<main class="col-md-9 ms-sm-auto col-lg-11 px-md-4">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="display-3 text-center mb-3">График курсов</h1>
                <h1 class="display-6 text-center mb-3 text-success"><?=$this->session->userdata('msg')?></h1>
			</div>

			<div class="table-responsive">

				<div class="table-dark">
					<table id="table_schedule" class="table table-hover table-bordered border-dark" style="width:100%">
						<thead>
							<tr class="">
								<th class="text-table-rotate" rowspan="2">Курс</th>
								<th class="text-table-rotate" rowspan="2">Код ОП</th>
								<th class="text-nowrap text-center" rowspan="2">Наименование ОП</th>
								<?php
								$date = new DateTime('0000-09-01');
								for ($i = 1; $i <= 45; $i++) {
									echo '<th class="text-table-rotate" style="padding-left: 0px;padding-right: 0px;">'.$date->format('d.m').'</th>';
									$date->modify('+7 day');
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
							foreach ($course as $row) {?>
							<tr>
								<td><?=$row['name_course']?></td>
								<td><?=$row['ID_ep']?></td>
								<td><?=$row['name_ep']?></td>
								<?php
								$date = new DateTime('0000-09-01');
								$date1 = new DateTime($row['date_start_teaching']);
								$date2 = new DateTime($row['date_end_teaching']);

								for ($i = 1; $i <= 45; $i++) {
									while ($i <= $row['time_week']) {
										echo "<td>$i</td>";
										$i++;
									}
								}
							echo '</tr>';
							}?>
							
						</tbody>
					</table>
				</div>

			</div>
		</main>
		
 	 </div>
</div>

</body>
</html>