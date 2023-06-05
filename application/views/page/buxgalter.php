
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
						<a class="nav-link active" aria-current="page" href="main/out"><button type="button" class="btn btn-outline-dark">ВЫЙТИ ИЗ СИСТЕМЫ</button></a>
					</li>
				</ul>
			</div>
		</nav>

		<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
				<h1 class="h2">
                    Расчет стоимости услуги
                </h1>
				
			</div>

<div id="show_resh">


            <form class="row g-3" action="" id="filtrbux" method="post">
			<div class="col-md-1">
				<input type="checkbox" class="form-check-input" id="check_price" name="check_price" value="1" checked>
    			<label class="form-check-label" >Прайс = 0</label>
			</div>

			<div class="col-md-3">
				<label for="ID_ep" class="form-label">Образовательная программа</label>
				<select class="form-select rechert" id="ID_ep" name="form_teach">
				<?php foreach ($edu_program as $row) {?>
									<option value="<?=$row['ID_ep']?>"><?=$row['name_ep']?></option>
								<?php }?>
				</select>
			</div>
			<div class="col-md-1" data-bs-target="#modal_ep">
				<label for="amount_hour" class="form-label">Кол-во часов</label>
				<input type="text" class="form-control" id="amount_hour" value="<?=$row['amount_hour']?>"  readonly>
			</div>
			<div class="col-md-2" data-bs-target="#modal_ep">
				<label for="name_form" class="form-label">Форма обучения</label>
				<input type="text" class="form-control" id="name_form" value="<?=$row['name_form']?>" readonly>
			</div>
			<div class="col-md-1" data-bs-target="#modal_ep">
				<label for="count_in_group" class="form-label">Человек</label>
				<input type="text" class="form-control" id="count_in_group" value="<?=$row['count_in_group']?>" id="count_in_group" readonly>
			</div>

			
			<!-- <div class="col-md-2" data-bs-target="#modal_ep">
				<label for="count_in_group" class="form-label">Период с:</label>
				<input type="date" class="form-control" id="count_in_group" value="" id="date1">
			</div>
			<div class="col-md-2" data-bs-target="#modal_ep">
				<label for="count_in_group" class="form-label">по:</label>
				<input type="date" class="form-control" id="count_in_group" value="" id="date2">
			</div> -->
			
			<div class="col-md-2" style="padding-top: 2%">
				<button class="btn btn-primary" type="submit" id="filtrbux_button">Изменить</button>
			</div>

			</form>
</div>

<hr>
 


		<div id ="aaa">
			<div class="table-responsive">

				<div class="data_table">
					<table id="example" class="table table-striped" style="width:100%">
						<thead>
							<tr>
								<th>СТАТЬИ ЗАТРАТ</th>
								<th></th>
								<th>СУММА</th>
							
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Оплата труда преподавателей из расчета стоимости 1 учебного часа работы преподавателя в сумме _____________ руб </td>
								<td> <div class="col-md-4">
                                     <input type="text" class="form-control rechert" id="raster1" value="0">
                                     </div></td>  <td><p id="res1"></p></td>
								
								
							</tr>
                            <tr>
								<td>Оплата труда административно-управленческого и вспомогательного персонала из расчета 30% от суммы оплата труда преподавателей, руб</td>
								<td> <div class="col-md-4">
                                     <input type="text" class="form-control rechert" id="raster2" value="30">
                                     </div></td>  <td><p id="res2"></p></td>
								
							</tr>
                            <tr>
								<td>Страховые взносы в размере 30,2% от фонда оплаты труда, руб</td>
								<td> <div class="col-md-4">
                                     <input type="text" class="form-control rechert" id="raster3" value="30.2"> 
                                     </div></td>  <td><p id="res3"></p></td>
								
							</tr>
                            <tr>
								<td>Отчисления на развитие учебно-материальной базы учреждения в размере 10% от фонда оплаты труда, руб</td>
								<td> <div class="col-md-4">
                                     <input type="text" class="form-control rechert" id="raster4"  value="10">
                                     </div></td>  <td><p id="res4"></p></td>
								
							</tr>
                            <tr>
								<td>Отчисления для обеспечения деятельности платной услуги в размере 40% от фонда оплаты труда, руб</td>
								<td> <div class="col-md-4">
                                     <input type="text" class="form-control rechert" id="raster5" value="40">
                                     </div></td>  <td><p id="res5"></p></td>
								
							</tr>
                            <tr>
								<td>Хозяйственные и канцелярские расходы в размере 2% от фонда оплаты труда, руб</td>
								<td> <div class="col-md-4">
                                     <input type="text" class="form-control rechert" id="raster6" value="2">
                                     </div></td>  <td><p id="res6"></p></td>
								
							</tr>
                            <tr>
								<td>Общая сумма затрат, руб</td>
								<td> <div class="col-md-4">
                                     <input type="text" class="form-control rechert" id="raster7" Disabled >
                                     </div></td>  <td><p id="res7"></p></td>
								
							</tr>
                            <tr>
								<td>Прибыль (20% от общей суммы затрат), руб</td>
								<td> <div class="col-md-4">
                                     <input type="text" class="form-control rechert" id="raster8" value="20">
                                     </div></td>  <td><p id="res8"></p></td>
								
							</tr>
                            <tr>
								<td>Общая стоимость услуги, руб</td>
								<td> <div class="col-md-4">
                                     <input type="text" class="form-control rechert" id="raster9" Disabled>
                                     </div></td>  <td><p id="res9"></p></td>
								
							</tr>
							
						</tbody>
					</table>
				</div>
              </div>
			</div>
		</main>
 	 </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
