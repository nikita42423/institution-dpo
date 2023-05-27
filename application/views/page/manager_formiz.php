
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
								<select class="form-select filter_ep" id="ID_course">
									<option value="all" selected>Все</option>
									
									<?php foreach($course as $row) {?>
									<option value="<?=$row['ID_course']?>"><?=$row['name_course']?></option>
									<?php }?>

								</select>
							</div>
							<div class="col-md-3">
								<label for="name_ep" class="form-label">Наименование ОП</label>
								<select class="form-select filter_ep" id="ID_ep">
									<option value="all" selected>Все</option>
									<?php foreach($edu_prog as $row) {?>
									<option value="<?=$row['ID_ep']?>"><?=$row['name_ep']?></option>
									<?php }?>
								</select>
							</div>
							<div class="col-md-3">
							
							<label for="date1" class="form-label">С</label>
							<input type="date" class="form-control" id="date1">
						
							</div>
							<div class="col-md-3">
							<label for="date2" class="form-label">ПО</label>
							<input type="date" class="form-control" id="date2">
							</div>
						</div>
					</div>
				</form>
			</div>

			<div class="table-responsive">

<div class="data_table">
	<table id="zachit" class="table table-striped" style="width:100%;">
		<thead>
			<tr>
				<th>Выбрать</th>
				<th>ФИО слушателей</th>
				<th>Курс</th>
			
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>		
				<div class="form-check ">
				<input class="form-check-input mx-auto" type="checkbox" value="" id="invalidCheck">
				</div>
				</td>

				<td>Харламов И К</td>
				<td>Информационных техологии</td>
	
			</tr>
			
			
		</tbody>
	</table>
	<form>
	<div class="col-12 text-center">
    <button class="btn btn-primary " type="submit">Приняты на обучение</button>
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
				<form class="justify-content-md-center mb-3 card" action="" method="post">
					<div class="card-header">
						Фильтр
					</div>
					<div class="card-body">
						<div class="row">
					
							<div class="col-md-3">
								<label for="name_course" class="form-label">Курс</label>
								<select class="form-select filter_ep" id="ID_course">
									<option value="all" selected>Все</option>
									
									<?php foreach($course as $row) {?>
									<option value="<?=$row['ID_course']?>"><?=$row['name_course']?></option>
									<?php }?>

								</select>
							</div>
							<div class="col-md-3">
								<label for="name_ep" class="form-label">Наименование ОП</label>
								<select class="form-select filter_ep" id="ID_ep">
									<option value="all" selected>Все</option>
									<?php foreach($edu_prog as $row) {?>
									<option value="<?=$row['ID_ep']?>"><?=$row['name_ep']?></option>
									<?php }?>
								</select>
							</div>
							<!-- <div class="col-md-3">
							
							<label for="date1" class="form-label">С</label>
							<input type="date" class="form-control" id="date1">
						
							</div>
							<div class="col-md-3">
							<label for="date2" class="form-label">ПО</label>
							<input type="date" class="form-control" id="date2">
							</div> -->
						</div>
					</div>
				</form>
			</div>

			<div class="table-responsive">

<div class="data_table">
	<table id="zachit" class="table table-striped" style="width:100%;">
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
		<tbody>
			<tr>
				<td>Харламов И К</td>
				<td>ПП4</td>
				<td>Информационных техологии</td>
				<td>2023-05-31</td>
				<td>2023-07-05</td>
				<td>ВА-025 6589000</td>
				<td>2023-07-10</td>
				<td>действительный</td>
				<td><!-- Добавить данные -->
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
				<i class="bi bi-pencil-fill"></i>
				</button>

				<!-- Модальное окно -->
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="exampleModalLabel">Формирование документа окончании об обучении</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
					</div>
					<div class="modal-body">
						
					<form class="row g-3 needs-validation" novalidate>
  <div class="col-12">
    <label for="validationCustom01" class="form-label">ФИО слушателей</label>
    <input type="text" class="form-control" id="validationCustom01" value="" readonly>
    
  </div>
  <div class="col-md-6">
    <label for="validationCustom02" class="form-label">Серия и номер дкумента</label>
    <input type="text" class="form-control" id="validationCustom02" placeholder="XX-XXXX  XXXXXXX">
  </div>

  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">Дата выдачи</label>
    <input type="date" class="form-control" id="validationCustom03">
  </div>
  <div class="col-12">
    <button class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="добавить данные и статус действительный"  type="submit">сохранить</button>
  </div>
</form>

					</div>
					</div>
				</div>
				</div>
			 </td>

			 <td><!-- Изменить данные -->
				<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal2">
				<i class="bi bi-file-earmark-medical-fill"></i>
				</button>

				<!-- Модальное окно -->
				<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="exampleModalLabel2">Изменить статус</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
					</div>
					<div class="modal-body">
						
					<form class="row g-3 needs-validation" novalidate>
  <div class="col-12">
    <label for="validationCustom01" class="form-label">ФИО слушателей</label>
    <input type="text" class="form-control" id="validationCustom01" value="" readonly>
  </div>
  <div class="col-8">
    <label for="validationCustom04" class="form-label">Статус документа</label>
    <select class="form-select" id="validationCustom04">
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
			 </td>

	
			</tr>
			
			
		</tbody>
	</table>


     			</div>
				</div>
			</div>
			</div>


          

<hr>
 


		<div id ="">
			
			</div>
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