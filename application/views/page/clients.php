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
						<a class="nav-link" href="main/index">
						<span data-feather="users"></span>
						Главная 
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="clients/lizcab">
						<span data-feather="bar-chart-2"></span>
						 Личный кабинет
						</a>
					</li>
					
					
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="main/out"><button type="button" class="btn btn-outline-dark">Выйти из системы</button></a>
					</li>
				</ul>
			</div>
		</nav>
<main  class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Личный кабинет</h1>
                
            <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
       Персональные данные
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
       
      <form id="edit_client" method="post">

      <div class="form-outline mb-4">
              <?php foreach ($client as $row) {}?>
              <input type="hidden" name="ID_user" id="ID_user" value="<?=$row['ID_user']?>">
                <input type="text" id="full_name" class="form-control form-control-lg" required name="full_name" value="<?=$row['full_name']?>" />
            <label class="form-label" for="full_name">ФИО</label>
      </div>

          <div class="form-outline mb-4">
          <input type="text" id="phone" class="form-control form-control-lg" required  name="phone" value="<?=$row['phone']?>" />
            <label class="form-label" for="phone">Телефон</label>
          </div>
          <div class="form-outline mb-4">
          <input type="text" id="address" class="form-control form-control-lg" required   name="address" value="<?=$row['address']?>" />
            <label class="form-label" for="address">Адрес</label>
          </div>
          <div class="d-flex justify-content-center">
            <button type="submit"
              class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">сохранить</button>
          </div>

        </form>


      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Мои курсы
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">


      <table class="table table-striped" id="history_course">
  <thead>
    <tr>
      <th scope="col">Курсы</th>
      <th scope="col">Направление</th>
      <th scope="col">Наименование ОП</th>
      <th scope="col">Вид</th>
      <th scope="col">Дата начала обучения</th>
      <th scope="col">Дата окончания обучения</th>
      <th scope="col">Телефон</th>
      <th scope="col">E-mail</th>
      <th scope="col">Статус</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($history as $row) {?>
    <tr>
      <td><?=$row['name_course']?></td>
      <td><?=$row['name_focus']?></td>
      <td><?=$row['name_ep']?></td>
      <td><?=$row['name_type_ep']?></td>
      <td><?=$row['date_start_teaching']?></td>
      <td><?=$row['date_end_teaching']?></td>
      <td><?=$row['phone']?></td>
      <td><?=$row['email']?></td>
      <td><?=$row['status_application']?></td>
    </tr>
    <?php } ?>


  </tbody>




    </div>
    </div>
  </div>
</div>

            </div>
        </div>
    </div>
</section>
</main>