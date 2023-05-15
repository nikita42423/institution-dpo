
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

<link href="<?=asset_url()?>/css/sidebar.css" rel="stylesheet">

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Методист ФИО</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-50" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
        <a class="nav-link" href="#">Поиск</a>
        </li>
    </ul>
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
								<img src="<?=asset_url()?>/img/log.png" alt="" width="auto" height="auto" class="img-fluid">
							</div>
							<div class="col-2"></div>
						</div>
					</li>
					<li class="mb-1">
						<button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#info-collapse" aria-expanded="false">
							Справочная информация
						</button>
						<div class="collapse" id="info-collapse">
						<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
							<li><a href="#" class="link-dark rounded">Вид ОП</a></li>
							<li><a href="#" class="link-dark rounded">Направление</a></li>
							<li><a href="#" class="link-dark rounded">Вид документа</a></li>
							<li><a href="#" class="link-dark rounded">Форма обучения</a></li>
						</ul>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">
						<span data-feather="users"></span>
						Образовательная программа
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">
						<span data-feather="bar-chart-2"></span>
						Учебный план
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">
						<span data-feather="dollar-sign"></span>
						График курсов
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">
						<span data-feather="dollar-sign"></span>
						Регистрация преподавателей
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href=""><button type="button" class="btn btn-outline-dark">Выйти из системы</button></a>
					</li>
				</ul>
			</div>
		</nav>

		<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
				<h1 class="h2">Справочная информация</h1>
				<div class="btn-toolbar mb-2 mb-md-0">
					<div class="btn-group me-2">
						<button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
						<button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
					</div>
					<button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
						<span data-feather="calendar"></span>
						This week
					</button>
				</div>
			</div>

			<h2>Вид ОП</h2>
			<form class="row g-3 mb-3" action="<?=base_url('methodist/add_type_ep')?>" method="post">
				<div class="col-auto">
					<input type="text" readonly class="form-control-plaintext" value="Наименование вида ОП">
				</div>
				<div class="col-auto">
					<input type="text" name="name_type_ep" class="form-control" required>
				</div>
				<div class="col-auto">
					<button type="submit" class="btn btn-primary">Добавить</button>
				</div>
			</form>
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
								<th>Наименование вида ОП</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th>1</th>
								<td>название1</td>
								<th>
									<button class="btn btn-primary">Изменить</button>
									<button class="btn btn-danger">Удалить</button>
								</th>
							</tr>
							<tr>
								<th>2</th>
								<td>название2</td>
								<th>
									<button class="btn btn-primary">Изменить</button>
									<button class="btn btn-danger">Удалить</button>
								</th>
							</tr>
							<tr>
								<th>3</th>
								<td>название3</td>
								<th>
									<button class="btn btn-primary">Изменить</button>
									<button class="btn btn-danger">Удалить</button>
								</th>
							</tr>
							<tr>
								<th>4</th>
								<td>название4</td>
								<th>
									<button class="btn btn-primary">Изменить</button>
									<button class="btn btn-danger">Удалить</button>
								</th>
							</tr>
						</tbody>
					</table>
				</div>

			</div>
		</main>
 	 </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
