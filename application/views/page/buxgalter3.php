
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
						<a class="nav-link" href="buxgalter/posmotr_bux">
						<span data-feather="bar-chart-2"></span>
						посмотр история цены
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
				Просмотр история цены
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
					
							<div class="col-md-4">
								<label for="id_ep" class="form-label">Наименование ОП</label>
								<select class="form-select filter_history" id="id_ep">
									<option value="all" selected>Все</option>
									<?php foreach($edu_program  as $row) {?>
									<option value="<?=$row['ID_ep']?>"><?=$row['name_ep']?></option>
									<?php }?>
								</select>
							</div>
							<div class="col-md-2">
								<label for="date1" class="form-label">Период с:</label>
				                <input type="date" class="form-control filter_history" id="date1">
							</div>
							<div class="col-md-2">
							    <label for="date2" class="form-label">Период по:</label>
				                <input type="date" class="form-control filter_history" id="date2">
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
					<table id="example" class="table" style="width:100%">
						<thead>
							<tr>
					
								<th>Наименование ОП</th>
								<th>дата начала</th>
								<th>дата окончания</th>
								<!--<th>Педчаса</th>-->
								<th>Цена</th>
							
							</tr>
						</thead>
						<tbody id="example_history">
						<?php foreach($history  as $row) {?>
							<tr>
								<td><?=$row['name_ep']?></td>
								<td><?=$row['date_start_price']?></td>
								<td><?=$row['date_end_price']?></td>
								<!--<td><?=$row['cost_hour']?></td>-->
								<td><?=$row['price']?></td>	
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
