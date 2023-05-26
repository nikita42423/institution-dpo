
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

            <div class="col-md-auto">
				<form class="justify-content-md-center mb-3 card" action="" method="post">
					<div class="card-header">
						Фильтр
					</div>
					<div class="card-body">
						<div class="row">
					
							<div class="col-md-3">
								<label for="name_focus" class="form-label">Направление подготовки</label>
								<select class="form-select filter_ep" id="id_focus">
									<option value="all" selected>Все</option>
									<?php foreach($focus as $row) {?>
									<option value="<?=$row['ID_focus']?>"><?=$row['name_focus']?></option>
									<?php }?>
								</select>
							</div>
							<div class="col-md-3">
								<label for="name_type_ep" class="form-label">Уровень образования</label>
								<select class="form-select filter_ep" id="id_type_ep">
									<option value="all" selected>Все</option>
									<?php foreach($type_ep as $row) {?>
									<option value="<?=$row['ID_type_ep']?>"><?=$row['name_type_ep']?></option>
									<?php }?>
								</select>
							</div>
							<div class="col-md-3">
								<label for="name_form" class="form-label">Форма обучения</label>
								<select class="form-select filter_ep" id="id_form">
									<option value="all" selected>Все</option>
									<?php foreach($form_teach as $row) {?>
									<option value="<?=$row['ID_form']?>"><?=$row['name_form']?></option>
									<?php }?>
								</select>
							</div>
							<div class="col-md-3">
								<label for="statuszav" class="form-label">Статус</label>
								<select class="form-select filter_ep" id="statuszav">
									<option value="all" selected>Все</option>
									
									<option value="Подана">Подана</option>
									<option value="Не оплачена">Не оплачена</option>
									<option value="Зачислена">Зачислена</option>
									<option value="Обучение">Обучение</option>
									<option value="Окончена">Окончена</option>
                                
							
								</select>
							</div>
							
						</div>
					</div>
				</form>

			</div>

<hr>
 


		<div id ="">
			<div class="table-responsive">

				<div class="data_table">
					<table id="zayav" class="table table-striped" style="width:100%">
						<thead>
							<tr>
								<th>ФИО заказчик</th>
								<th>Телефон</th>
								<th>Email</th>
								<th>Вид</th>
								<th>Направление</th>
								<th>Наименование ОП</th>
								<th>Курс </th>
								<th>Дата сначала </th>
								<th>Дата окончания</th>
								<th>Дата договора</th>
								<th>Дата оплата</th>
								<th>Статус</th>
								<th></th>
								


							
							</tr>
						</thead>
						<tbody>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
					
                                
								
								<td>
                                    <!-- Принять дата договора-->
                                <button type="button" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="принять дата договора">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
  <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
</svg>
</button>
                                                <!-- Изменить статус-->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
  <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
</svg>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        
                                        <div class="modal-body">
                                            
                                        <form method="POST" action="">
                                    <div class="mb-3">

                                            <label for="statuszav2" class="form-label">Статус</label>
                                            <select class="form-select filter_ep" id="statuszav2">
                                               
                                                
                                                
                                                <option value="Зачислена">Зачислена</option>
                                                <option value="Обучение">Обучение</option>
                                  
                                        
                                            </select>
                                                            
                                    </div>
                                    <button type="submit" class="btn btn-primary">изменить</button>
                                    </form>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                       
                                    
                                    <!-- Удалить ид заявки -->
                                    
                                    <button type="button" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="удалить">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
</svg>
</button>

                                </td>
                              
								
								
							</tr>
                            
							
						</tbody>
					</table>
				</div>
              </div>
			</div>
		</main>
 	 </div>
</div>

<!-- Скрипт для таблицы (поиск и пагинация) -->
<script>
	$(document).ready(function () {
		var table = $('#zayav').DataTable({
			//buttons:['excel', 'pdf'] //['copy', 'csv', 'excel', 'pdf', 'print']
		});
	//	table.buttons().container().appendTo('#table_ep_wrapper .col-md-6:eq(0)');
	});
</script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>