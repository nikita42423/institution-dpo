<nav class="navbar navbar-dark bg-dark">
	<div class="container-fluid">

		<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDark" aria-controls="offcanvasDark">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand" href="#">Менеджер <?=$session['full_name']?></a>
		<a class="navbar-brand" href="#"></a>

		<div class="offcanvas offcanvas-start text-bg-light" tabindex="-1" id="offcanvasDark" aria-labelledby="offcanvasDarkLabel">
			<div class="offcanvas-header">
				<h1 class="offcanvas-title" id="offcanvasDarkLabel"><img src="assets/img/log.png" alt="" width="200" height="200"></h1>
				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Закрыть"></button>
			</div>
			<div class="offcanvas-body">
				
			<ul class="navbar-nav justify-content-end flex-grow-1 pe-3 offcanvas-font-size">
				
				<li class="nav-item mb-3" >
					<a class="nav-link" href="edu_program/browse" style="color:black;">Образовательная программа</a>
				</li>
				<li class="nav-item mb-3">
					<a class="nav-link" href="schedule/index" style="color:black;">График курсов</a>
				</li>
				<li class="nav-item mb-3">
					<a class="nav-link" href="reg_teacher/browse" style="color:black;">Регистрация преподавателей</a>
				</li>
				<a class="btn btn-outline-dark mt-3" href="main/index" >Выйти из системы</a>
			</ul>

			</div>
		</div>

	</div>
</nav>
