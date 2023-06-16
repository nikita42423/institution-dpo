<main class="container">

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="display-3 text-center mb-3">Справочная информация</h1>
	</div>

	<h2>Форма обучения</h2>
	<form class="row g-3 mb-3" action="form_teach/add_form_teach" method="post">
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
		<div class="data_table">

			<table id="table_form_teach" class="table table-hover" style="width:100%">
				<thead class="table-dark">
					<tr>
						<th>Наименование формы обучения</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($form_teach as $row) {?>
					<tr>
						<td class="col-10"><?=$row['name_form']?></td>
						<td class="col-2 text-end">
							<div class="btn-group" role="group">

								<!-- Изменить -->
								<button type="button" class="btn btn-primary m-0" data-bs-toggle="modal"
									data-bs-target="#modal_info"
									data-id_info="<?=$row['ID_form']?>"
									data-name_info="<?=$row['name_form']?>">
									<span data-bs-toggle="tooltip" data-bs-placement="left" title="Изменить"><i class="bi-pencil" aria-hidden="true"></i></span>
								</button>

								<!-- Удалить -->
								<a href="form_teach/del_form_teach?ID_form=<?=$row['ID_form']?>" class="btn btn-dark m-0">
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