<!-- Модальное окно -->
<div class="modal fade" id="modal_upd_course" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Изменить</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
			</div>

			<form action="course/upd_course" method="post">
				<div class="modal-body">

                    <input type="hidden" id="id_course" name="ID_course" value="">

                    <div class="row mb-3">
                        <div class="col">
                            <label for="date_start_teaching" class="form-label">Дата начала обучения</label>
                            <input type="date" class="form-control" id="date_start_teaching" name="date_start_teaching" required>
                        </div>
                        <div class="col">
                            <label for="date_end_teaching" class="form-label">Дата конца обучения</label>
                            <input type="date" class="form-control" id="date_end_teaching" name="date_end_teaching" required>
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