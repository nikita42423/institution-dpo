<main class="container">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="display-3 text-center mb-3">Справочная информация</h1>
		<h1 class="display-6 text-center mb-3 text-success"><?=$this->session->userdata('msg')?></h1>
	</div>

	<h2>Вид ОП</h2>
	<form class="row g-3 mb-3" action="<?=base_url('type_ep/add_type_ep')?>" method="post">
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
							<button id="start<?=$row['ID_type_ep']?>" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?=$row['ID_type_ep']?>"><i class="bi-pencil" aria-hidden="true"></i></button>

							<!-- Модальное окно -->
							<div class="modal fade" id="<?=$row['ID_type_ep']?>" tabindex="-1">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h1 class="modal-title fs-5" id="exampleModalLabel">Изменение вида ОП</h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
										</div>

										<form action="<?=base_url('type_ep/upd_type_ep')?>" method="post">
											<div class="modal-body">
												<input type="hidden" name="ID_type_ep" value="<?=$row['ID_type_ep']?>">
												<div>
													<label for="name_type_ep" class="form-label">Наименование вида ОП</label>
													<input type="text" id="name_type_ep" name="name_type_ep" class="form-control" value="<?=$row['name_type_ep']?>" required>
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
							<a href="<?=base_url('type_ep/del_type_ep?ID_type_ep='.$row['ID_type_ep'])?>" class="btn btn-danger">
								<i class="bi-trash" aria-hidden="true"></i>
							</a>
						</td>
					</tr>
					<?php }?>
				</tbody>
			</table>
		</div>

	</div>
</main>

<script>
	$(document).ready(function(){
        $('#start1').click(function(){
            let name_type_ep = document.getElementById('name_type_ep').value;
            alert('result');

            $.ajax({
                type: 'POST',
                url: '<?=base_url('type_ep/test')?>',
                data: {name_type_ep: name_type_ep},
                dataType:'html',
                success: function(result) {
                    console.log(result);
                    alert('Есть результат');
                }
            })
        })
    })
</script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>

</body>
</html>