<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="display-3 text-center mb-3">Справочная информация</h1>
                <h1 class="display-6 text-center mb-3 text-success"><?=$this->session->userdata('msg')?></h1>
			</div>

			<h2>Форма обучения</h2>
			<form class="row g-3 mb-3" action="form_teach/add_form_teach')?>" method="post">
				<div class="col-auto">
					<input type="text" readonly class="form-control-plaintext" value="Наим. формы обучения">
				</div>
				<div class="col-auto">
					<input type="text" name="name_form" class="form-control" required>
				</div>
				<div class="col-auto">
					<button type="submit" class="btn btn-primary">Добавить</button>
				</div>
			</form>
			<div class="table-responsive">

				<!-- Скрипт для пагинации -->
				<script>
				$(document).ready(function () {
					var table = $('#table_form_teach').DataTable({
						buttons:['excel', 'pdf'] //['copy', 'csv', 'excel', 'pdf', 'print']
					});
					table.buttons().container().appendTo('#table_form_teach_wrapper .col-md-6:eq(0)');
				});
				</script>

				<div class="data_table">
					<table id="table_form_teach" class="table table-striped" style="width:100%">
						<thead>
							<tr>
								<th>№</th>
								<th>Наименование формы обучения</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($form_teach as $row) {?>
							<tr>
								<th scope="row"><?=$row['ID_form']?></th>
								<td><?=$row['name_form']?></td>
								<td>
									<!-- Изменить -->
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?=$row['ID_form']?>">Изменить</button>

									<!-- Модальное окно -->
									<div class="modal fade" id="<?=$row['ID_form']?>" tabindex="-1">
										<div class="modal-dialog modal-dialog-centered">
											<div class="modal-content">
												<div class="modal-header">
													<h1 class="modal-title fs-5" id="exampleModalLabel">Изменение формы обучения</h1>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
												</div>

												<form action="form_teach/upd_form_teach')?>" method="post">
													<div class="modal-body">
														<input type="hidden" name="ID_form" value="<?=$row['ID_form']?>">
														<div>
															<label for="name_form" class="form-label">Наименование формы обучения</label>
															<input type="text" name="name_form" class="form-control" value="<?=$row['name_form']?>" required>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
														<button type="submit" class="btn btn-primary">Сохранить изменения</button>
													</div>
												</form>

											</div>
										</div>
									</div>

									<!-- Удалить -->
									<a href="form_teach/del_form_teach?ID_form=<?=$row['ID_form']?>" class="btn btn-danger">Удалить</a>
								</td>
							</tr>
							<?php }?>
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