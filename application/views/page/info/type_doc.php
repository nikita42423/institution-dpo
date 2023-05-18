<main class="container">

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
							<button type="button" class="btn btn-primary" data-bs-toggle="modal"
								data-bs-target="#modal_info"
								data-id_info="<?=$row['ID_type_doc']?>"
								data-name_info="<?=$row['name_type_doc']?>">

								<i class="bi-pencil" aria-hidden="true"></i>
							</button>

							<!-- Удалить -->
							<a href="type_doc/del_type_doc?ID_type_doc=<?=$row['ID_type_doc']?>" class="btn btn-danger">
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