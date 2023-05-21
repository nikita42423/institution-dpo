<!-- Модальное окно -->
<div class="modal fade" id="modal_ep" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Подробнее</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
			</div>

			<form action="type_doc/upd_type_doc" method="post">
				<div class="modal-body">

					<label for="name_ep" class="form-label">Наименование программы</label>
					<input type="text" class="form-control mb-3" id="name_ep" name="name_ep" value="" required>

					<label for="name_profession" class="form-label">Наименование профессии</label>
					<input type="text" class="form-control mb-3" id="name_profession" name="name_profession" value="" required>

					<label for="type_cert" class="form-label">Вид итоговой аттестации</label>
					<input type="text" class="form-control mb-3" id="type_cert" name="type_cert" value="" required>

					<div class="row mb-3">
						<div class="col">
							<label for="ID_type_ep" class="form-label">Вид ОП</label>
							<select class="form-select" id="ID_type_ep" name="ID_type_ep">
								<?php foreach($type_ep as $row) {?>
								<option value="<?=$row['ID_type_ep']?>"><?=$row['name_type_ep']?></option>
								<?php }?>
							</select>
						</div>
						<div class="col">
							<label for="ID_focus" class="form-label">Направление</label>
							<select class="form-select" id="ID_focus" name="ID_focus">
								<?php foreach($focus as $row) {?>
								<option value="<?=$row['ID_focus']?>"><?=$row['name_focus']?></option>
								<?php }?>
							</select>
						</div>
					</div>

					<div class="row mb-3">
						<div class="col">
							<label for="ID_type_doc" class="form-label">Вид документа</label>
							<select class="form-select" id="ID_type_doc" name="ID_type_doc">
								<?php foreach($type_doc as $row) {?>
								<option value="<?=$row['ID_type_doc']?>"><?=$row['name_type_doc']?></option>
								<?php }?>
							</select>
						</div>
						<div class="col">
							<label for="ID_form" class="form-label">Форма обучения</label>
							<select class="form-select" id="ID_form" name="ID_form">
								<?php foreach($form_teach as $row) {?>
								<option value="<?=$row['ID_form']?>"><?=$row['name_form']?></option>
								<?php }?>
							</select>
						</div>
					</div>

					<div class="row mb-5">
						<div class="col">
							<label for="time_week" class="form-label">Срок обучения в неделях</label>
							<input type="number" class="form-control" id="time_week" name="time_week" min="0" value="" required>
						</div>
						<div class="col">
							<label for="amount_hour" class="form-label">Объем часов</label>
							<input type="number" class="form-control" id="amount_hour" name="amount_hour" min="0" value="" required>
						</div>
						<div class="col">
							<label for="count_in_group" class="form-label">Наполняемость группы</label>
							<input type="number" class="form-control" id="count_in_group" name="count_in_group" min="0" value="" required>
						</div>
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