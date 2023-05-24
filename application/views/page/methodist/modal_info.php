<!-- Модальное окно -->
<div class="modal fade" id="modal_info" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Изменить</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
			</div>

			<form action="type_doc/upd_type_doc" method="post">
				<div class="modal-body">
					<input type="hidden" name="id_info" value="" id="id_info">
					<div>
						<input type="text" name="name_info" id="name_info" class="form-control" value="" required>
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