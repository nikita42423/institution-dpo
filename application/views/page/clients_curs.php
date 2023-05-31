<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>КУРСЫ</h1><hr>
                <form class="row g-3 needs-validation" novalidate>
    <div class="col-md-3">
    <label class="form-label">Направление подготовки</label>
        <select class="form-select filter_client" id="id_focus">
          <option value="all" selected>Все</option>
          <?php foreach($focus as $row) {?>
            <option value="<?=$row['ID_focus']?>"><?=$row['name_focus']?></option>
          <?php }?>
        </select>
      </div>
      <div class="col-md-3">
      <label class="form-label">Форма обучения</label>
        <select class="form-select filter_client" id="id_form">
          <option value="all" selected>Все</option>
          <?php foreach($form_teach as $row) {?>
            <option value="<?=$row['ID_form']?>"><?=$row['name_form']?></option>
          <?php }?>
        </select>
      </div>
      <div class="col-md-3">
        <label class="form-label">Период: с</label>
        <input type="date" class="form-control">
      </div>
      <div class="col-md-3">
        <label class="form-label">по</label>
        <input type="date" class="form-control">
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
								<th>Программа </th>
								<th>Курсы </th>
								<th>Цена</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
               <?php foreach($clientcours as $row) {?>
                            <tr class="text-center">
                                <td><?=$row['name_ep']?></td>
                                <td><?=$row['name_course']?></td>
                                <td><?=$row['price']?></td>
                                <td><!-- Кнопка-триггер модального окна -->
                                <button type="button" class="btn btn-primary addStatement" data-bs-toggle="modal" data-bs-target="#addStatement" 
                                data-id_course="<?=$row['ID_course']?>" data-name_course="<?=$row['name_course']?>">
                                  Подать заявку
                                </button>

                                <!-- Модальное окно -->
                                </td>
                                </tr>
                            <?php } ?>
                      </tbody>
                    </table>
                  </div>

                </div>
                        <div class="modal fade" id="addStatement" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="nameCourseModal">Курс </h5>
                            </div>
                            <div class="modal-body">
                            <form id="add_statement" method="post">
                              <div class="form-outline mb-4">
                                <input type="hidden" id="ID_course" name="ID_course">
                                <input type="hidden" id="ID_user" name="ID_user" value="<?php echo $ID_user;?>">
                                <label class="form-label">Вы подтверждаете подачу заявки?</label>
                              </div>
                              <div class="d-flex justify-content-center">
                                <button type="submit"
                                  class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Да</button>
                              </div>
                              </form>
                              
                            </div>
                            
                          </div>
                        </div>
                        </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>

</section>