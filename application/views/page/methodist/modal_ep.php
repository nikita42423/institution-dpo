<!-- Модальное окно -->
<div class="modal fade" id="modal_ep" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Подробнее</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
			</div>
				<div class="modal-body">

					<label for="name_ep" class="form-label">Наименование программы</label>
					<input type="text" class="form-control mb-3" id="name_ep" name="name_ep" value="" readonly>

					<label for="name_profession" class="form-label">Наименование профессии</label>
					<input type="text" class="form-control mb-3" id="name_profession" name="name_profession" value="" readonly>

					<label for="type_cert" class="form-label">Вид итоговой аттестации</label>
					<input type="text" class="form-control mb-3" id="type_cert" name="type_cert" value="" readonly>

					<div class="row mb-3">
						<div class="col">
							<label for="name_type_ep" class="form-label">Вид ОП</label>
							<input type="text" class="form-control mb-3" id="name_type_ep" name="name_type_ep" value="" readonly>
						</div>
						<div class="col">
							<label for="name_focus" class="form-label">Направление</label>
							<input type="text" class="form-control mb-3" id="name_focus" name="name_focus" value="" readonly>
						</div>
					</div>

					<div class="row mb-3">
						<div class="col">
							<label for="name_type_doc" class="form-label">Вид документа</label>
							<input type="text" class="form-control mb-3" id="name_type_doc" name="name_type_doc" value="" readonly>
						</div>
						<div class="col">
							<label for="name_form" class="form-label">Форма обучения</label>
							<input type="text" class="form-control mb-3" id="name_form" name="name_form" value="" readonly>
						</div>
					</div>

					<div class="row mb-5">
						<div class="col">
							<label for="time_week" class="form-label">Срок обучения в неделях</label>
							<input type="number" class="form-control" id="time_week" name="time_week" min="0" value="" readonly>
						</div>
						<div class="col">
							<label for="amount_hour" class="form-label">Объем часов</label>
							<input type="number" class="form-control" id="amount_hour" name="amount_hour" min="0" value="" readonly>
						</div>
						<div class="col">
							<label for="count_in_group" class="form-label">Наполняемость группы</label>
							<input type="number" class="form-control" id="count_in_group" name="count_in_group" min="0" value="" readonly>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
				</div>
			
		</div>
	</div>
</div>