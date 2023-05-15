
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
					var table = $('#table_type_ep').DataTable({
						buttons:['excel', 'pdf'] //['copy', 'csv', 'excel', 'pdf', 'print']
					});

					table.buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
					
				});
				</script>

				<div class="data_table">
					<table id="table_type_ep" class="table table-striped" style="width:100%">
						<thead>
							<tr>
								<th>№</th>
								<th>Наименование вида ОП</th>
								<th></th>
							</tr>
						</thead>
						<tbody id="tbody_type_ep">
			<?php foreach ($type_ep as $row) {?>
            <tr>
                <th scope="row"><?=$row['ID_type_ep']?></th>
                <td><?=$row['name_type_ep']?></td>
                <td>
                    <!-- Изменить -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?=$row['ID_type_ep']?>">Изменить</button>

                    <!-- Модальное окно -->
                    <div class="modal fade" id="<?=$row['ID_type_ep']?>" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Изменение категории</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                                </div>

                                <form class="row g-3 mb-3" action="<?=base_url('methodist/upd_type_ep')?>" method="post">
                                <div class="modal-body">
                                    <input type="hidden" name="ID_type_ep" value="<?=$row['ID_type_ep']?>">
                                    <div>
                                        <label for="name_type_ep" class="form-label">Название категории</label>
                                        <input type="text" name="name_type_ep" class="form-control" value="<?=$row['name_type_ep']?>" required>
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

					<!-- Удалить -->
                    <a href="<?=base_url('methodist/del_type_ep?ID_type_ep='.$row['ID_type_ep'])?>" class="btn btn-danger">Удалить</a>
                </td>
            </tr>
            <?php }?>
						</tbody>
					</table>
				</div>

			</div>
		</main><button class="btn btn-info" id="example-1">Очень информатично</button>
 	 </div>
</div>

<script>

$(document).ready(function(){              
    $('#example-1').click(function(){
        $(this).load('<?=asset_url()?>/ajax/example.php');       
    }) 
}); 
</script>



<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>

</body>
</html>