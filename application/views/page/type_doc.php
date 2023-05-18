        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="display-3 text-center mb-3">Справочная информация</h1>
                <h1 class="display-6 text-center mb-3 text-success"><?=$this->session->userdata('msg')?></h1>
			</div>

			<h2>Вид документа</h2>
			<form class="row g-3 mb-3" action="type_doc/add_type_doc" method="post">
				<div class="col-auto">
					<input type="text" readonly class="form-control-plaintext" value="Наим. вида документа">
				</div>
				<div class="col-auto">
					<input type="text" name="name_type_doc" class="form-control" required>
				</div>
				<div class="col-auto">
					<button type="submit" class="btn btn-primary">Добавить</button>
				</div>
			</form>
			<div class="table-responsive">

				<!-- Скрипт для пагинации -->
				<script>
				$(document).ready(function () {
					var table = $('#table_type_doc').DataTable({
						buttons:['excel', 'pdf'] //['copy', 'csv', 'excel', 'pdf', 'print']
					});
					table.buttons().container().appendTo('#table_type_doc_wrapper .col-md-6:eq(0)');
				});
				</script>

				<div class="data_table">
					<table id="table_type_doc" class="table table-striped" style="width:100%">
						<thead>
							<tr>
								<th>№</th>
								<th>Наименование вида документа</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($type_doc as $row) {?>
							<tr>
								<th scope="row"><?=$row['ID_type_doc']?></th>
								<td><?=$row['name_type_doc']?></td>
								<td>
									<!-- Изменить -->
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?=$row['ID_type_doc']?>">Изменить</button>

									<!-- Модальное окно -->
									<div class="modal fade" id="<?=$row['ID_type_doc']?>" tabindex="-1">
										<div class="modal-dialog modal-dialog-centered">
											<div class="modal-content">
												<div class="modal-header">
													<h1 class="modal-title fs-5" id="exampleModalLabel">Изменение вида документа</h1>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
												</div>

												<form action="type_doc/upd_type_doc" method="post">
													<div class="modal-body">
														<input type="hidden" name="ID_type_doc" value="<?=$row['ID_type_doc']?>">
														<div>
															<label for="name_type_doc" class="form-label">Наименование вида документа</label>
															<input type="text" name="name_type_doc" class="form-control" value="<?=$row['name_type_doc']?>" required>
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
									<a href="type_doc/del_type_doc?ID_type_doc='.$row['ID_type_doc'])?>" class="btn btn-danger">Удалить</a>
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