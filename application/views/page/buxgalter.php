
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
                    Расчет стоимости услуги
                </h1>
				
			</div>


            <form class="row g-3" action="" method="post">
            <div class="col-md-3">
    <label for="validationDefault04" class="form-label">Образовательная программа</label>
    <select class="form-select tt" id="validationDefault04" name="form_teach">
	<?php foreach ($edu_program as $row) {?>
                        <option value="<?=$row['ID_ep']?>"><?=$row['name_ep']?></option>
                    <?php }?>
    </select>
  </div>
  <div class="col-md-2">
    <label for="disabledTextInput" class="form-label">Кол-во часов</label>
    <input type="text" class="form-control" id="disabledTextInput" value="<?=$row['amount_hour']?>" name=""  disabled>
  </div>
  <div class="col-md-2">
    <label for="disabledTextInput" class="form-label">Форма обучения</label>
    <input type="text" class="form-control" id="disabledTextInput" value="<?=$row['ID_form']?>"  name="" disabled>
  </div>
  <div class="col-md-2">
    <label for="disabledTextInput" class="form-label">Человек</label>
    <input type="text" class="form-control" id="disabledTextInput" value="<?=$row['count_in_group']?>" disabled>
  </div>
</form>


<hr>



		
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
                                     <input type="text" class="form-control" id="validationDefault01">
                                     </div></td>  <td>25252</td>
								
								
							</tr>
                            <tr>
								<td>Оплата труда административно-управленческого и вспомогательного персонала из расчета 30% от суммы оплата труда преподавателей, руб</td>
								<td> <div class="col-md-4">
                                     <input type="text" class="form-control" id="validationDefault01">
                                     </div></td>  <td>25252</td>
								
							</tr>
                            <tr>
								<td>Страховые взносы в размере 30,2% от фонда оплаты труда, руб</td>
								<td> <div class="col-md-4">
                                     <input type="text" class="form-control" id="validationDefault01">
                                     </div></td>  <td>25252</td>
								
							</tr>
                            <tr>
								<td>Отчисления на развитие учебно-материальной базы учреждения в размере 10% от фонда оплаты труда, руб</td>
								<td> <div class="col-md-4">
                                     <input type="text" class="form-control" id="validationDefault01">
                                     </div></td>  <td>25252</td>
								
							</tr>
                            <tr>
								<td>Отчисления для обеспечения деятельности платной услуги в размере 40% от фонда оплаты труда, руб</td>
								<td> <div class="col-md-4">
                                     <input type="text" class="form-control" id="validationDefault01">
                                     </div></td>  <td>25252</td>
								
							</tr>
                            <tr>
								<td>Хозяйственные и канцелярские расходы в размере 2% от фонда оплаты труда, руб</td>
								<td> <div class="col-md-4">
                                     <input type="text" class="form-control" id="validationDefault01">
                                     </div></td>  <td>25252</td>
								
							</tr>
                            <tr>
								<td>Общая сумма затрат, руб</td>
								<td> <div class="col-md-4">
                                     <input type="text" class="form-control" id="validationDefault01">
                                     </div></td>  <td>25252</td>
								
							</tr>
                            <tr>
								<td>Прибыль (20% от общей суммы затрат), руб</td>
								<td> <div class="col-md-4">
                                     <input type="text" class="form-control" id="validationDefault01">
                                     </div></td>  <td>25252</td>
								
							</tr>
                            <tr>
								<td>Общая стоимость услуги, руб</td>
								<td> <div class="col-md-4">
                                     <input type="text" class="form-control" id="validationDefault01">
                                     </div></td>  <td>25252</td>
								
							</tr>
							
						</tbody>
					</table>
				</div>

			</div>
		</main>
 	 </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
