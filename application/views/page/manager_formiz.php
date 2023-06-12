
<style>
	.bd-placeholder-img {
	font-size: 1.125rem;
	text-anchor: middle;
	-webkit-user-select: none;
	-moz-user-select: none;
	user-select: none;
	}

	@media (min-width: 768px) {
	.bd-placeholder-img-lg {
		font-size: 3.5rem;
	}
	}
</style>

<link href="assets/css/sidebar.css" rel="stylesheet">

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Менеджер <?=$session['full_name']?></a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</header>

<div class="container-fluid">
  	<div class="row">
		
		<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
			<div class="position-sticky pt-3">
				<ul class="nav flex-column">
					<li class="nav-item">
						<div class="row">
							<div class="col-2"></div>
							<div class="col-8">
								<img src="assets/img/log.png" alt="" width="auto" height="auto" class="img-fluid">
							</div>
							<div class="col-2"></div>
						</div>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" href="manager/zaivk">
						<span data-feather="users"></span>
						Заявки
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="manager/formatiz">
						<span data-feather="bar-chart-2"></span>
						 Формирование для зачисления и документа
						</a>
					</li>
					
					
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="login/kill_all_session"><button type="button" class="btn btn-outline-dark">Выйти из системы</button></a>
					</li>
				</ul>
			</div>
		</nav>

		<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
				<h1 class="h2">
                    Формирование для зачисления и документы об окончании обучения
                </h1>
				
			</div>


			<div class="accordion" id="accordionExample">
			<div class="accordion-item">
				<h2 class="accordion-header">
				<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					Формирование зачисления
				</button>
				</h2>
				<div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
				<div class="accordion-body">
             <!--ФИЛЬТРЫ ДЛЯ ЗАЧИСЛЕНИЯ-->
				<div class="col-md-auto">
				<form class="justify-content-md-center mb-3 card" action="" method="post">
					<div class="card-header">
						Фильтр для зачисления
					</div>
					<div class="card-body">
						<div class="row">
					
							<div class="col-md-3">
								<label for="name_course" class="form-label">Курс</label>
								<select class="form-select filter_accept" id="id_course_accept">
									<option value="all" selected>Все</option>
									
									<?php foreach($course as $row) {?>
									<option value="<?=$row['ID_course']?>"><?=$row['name_course']?></option>
									<?php }?>

								</select>
							</div>
							<div class="col-md-3">
								<label for="name_ep" class="form-label">Наименование ОП</label>
								<select class="form-select filter_accept" id="id_ep_accept">
									<option value="all" selected>Все</option>
									<?php foreach($edu_prog  as $row) {?>
									  <option value="<?=$row['ID_ep']?>"><?=$row['name_ep']?></option>
									<?php }?>
								</select>
							</div>
							
						</div>
					</div>
				</form>
			</div>

			<div class="table-responsive">

