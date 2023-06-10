<main class="container">
	
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="display-3 text-center mb-3">Справочная информация</h1>
	</div>

	<h2>Вид ОП</h2>
	<form class="row g-3 mb-3" action="type_ep/add_type_ep" method="post">
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
		<div class="data_table">

			<table id="table_type_ep" class="table table-hover" style="width:100%">
				<thead class="table-dark">
					<tr>
						<th>Наименование вида ОП</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($type_ep as $row) {?>
					<tr>
						<td class="col-10"><?=$row['name_type_ep']?></td>
						<td class="col-2 text-end">
							<div class="btn-group" role="group">

								<!-- Изменить -->
								<button type="button" class="btn btn-primary m-0" data-bs-toggle="modal"
									data-bs-target="#modal_info"
									data-id_info="<?=$row['ID_type_ep']?>"
									data-name_info="<?=$row['name_type_ep']?>">
									<span data-bs-toggle="tooltip" data-bs-placement="left" title="Изменить"><i class="bi-pencil" aria-hidden="true"></i></span>
								</button>

								<!-- Удалить -->
								<a href="type_ep/del_type_ep?ID_type_ep='.<?=$row['ID_type_ep']?>" class="btn btn-dark m-0">
									<span data-bs-toggle="tooltip" data-bs-placement="right" title="Удалить"><i class="bi-trash" aria-hidden="true"></i></span>
								</a>
								
							</div>
						</td>
					</tr>
					<?php }?>
				</tbody>
			</table>

		</div>
	</div>
</main>