<nav class="navbar navbar-dark bg-dark">
	<div class="container-fluid">

		<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDark" aria-controls="offcanvasDark">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand" href="#">Директор <?=$session['full_name']?></a>
		<a class="navbar-brand" href="#"></a>

		<div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDark" aria-labelledby="offcanvasDarkLabel">
			<div class="offcanvas-header">
				<h1 class="offcanvas-title" id="offcanvasDarkLabel">Меню</h1>
				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Закрыть"></button>
			</div>
			<div class="offcanvas-body">
				
			<ul class="navbar-nav justify-content-end flex-grow-1 pe-3 offcanvas-font-size">
				<li class="nav-item mb-3">
					<a class="nav-link" href="director/report_count_student">Просмотр сведений о количестве обучающихся на курсах</a>
				</li>
				<li class="nav-item mb-3">
					<a class="nav-link" href="director/report_rating_ep">Просмотр сведений о рейтинге образовательных программ ДПО</a>
				</li>
				<li class="nav-item mb-3">
					<a class="nav-link" href="director/report_work_teacher">Просмотр сведений о работе преподавателей</a>
				</li>
				<a class="btn btn-outline-light mt-3" href="main/out">Выйти из системы</a>
			</ul>

			</div>
		</div>

	</div>
</nav>

