		<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<h1 class="display-3 text-center mb-3">Справочная информация</h1>
    		<h1 class="display-6 text-center mb-3 text-success"><?=$this->session->userdata('msg')?></h1>
				<div class="btn-toolbar mb-2 mb-md-0">
					<div class="btn-group me-2">
						<button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
						<button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
					</div>
					<button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
						<span data-feather="calendar"></span>
						This week
					</button>
				</div>
			</div>

			<h2>Вид ОП</h2>
			<form class="row g-3 mb-3" action="<?=base_url('methodist/add_type_ep')?>" method="post">
				<div class="col-auto">
					<input type="text" readonly class="form-control-plaintext" value="Наименование вида ОП">
				</div>
				<div class="col-auto">
					<input type="text" name="name_type_ep" class="form-control" required>
				</div>
				<div class="col-auto">
					<button type="submit" class="btn btn-primary">Добавить</button>
				</div>
			</form>
			<div class="table-responsive">

				<!-- Скрипт для пагинации -->
				<script>
				$(document).ready(function () {
					var table = $('#table_type_ep').DataTable({
						buttons:['excel', 'pdf'] //['copy', 'csv', 'excel', 'pdf', 'print']
					});

					table.buttons().container().appendTo('#table_type_ep_wrapper .col-md-6:eq(0)');
					
				});
				</script>

				<div class="data_table">
					<table id="table_type_ep" class="table table-striped" style="width:100%">
						<thead>
							<tr>
								<th>№</th>
								<th>Наименование вида ОП</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
			<?php foreach ($type_ep as $row) {?>
            <tr>
                <th scope="row"><?=$row['ID_type_ep']?></th>
                <td><?=$row['name_type_ep']?></td>
                <td>
                    <!-- Изменить -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?=$row['ID_type_ep']?>">Изменить</button>

                    <!-- Модальное окно -->
                    <div class="modal fade" id="<?=$row['ID_type_ep']?>" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Изменение категории</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                                </div>

                                <form class="row g-3 mb-3" action="<?=base_url('type_ep/upd_type_ep')?>" method="post">
                                <div class="modal-body">
                                    <input type="hidden" name="ID_type_ep" value="<?=$row['ID_type_ep']?>">
                                    <div>
                                        <label for="name_type_ep" class="form-label">Название категории</label>
                                        <input type="text" name="name_type_ep" class="form-control" value="<?=$row['name_type_ep']?>" required>
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
                    <a href="<?=base_url('type_ep/del_type_ep?ID_type_ep='.$row['ID_type_ep'])?>" class="btn btn-danger">Удалить</a>
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