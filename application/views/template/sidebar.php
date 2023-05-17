<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
    Меню
</button>

<div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasLabel">
	<div class="offcanvas-header">
		<h5 class="offcanvas-title" id="offcanvasDarkLabel">Меню</h5>
		<button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvasDark" aria-label="Закрыть"></button>
	</div>
	<div class="offcanvas-body">
		<!-- Тут -->
		<nav class="d-md-block">
			<div class="">
				<ul class="nav flex-column">
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url('type_ep/browse')?>">
						<span data-feather="users"></span>
						Вид ОП
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url('focus/browse')?>">
						<span data-feather="users"></span>
						Направление
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url('type_doc/browse')?>">
						<span data-feather="users"></span>
						Вид документа
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url('form_teach/browse')?>">
						<span data-feather="users"></span>
						Форма обучения
						</a>
					</li>
					<hr>
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url('program/browse')?>">
						<span data-feather="users"></span>
						Образовательная программа
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url('teach_plan/browse')?>">
						<span data-feather="bar-chart-2"></span>
						Учебный план
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url('schedule/browse')?>">
						<span data-feather="dollar-sign"></span>
						График курсов
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?=base_url('reg_teacher/browse')?>">
						<span data-feather="dollar-sign"></span>
						Регистрация преподавателей
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="<?=base_url('main/index')?>"><button type="button" class="btn btn-outline-light">Выйти из системы</button></a>
					</li>
				</ul>
			</div>
		</nav>
		<!-- Тут -->
	</div>
</div>