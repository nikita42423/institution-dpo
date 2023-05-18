		<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="display-3 text-center mb-3">Образовательная программа</h1>
                <h1 class="display-6 text-center mb-3 text-success"><?=$this->session->userdata('msg')?></h1>
			</div>

			<form class="row gy-2 gx-3 align-items-center" action="focus/add_focus" method="post">
				<label for="name_focus" class="form-label">Направление</label>
				<input type="text" id="name_focus" class="form-control" required>
			</form>

			<div class="table-responsive">

				<!-- Скрипт для пагинации -->
				<script>
				$(document).ready(function () {
					var table = $('#table_program').DataTable({
						buttons:['excel', 'pdf'] //['copy', 'csv', 'excel', 'pdf', 'print']
					});
					table.buttons().container().appendTo('#table_program_wrapper .col-md-6:eq(0)');
				});
				</script>

				<div class="data_table"  id="program">
					<table id="table_program" class="table table-striped" style="width:100%">
						<thead>
							<tr>
								<th>№</th>
								<th>Наименование</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($type_ep as $row) {?>
							<tr>
								<th scope="row"><?=$row['ID_type_ep']?></th>
								<td><?=$row['name_type_ep']?></td>
								<td></td>
                            </tr>
						</tbody>
					</table>
				</div>

			</div>
		</main>
		
 	 </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>

</body>
</html>