<main class="container">

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="display-3 text-center mb-3">Справочная информация</h1>
		<h1 class="display-6 text-center mb-3 text-success"><?=$this->session->userdata('msg')?></h1>
	</div>

	<h2>Форма обучения</h2>
	<form class="row g-3 mb-3" action="form_teach/add_form_teach')?>" method="post">
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

			<table id="table_form_teach" class="table table-striped" style="width:100%">
				<thead>
					<tr>
						<th>№</th>
						<th>Наименование формы обучения</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($form_teach as $row) {?>
					<tr>
						<th scope="row"><?=$row['ID_form']?></th>
						<td><?=$row['name_form']?></td>
						<td>
							<!-- Изменить -->
							<button type="button" class="btn btn-primary" data-bs-toggle="modal"
								data-bs-target="#modal_info"
								data-id_info="<?=$row['ID_form']?>"
								data-name_info="<?=$row['name_form']?>">

								<i class="bi-pencil" aria-hidden="true"></i>
							</button>

							<!-- Удалить -->
							<a href="form_teach/del_form_teach?ID_form=<?=$row['ID_form']?>" class="btn btn-danger">
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