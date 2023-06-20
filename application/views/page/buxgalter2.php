
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
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Бухгалтер </a>
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
						<a class="nav-link active" aria-current="page" href="main/out"><button type="button" class="btn btn-outline-dark">ВЫЙТИ ИЗ СИСТЕМЫ</button></a>
					</li>
				</ul>
			</div>
		</nav>

		<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
				<h1 class="h2">
				О полученных доходах
                </h1>
				
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-8"><div>

<div id = "get_income">
	<form class="row g-3" method="post" action="buxgalter2/get_sum">
		<div class="col-md-4">
			<label for="begin_date" class="form-label">C</label>
			<input type="date" class="form-control filter_sum_buxg"  name="date1" id="begin_date">
		</div>
		<div class="col-md-4">
			<label for="end_date" class="form-label">ПО</label>
			<input type="date" class="form-control filter_sum_buxg"  name="date2" id="end_date">
		</div>
				<div class="col-md-4">
		
			<button class="btn btn-primary" type="submit" >OK</button>
		</div>
	<br>


	</form>
</div>

					<div class="col-lg-2"></div>
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
								<th>Курс</th>
								<th>Кол-во мест</th>
								<th>Сумма</th>
							
							</tr>
						</thead>
						<tbody id="example_body">
						<?php foreach($result as $row) {?>
							<tr>
							<td><?=$row['name_ep']?></td>
							<td></td>
							<td><?=$row['count_people']?> / <?=$row['count_in_group']?></td>
							<td><?=$row['price']?></td>
						</tr>
							
						<?php } ?>
							
						</tbody>
					</table>
				</div>

			</div>
		</main>
 	 </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
