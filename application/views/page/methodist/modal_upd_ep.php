<!-- Модальное окно -->
<div class="modal fade" id="modal_upd_ep" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Изменение образовательной программы</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
			</div>
            <form action="edu_program/upd_edu_program" method="post">
				<div class="modal-body">
                    <input type="hidden" id="id_ep" name="ID_ep" value="">

					<label for="name_ep" class="form-label"><b>Наименование программы</b></label>
					<input type="text" class="form-control mb-3" id="name_ep" name="name_ep" value="" required>

					<label for="name_profession" class="form-label"><b>Наименование профессии</b></label>
					<input type="text" class="form-control mb-3" id="name_profession" name="name_profession" value="" required>

					<label for="type_cert" class="form-label"><b>Вид итоговой аттестации</b></label>
					<input type="text" class="form-control mb-3" id="type_cert" name="type_cert" value="" required>

					<div class="row mb-3">
						<div class="col">
							<label for="name_type_ep" class="form-label"><b>Вид ОП</b></label>
                            <select class="form-select" id="ID_type_ep" name="ID_type_ep">
                                <option id="name_type_ep" value="" selected></option>
                                <?php foreach($type_ep as $row) {?>
                                <option value="<?=$row['ID_type_ep']?>"><?=$row['name_type_ep']?></option>
                                <?php }?>
                            </select>
						</div>
						<div class="col">
							<label for="name_focus" class="form-label"><b>Направление</b></label>
                            <select class="form-select" id="ID_focus" name="ID_focus">
                                <option id="name_focus" value="" selected></option>
                                <?php foreach($focus as $row) {?>
                                <option value="<?=$row['ID_focus']?>"><?=$row['name_focus']?></option>
                                <?php }?>
                            </select>
						</div>
					</div>

					<div class="row mb-3">
						<div class="col">
							<label for="name_type_doc" class="form-label"><b>Вид документа</b></label>
                            <select class="form-select" id="ID_type_doc" name="ID_type_doc">
                                <option id="name_type_doc" value="" selected></option>
                                <?php foreach($type_doc as $row) {?>
                                <option value="<?=$row['ID_type_doc']?>"><?=$row['name_type_doc']?></option>
                                <?php }?>
                            </select>
						</div>
						<div class="col">
							<label for="name_form" class="form-label"><b>Форма обучения</b></label>
                            <select class="form-select" id="ID_form" name="ID_form">
                                <option id="name_form" value="" selected></option>
                                <?php foreach($form_teach as $row) {?>
                                <option value="<?=$row['ID_form']?>"><?=$row['name_form']?></option>
                                <?php }?>
                            </select>
						</div>
    					<div class="col">
    						<label for="short_name" class="form-label">Краткое наименование</label>
    						<input type="text" class="form-control mb-3" id="short_name" name="short_name" value="" required>
    					</div>
					</div>

					<div class="row mb-5">
						<div class="col">
							<label for="time_week" class="form-label"><b>Срок обучения в неделях</b></label>
							<input type="number" class="form-control" id="time_week" name="time_week" min="0" value="" required>
						</div>
						<div class="col">
							<label for="amount_hour" class="form-label"><b>Объем часов</b></label>
							<input type="number" class="form-control" id="amount_hour" name="amount_hour" min="0" value="" required>
						</div>
						<div class="col">
							<label for="count_in_group" class="form-label"><b>Наполняемость группы</b></label>
							<input type="number" class="form-control" id="count_in_group" name="count_in_group" min="0" value="" required>
						</div>
					</div>

				</div>
                
				<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
					<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Сохранить изменения</button>
				</div>
            </form>
		</div>
	</div>
</div>