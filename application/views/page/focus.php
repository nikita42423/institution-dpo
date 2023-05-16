		<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
				<h1 class="display-3 text-center mb-3">Справочная информация</h1>
				<h1 class="display-6 text-center mb-3 text-success"><?=$this->session->userdata('msg')?></h1>
			</div>

			<h2>Направление</h2>
			<form class="row gy-2 gx-3 align-items-center" action="<?=base_url('focus/add_focus')?>" method="post">
				<div class="col-auto">
					<input type="text" readonly class="form-control-plaintext" value="Наим. направления">
				</div>
				<div class="col-auto">
					<input type="text" name="name_focus" class="form-control" required>
				</div>
				<div class="col-auto">
					<button type="submit" class="btn btn-primary">Добавить</button>
				</div>
			</form>
			<div class="table-responsive">

				<!-- Скрипт для пагинации -->
				<script>
				$(document).ready(function () {
					var table = $('#table_focus').DataTable({
						buttons:['excel', 'pdf'] //['copy', 'csv', 'excel', 'pdf', 'print']
					});
					table.buttons().container().appendTo('#table_focus_wrapper .col-md-6:eq(0)');
				});
				</script>

				<div class="data_table">
					<table id="table_focus" class="table table-striped" style="width:100%">
						<thead>
							<tr>
								<th>№</th>
								<th>Наименование направления</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
			<?php foreach ($focus as $row) {?>
            <tr>
                <th scope="row"><?=$row['ID_focus']?></th>
                <td><?=$row['name_focus']?></td>
                <td>
                    <!-- Изменить -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?=$row['ID_focus']?>">Изменить</button>

                    <!-- Модальное окно -->
                    <div class="modal fade" id="<?=$row['ID_focus']?>" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Изменение направления</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                                </div>

                                <form action="<?=base_url('focus/upd_focus')?>" method="post">
                                    <div class="modal-body">
                                        <input type="hidden" name="ID_focus" value="<?=$row['ID_focus']?>">
                                        <div>
                                            <label for="name_focus" class="form-label">Наименование направления</label>
                                            <input type="text" name="name_focus" class="form-control" value="<?=$row['name_focus']?>" required>
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
                    <a href="<?=base_url('focus/del_focus?ID_focus='.$row['ID_focus'])?>" class="btn btn-danger">Удалить</a>
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