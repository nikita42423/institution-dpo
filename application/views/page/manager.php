
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
					<hr>
					<li class="nav-item">
					<button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">регистрация для клиента</button>
					</li>
					<hr>
					
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="main/out"><button type="button" class="btn btn-outline-dark">Выйти из системы</button></a>
					</li>


				
				</ul>
			</div>
		</nav>
	
		<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
				<h1 class="h2">
                    Заявки
                </h1>
				
			</div>

            <div class="col-md-auto">
				<form class="justify-content-md-center mb-3 card"  method="post">
					<div class="card-header">
						Фильтр
					</div>
					<div class="card-body">
						<div class="row">
					
							<div class="col-md-3">
								<label for="name_focus" class="form-label">Направление подготовки</label>
								<select class="form-select filter_zayav" id="id_focus">
									<option value="all" selected>Все</option>
									<?php foreach($focus as $row) {?>
									<option value="<?=$row['ID_focus']?>"><?=$row['name_focus']?></option>
									<?php }?>
								</select>
							</div>
							<div class="col-md-3">
								<label for="name_focus" class="form-label">Образовательная программа</label>
								<select class="form-select filter_zayav" id="id_ep">
									<option value="all" selected>Все</option>
									<?php foreach($edu_program  as $row) {?>
									<option value="<?=$row['ID_ep']?>"><?=$row['name_ep']?></option>
									<?php }?>
								</select>
							</div>
							
							<div class="col-md-2">
								<label for="name_form" class="form-label">Форма обучения</label>
								<select class="form-select filter_zayav" id="id_form">
									<option value="all" selected>Все</option>
									<?php foreach($form_teach as $row) {?>
										<option value="<?=$row['ID_form']?>"><?=$row['name_form']?></option>
									<?php }?>
								</select>
							</div>
							
							<div class="col-md-2">
								<label for="status" class="form-label">Статус</label>
								<select class="form-select filter_zayav" id="status">
									<option value="all" selected>Все</option>
									
									<option value="подана">подана</option>
									<option value="зачислена">зачислена</option>
									<option value="обучение">обучение</option>

                                
							
								</select>
							</div>
							<div class="col-md-2">
								<label for="name_form" class="form-label">Курсы</label>
								<select class="form-select filter_zayav" id="id_course">
									<option value="all" selected>Все</option>
									<?php foreach($course  as $row) {?>
										<option value="<?=$row['ID_course']?>"><?=$row['name_course']?></option>
									<?php }?>
								</select>
							</div>
							<div class="col-md-2">
								<label for="name_form" class="form-label">Период с:</label>
								<input type="date" class="form-control filter_zayav" id="date1" >
							</div>
							<div class="col-md-2">
								<label for="name_form" class="form-label">по:</label>
								<input type="date" class="form-control filter_zayav" id="date2" >
							</div>
							
						</div>
				
					</div>
									
				</form>

			
             

           

			</div>

<hr>
 


		<div id ="">
			<div class="table-responsive">

				<div class="data_table">
					<table id="zayav" class="table" style="width:100%">
						<thead>
							<tr>
								<th>№ Заявки</th>
								<th>ФИО клиент</th>
								<th>Телефон</th>
								<th>Email</th>
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
						<form id="edit_application" method="post">
						<tbody id="zayav_tbody">
							<?php foreach($statement as $row) {?>
							<tr>
							    <td><?=$row['ID_application']?></td>	
							  	<td><?=$row['full_name']?></td>	
								<td><?=$row['phone']?></td>	
								<td><?=$row['email']?></td>	
								<td data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="<?=$row['name_ep']?>" class=" text-truncate" style="max-width: 150px;"><?=$row['name_ep']?></td>
								<td><?=$row['name_course']?></td>
								<td><?=$row['date_start_teaching']?></td>
								<td><?=$row['date_end_teaching']?></td>
								<td><?=$row['date_contract']?></td>
								<td><?=$row['date_payment']?></td>
								<td><?=$row['status_application']?></td>
                                						
								<td>
								<?php if($row['status_application'] == 'подана') $visible = 'visible';
										else $visible = 'invisible';
								?>

                                    <!-- Принять дата договора-->
<button type="button" class="btn btn-success  <?=$visible?>" onclick="editStatement(<?=$row['ID_application']?>)" id="success_btn" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="принять дата договора">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
  <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
</svg>
</button>
      
                                  
                                </td>							
							</tr>
							<?php } ?>
                            						
						</tbody>
						</form>
					</table>
				</div>
              </div>
			</div>
		</main>
 	 </div>
</div>

<!-- Скрипт для таблицы (поиск и пагинация) -->
<!-- <script>
	$(document).ready(function () {
		var table = $('#zayav').DataTable({
			//buttons:['excel', 'pdf'] //['copy', 'csv', 'excel', 'pdf', 'print']
		});
	//	table.buttons().container().appendTo('#table_ep_wrapper .col-md-6:eq(0)');
	});
</script> -->

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>



  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
      <section class=" bg-image">
  
  <div class="col-12 ">
    <div class="card" style="border-radius: 15px;">
      <div class="card-body p-5">
        <h2 class="text-uppercase text-center mb-5">РЕГИСТРАЦИЯ</h2>

        <form action="manager/add_client" method="post">

          <div class="form-outline md-4">
            <input type="text" id="form3Example1cg" class="form-control form-control-lg" required name="full_name"/>
            <input type="hidden" id="form3Example1cga" class="form-control form-control-lg" required name="ID_role" value="4"/>
            <label class="form-label" for="form3Example1cg">ФИО</label>
          </div>

          <div class="form-outline md-4">
            <input type="text" id="form3Example2cg" class="form-control form-control-lg" required  name="phone"/>
            <label class="form-label" for="form3Example2cg">Телефон</label>
          </div>
          <div class="form-outline md-4">
            <input type="email" id="form3Example3cg" class="form-control form-control-lg" required   name="email"/>
            <label class="form-label" for="form3Example3cg">E-mail</label>
          </div>

          <div class="form-outline md-4">
            <input type="text" id="form3Example4cdg" class="form-control form-control-lg"  required  name="login"/>
            <label class="form-label" for="form3Example4cdg">Логин</label>
          </div>

          <div class="form-outline md-4">
            <input type="password" id="form3Example5cg" class="form-control form-control-lg" required  name="passwords" />
            <label class="form-label" for="form3Example5cg">Пароль</label>
          </div>

		  <div class="form-outline md-4">
			
			<select class="form-select filter_registr_client" id="id_ep_client">
									<option value="all" selected>Все</option>
									<?php foreach($focus as $row) {?>
									<option value="<?=$row['ID_focus']?>"><?=$row['name_focus']?></option>
									<?php }?>
								</select>
           <label for="name_ep" class="form-label">Образовательная программа</label>
          </div>
		  <div class="form-outline md-4">
		
			<select class="form-select" id="id_course_client" name="id_course_client">
									<option value="all" selected>Все</option>
									<?php foreach($course  as $row) {?>
										<option value="<?=$row['ID_course']?>"><?=$row['name_course']?> <?=date("j.m.y", strtotime($row['date_start_teaching']))?> по <?=date("j.m.y", strtotime($row['date_end_teaching']))?></option>
									<?php }?>
								</select>
		   <label for="name_ep" class="form-label">Курс</label>

          </div>
		  

          <div class="d-flex justify-content-center">
            <button type="submit"
              class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Регистрация</button>
          </div>

        </form>

      </div>
</div>
</div>
</section>
      </div>
      
    </div>
  </div>
</div>

