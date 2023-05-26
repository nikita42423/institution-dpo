		<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="display-3 text-center mb-3">График курсов</h1>
                <h1 class="display-6 text-center mb-3 text-success"><?=$this->session->userdata('msg')?></h1>
			</div>

			<div class="table-responsive">

				<div class="data_table">
					<table id="table_schedule" class="table table-striped table-hover table-bordered border-dark" style="width:100%">
						<thead>
							<tr>
								<th class="rotate-sm-l-90">Курс</th>
								<th class="rotate-sm-l-90">Код ОП</th>
								<th class="text-nowrap">Наименование ОП</th>
							<?php
								$date = new DateTime('2023-10-01');
								for ($i = 1; $i <= 52; $i++) {
									$date->modify('+7 day');
									echo '<th class="rotate-sm-l-90">'.$date->format('d.m').'</th>';
								}?>
							</tr>
						</thead>
						<tbody>
							<tr>

							</tr>
						</tbody>
					</table>
				</div>

			</div>
		</main>
		
 	 </div>
</div>

</body>
</html>