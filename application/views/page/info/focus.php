<main class="container">

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="display-3 text-center mb-3">Справочная информация</h1>
		<h1 class="display-6 text-center mb-3 text-success"><?=$this->session->userdata('msg')?></h1>
	</div>

	<h2>Направление</h2>
	<form class="row g-3 mb-3" action="focus/add_focus" method="post">
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
		<div class="data_table">

			<table id="table_focus" class="table table-hover" style="width:100%">
				<thead class="table-dark">
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
							<button type="button" class="btn btn-primary m-0" data-bs-toggle="modal"
								data-bs-target="#modal_info"
								data-id_info="<?=$row['ID_focus']?>"
								data-name_info="<?=$row['name_focus']?>">

								<span data-bs-toggle="tooltip" data-bs-placement="left" title="Изменить"><i class="bi-pencil" aria-hidden="true"></i></span>
							</button>

							<!-- Удалить -->
							<a href="focus/del_focus?ID_focus='.<?=$row['ID_focus']?>" class="btn btn-dark m-0">
								<span data-bs-toggle="tooltip" data-bs-placement="right" title="Удалить"><i class="bi-trash" aria-hidden="true"></i>
							</a>
						</td>
					</tr>
					<?php }?>
				</tbody>
			</table>

		</div>
	</div>
</main>