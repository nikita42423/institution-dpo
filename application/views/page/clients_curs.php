<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>КУРСЫ</h1><hr>
                <form class="row g-3 needs-validation" novalidate>
    <div class="col-md-3">
        <label for="validationCustom04" class="form-label">Направление подготовки</label>
        <select class="form-select" id="validationCustom04">
          <option value="">...</option>
        </select>
      </div>
      <div class="col-md-3">
        <label for="validationCustom04" class="form-label">Уровень образование</label>
        <select class="form-select" id="validationCustom04">
          <option value="">...</option>
        </select>
      </div>
      <div class="col-md-3">
        <label for="validationCustom04" class="form-label">Форма обучения</label>
        <select class="form-select" id="validationCustom04">
          <option value="">...</option>
        </select>
      </div>
      <div class="col-md-3">
        <label for="validationCustom04" class="form-label">Срок обучения</label>
        <select class="form-select" id="validationCustom04">
          <option value="">...</option>
        </select>
      </div>
    
  </form>
                <div class="table-responsive">

				<!-- Скрипт для пагинации -->
				<script>
				$(document).ready(function () {
					var table = $('#curs').DataTable({
						
					});

				});
				</script>

				<div class="data_table">
					<table id="curs" class="table table-striped" style="width:100%">
						<thead>
							<tr class="text-center">
								<th>Программы </th>
								<th>цена</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
                            <tr class="text-center">
                                <td>а</td>
                                <td>1200</td>
                                <td><!-- Кнопка-триггер модального окна -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Подать заявку
</button>

<!-- Модальное окно -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Курс "" </h5>
      </div>
      <div class="modal-body">
      <form action="" method="post">

<div class="form-outline mb-4">
  <input type="text" id="form3Example1cg" class="form-control form-control-lg" required name="full_name"/>
  <label class="form-label" for="form3Example1cg">ФИО</label>
</div>

<div class="form-outline mb-4">
  <input type="text" id="form3Example2cg" class="form-control form-control-lg" required  name="phone1"/>
  <label class="form-label" for="form3Example2cg">Телефон</label>
</div>
<div class="form-outline mb-4">
  <input type="email" id="form3Example3cg" class="form-control form-control-lg" required   name="email1"/>
  <label class="form-label" for="form3Example3cg">E-mail</label>
</div>

<div class="d-flex justify-content-center">
  <button type="submit"
    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">отправить</button>
</div>

</form>
      </div>
      
    </div>
  </div>
</div></td>
                            </tr>
						</tbody>
					</table>
				</div>

			</div>


            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>

</section>