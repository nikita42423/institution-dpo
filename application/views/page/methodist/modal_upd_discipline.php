<!-- Модальное окно -->
<div class="modal fade" id="modal_upd_discipline" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Изменить</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
			</div>

			<form action="discipline/upd_discipline" method="post">
				<div class="modal-body">

                    <input type="hidden" id="id_ep" name="ID_ep" value="">
                    <input type="hidden" id="id_discipline" name="ID_discipline" value="">

                    <label for="name_discipline" class="form-label">Наименование дисциплины</label>
                    <input type="text" class="form-control mb-3" id="name_discipline" name="name_discipline" value="" required>

                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="amount_hour" class="form-label">Объем часов</label>
                            <input type="number" class="form-control" id="amount_hour" name="amount_hour" min="0" value="" required>
                        </div>
                        <div class="col">
                            <label for="amount_hour_work" class="form-label">Объем часов лаб. и пр. работ</label>
                            <input type="number" class="form-control" id="amount_hour_work" name="amount_hour_work" min="0" value="" required>
                        </div>
                        <div class="col-4">
                            <label for="type_mid_cert" class="form-label">Вид промеж. аттестации</label>
                            <input type="text" class="form-control" id="type_mid_cert" name="type_mid_cert" value="" required>
                        </div>
                    </div>
                    
                    <div class="row mb-5">
                        <div class="col-5">
                            <label for="type_practice" class="form-label">Вид практики (если есть)</label>
                            <input type="text" class="form-control" id="type_practice" name="type_practice" value="">
                        </div>
                        <div class="col">
                            <label for="amount_hour_practice" class="form-label">Объем часов видов практики (если есть)</label>
                            <input type="number" class="form-control" id="amount_hour_practice" name="amount_hour_practice" min="0" value="">
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