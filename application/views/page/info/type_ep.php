<main class="container">
	
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="display-3 text-center mb-3">Справочная информация</h1>
		<h1 class="display-6 text-center mb-3 text-success"><?=$this->session->userdata('msg')?></h1>
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
							<button type="button" class="btn btn-primary" data-bs-toggle="modal"
								data-bs-target="#modal_info"
								data-id_info="<?=$row['ID_type_ep']?>"
								data-name_info="<?=$row['name_type_ep']?>"
								><i class="bi-pencil" aria-hidden="true"></i>
							</button>

							<!-- Удалить -->
							<a href="type_ep/del_type_ep?ID_type_ep='.<?=$row['ID_type_ep']?>" class="btn btn-danger">
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