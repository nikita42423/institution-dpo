		<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="display-3 text-center mb-3">Регистрация преподавателей</h1>
                <h1 class="display-6 text-center mb-3 text-success"><?=$this->session->userdata('msg')?></h1>
			</div>

			<div class="table-responsive">

				<!-- Скрипт для пагинации -->
				<script>
				$(document).ready(function () {
					var table = $('#table_reg_teacher').DataTable({
						buttons:['excel', 'pdf'] //['copy', 'csv', 'excel', 'pdf', 'print']
					});
					table.buttons().container().appendTo('#table_reg_teacher_wrapper .col-md-6:eq(0)');
				});
				</script>

				<div class="data_table">
					<table id="table_reg_teacher" class="table table-striped" style="width:100%">
						<thead>
							<tr>
								<th>№</th>
								<th>Наименование</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
                            <tr>
                                <th></th>
                                <td></td>
                                <td></td>
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