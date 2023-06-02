
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
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Бухгалтер <?=$session['full_name']?></a>
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
						<a class="nav-link" href="buxgalter/index">
						<span data-feather="users"></span>
						Расчет стоимости услуги
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="buxgalter2/edu_price_bux">
						<span data-feather="bar-chart-2"></span>
						Образ. программа для цена
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="buxgalter2/index">
						<span data-feather="bar-chart-2"></span>
						О полученных доходах
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
				Образовательная программа
                </h1>
				
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-1"></div>
					<div class="col-lg-10"><div>

					<div class="col-md-auto">
				<form class="justify-content-md-center mb-3 card" method="post">
					<div class="card-header">
						Фильтр
					</div>
					<div class="card-body">
						<div class="row">
					
							<div class="col-auto">
								<label for="name_focus" class="form-label">Направление</label>
								<select class="form-select filter_focus_buxg filter_buxg" id="id_focus">
									<option value="all" selected>Все</option>
									<?php foreach($focus as $row) {?>
									<option value="<?=$row['ID_focus']?>"><?=$row['name_focus']?></option>
									<?php }?>
								</select>
							</div>
							<div class="col-auto">
								<label for="name_type_ep" class="form-label">Вид ОП</label>
								<select class="form-select filter_type_ep_buxg filter_buxg" id="id_type_ep">
									<option value="all" selected>Все</option>
									<?php foreach($type_ep as $row) {?>
									<option value="<?=$row['ID_type_ep']?>"><?=$row['name_type_ep']?></option>
									<?php }?>
								</select>
							</div>
							<div class="col-auto">
								<label for="name_form" class="form-label">Форма обучения</label>
								<select class="form-select filter_form_buxg filter_buxg" id="id_form">
									<option value="all" selected>Все</option>
									<?php foreach($form_teach as $row) {?>
									<option value="<?=$row['ID_form']?>"><?=$row['name_form']?></option>
									<?php }?>
								</select>
							</div>
							<div class="col-auto">
								<label for="name_type_doc" class="form-label">Вид документа</label>
								<select class="form-select filter_type_doc_buxg filter_buxg" id="id_type_doc">
									<option value="all" selected>Все</option>
									<?php foreach($type_doc as $row) {?>
									<option value="<?=$row['ID_type_doc']?>"><?=$row['name_type_doc']?></option>
									<?php }?>
								</select>
							</div>
							
						</div>
					</div>
				</form>

			</div>

					<div class="col-lg-1"></div>
				</div>
			</div>

<hr>
		
			<div class="table-responsive">

				<!-- Скрипт для пагинации -->
				<script>
				$(document).ready(function () {
					var table = $('#example').DataTable({
						buttons:['pdf'] //['copy', 'csv', 'excel', 'pdf', 'print']
					});

					table.buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
					
				});
				</script>

				<div class="data_table">
					<table id="example" class="table table-striped" style="width:100%">
						<thead>
							<tr>
								<th>№</th>
								<th>Наименование программа</th>
								<th>Направление</th>
								<th>Объем часов</th>
								<th>Педчаса</th>
								<th>цена</th>
								<th></th>
							
							</tr>
						</thead>
						<tbody id="search_buxg">
						<?php foreach($edu_p as $row) {?>
							<tr>
								<td><?=$row['ID_ep']?></td>
								<td><?=$row['name_ep']?></td>
								<td><?=$row['name_focus']?></td>
								<td><?=$row['amount_hour']?></td>
								<td><?=$row['cost_hour']?></td>
								<td><?=$row['price']?></td>
								<td>

								<!-- Изменить -->
<button type="button" class="btn btn-primary editPrice" data-bs-toggle="modal" data-bs-target="#editPrice" 
data-id_ep="<?=$row['ID_ep']?>" data-cost_hour="<?=$row['cost_hour']?>" data-price="<?=$row['price']?>">
 изменить
</button>
								</td>	
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
				</div>
<!-- Modal -->
<div class="modal fade" id="editPrice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-body">
	  <form id="edit_price" method="post">
  <div class="mb-3">
	<input type="hidden" id="ID_ep" name="ID_ep">
    <label class="form-label">Педчаса</label>
    <input type="text" class="form-control" id="cost_hour" name="cost_hour" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label class="form-label">Цена</label>
    <input type="text" class="form-control" id="price" name="price">
  </div>
  <button type="submit" class="btn btn-primary">изменить</button>
</form>
  </div>
</div>
  </div>
</div>


			</div>
		</main>
 	 </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
