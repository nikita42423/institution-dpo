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
							<li><a href="<?=base_url('type_ep/browse')?>" class="link-dark rounded">Вид ОП</a></li>
							<li><a href="<?=base_url('focus/browse')?>" class="link-dark rounded">Направление</a></li>
							<li><a href="<?=base_url('type_doc/browse')?>" class="link-dark rounded">Вид документа</a></li>
							<li><a href="<?=base_url('form_teach/browse')?>" class="link-dark rounded">Форма обучения</a></li>
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