<div class="data_table">
	<table id="zachit" class="table" style="width:100%;">
		<thead>
			<tr>
				<th>Выбрать</th>
				<th>ФИО слушателей</th>
				<th>Курс</th>
			
			</tr>
		</thead>
		<tbody id="zachit_tbody">
			<?php foreach($statement as $row) {?>
			<tr>
				<td>		
					<div class="form-check">
						<input class="form-check-input mx-auto" type="checkbox" value="<?=$row['ID_application']?>" id="invalidCheck" name="invalidCheck[]">
					</div>
				</td>
				<td><?=$row['full_name']?></td>
				<td><?=$row['name_course']?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<form id="update_accepted" method="post">
		<div class="row">
			<div class="col-2">
				<button class="btn btn-primary check_button" type="button">Выбрать все</button>
			</div>
			<div class="col-10 text-center">
				<button class="btn btn-primary" type="submit">Приняты на обучение</button>
			</div>
		</div>

	</form>
</div>
</div>
			   </div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					Формирование документы окончании об обучения
				</button>
				</h2>
				<div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
				<div class="accordion-body">

				  <!--ФИЛЬТРЫ ДЛЯ ОКОНЧАНИИ ОБ ОБУЕНИЯ-->
				  <div class="col-md-auto">
				<form class="justify-content-md-center mb-3 card" method="post">
					<div class="card-header">
						Фильтр
					</div>
					<div class="card-body">
						<div class="row">
					
							<div class="col-md-3">
								<label for="name_course" class="form-label">Курс</label>
								<select class="form-select filter_end" id="id_course_end">
									<option value="all" selected>Все</option>
									
									<?php foreach($course as $row) {?>
										<option value="<?=$row['ID_course']?>"><?=$row['name_course']?></option>
									<?php }?>

								</select>
							</div>
							<div class="col-md-3">
								<label for="name_ep" class="form-label">Наименование ОП</label>
								<select class="form-select filter_end" id="id_ep_end">
									<option value="all" selected>Все</option>
									<?php foreach($edu_prog as $row) {?>
										<option value="<?=$row['ID_ep']?>"><?=$row['name_ep']?></option>
									<?php }?>
								</select>
							</div>

							<div class="col-md-3">
								<label for="status" class="form-label">Статус</label>
								<select class="form-select filter_end" id="status_end">
									<option value="all" selected>Все</option>
									<option value="обучение">обучение</option>
									<option value="окончена">окончена</option>

								</select>
							</div>
						
						</div>
					</div>
				</form>
			</div>

			<div class="table-responsive">

<div class="data_table">
	<table id="zachit_end" class="table" style="width:100%;">
		<thead>
			<tr>
				<th>ФИО слушателей</th>
				<th>Курс</th>
				<th>Наименование ОП</th>
				<th>Дата сначала</th>
				<th>Дата окончания</th>
				<th>Серия и номер документа</th>
				<th>Дата  выдачи</th>
				<th>Статус документа</th>
				<th></th>
				<th></th>
			
			</tr>
		</thead>
		<tbody id="zachit_end_tbody">
			<?php foreach($statement_end as $row) {?>
			<tr>
			<td><?=$row['full_name']?></td>
				<td><?=$row['name_course']?></td>
				<td><?=$row['name_ep']?></td>
				<td><?=$row['date_start_teaching']?></td>
				<td><?=$row['date_end_teaching']?></td>
				<td><?=$row['series_doc']?></td>
				<td><?=$row['date_give']?></td>
				<td><?=$row['status_doc']?></td>
				<td><!-- Добавить данные -->
				<button type="button" class="btn btn-primary editEndStatement" data-bs-toggle="modal" 
				data-id_application="<?=$row['ID_application']?>" data-full_name="<?=$row['full_name']?>" 
				data-series_doc="<?=$row['series_doc']?>"
				data-date_give="<?=$row['date_give']?>" data-bs-target="#exampleModal">
				<i class="bi bi-pencil-fill"></i>
				</button>
				</td>
				<td><!-- Изменить данные -->
				<button type="button" class="btn btn-warning editEndStatus" data-id_application="<?=$row['ID_application']?>" data-full_name="<?=$row['full_name']?>" data-status_doc="<?=$row['status_doc']?>" data-bs-toggle="modal" data-bs-target="#exampleModal2">
				<i class="bi bi-file-earmark-medical-fill"></i>
				</button>
			 </td>
			</tr>
			<?php } ?>
		</tbody>
	</table>


				<!-- Модальное окно -->
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="exampleModalLabel">Формирование документа окончании об обучении</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
					</div>
					<div class="modal-body">
						
					<form class="row g-3 needs-validation" method="post" id="editEndStatement">
						<input type="hidden" id="ID_statement_end_save">
  <div class="col-12">
    <label for="full_name_end_save" class="form-label">ФИО слушателей</label>
    <input type="text" class="form-control" id="full_name_end_save" readonly>
    
  </div>
  <div class="col-md-6">
  	<label for="series_doc" class="form-label">Серия и номер дкумента</label>
    <input type="text" class="form-control" id="series_doc" placeholder="XX-XXXX  XXXXXXX">
  </div>

  <div class="col-md-6">
  	<label for="date_give" class="form-label">Дата выдачи</label>
    <input type="date" class="form-control" id="date_give">
  </div>
  <div class="col-12">
    <button class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="добавить данные и статус действительный"  type="submit">сохранить</button>
  </div>
</form>
					</div>
					</div>
				</div>
				</div>
				
				<!-- Модальное окно -->
				<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="exampleModalLabel2">Изменить статус</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
					</div>
					<div class="modal-body">
						
					<form class="row g-3 needs-validation" method="post" id="editEndStatus">
					<input type="hidden" id="ID_statement_end_edit">
  <div class="col-12">
 	 <label for="full_name_end_edit" class="form-label">ФИО слушателей</label>
    <input type="text" class="form-control" id="full_name_end_edit" readonly>
  </div>
  <div class="col-8">
  	<label for="status_doc" class="form-label">Статус документа</label>
    <select class="form-select" id="status_doc">
      <option value="недействительный">недействительный</option>
      <option value="задержанный">задержанный</option>
      <option value="подтвержденный">подтвержденный</option>
    </select>
  </div>
  <div class="col-12">
    <button class="btn btn-primary"  type="submit">изменить</button>
  </div>
</form>
					</div>
					</div>
				</div>
				</div>

     			</div>
				</div>
			</div>
			</div>     

<hr>

		</main>
 	 </div>
</div>

<!-- Скрипт для таблицы (поиск и пагинация) -->
<script>
	$(document).ready(function () {
		var table = $('#zachit').DataTable({
			//buttons:['excel', 'pdf'] //['copy', 'csv', 'excel', 'pdf', 'print']
		});
	//	table.buttons().container().appendTo('#table_ep_wrapper .col-md-6:eq(0)');
	});
</script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>