<!-- Модальное окно -->
<div class="modal fade" id="modal_upd_teacher" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Изменение</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
			</div>

            <form action="reg_teacher/upd_teacher" method="post">
				<div class="modal-body">

                    <input type="hidden" id="id_user" name="ID_user" value="">
                    <input type="hidden" id="my_login" name="my_login" value="">
                    
                    <label for="full_name" class="form-label">ФИО преподавателя</label>
                    <input type="text" class="form-control mb-3" id="full_name" name="full_name" value="" required>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="profession" class="form-label">Профессия</label>
                            <input type="text" class="form-control" id="profession" name="profession" value="" required>
                        </div>
                        <div class="col">
                            <label for="work_exp" class="form-label">Трудовой стаж</label>
                            <input type="text" class="form-control" id="work_exp" name="work_exp" value="" required>
                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col">
                            <label for="login" class="form-label">Логин</label>
                            <input type="text" class="form-control" id="login" name="login" value="">
                        </div>
                        <div class="col">
                            <label for="passwords" class="form-label">Пароль</label>
                            <input type="password" class="form-control" id="passwords" name="passwords" value="">
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