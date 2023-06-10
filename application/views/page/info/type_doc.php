<main class="container">

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="display-3 text-center mb-3">Справочная информация</h1>
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
		<div class="data_table">

			<table id="table_type_doc" class="table table-hover" style="width:100%">
				<thead class="table-dark">
					<tr>
						<th>Наименование вида документа</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($type_doc as $row) {?>
					<tr>
						<td class="col-10"><?=$row['name_type_doc']?></td>
						<td class="col-2 text-end">
							<div class="btn-group" role="group">

								<!-- Изменить -->
								<button type="button" class="btn btn-primary m-0" data-bs-toggle="modal"
									data-bs-target="#modal_info"
									data-id_info="<?=$row['ID_type_doc']?>"
									data-name_info="<?=$row['name_type_doc']?>">
									<span data-bs-toggle="tooltip" data-bs-placement="left" title="Изменить"><i class="bi-pencil" aria-hidden="true"></i></span>
								</button>

								<!-- Удалить -->
								<a href="type_doc/del_type_doc?ID_type_doc=<?=$row['ID_type_doc']?>" class="btn btn-dark m-0">
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