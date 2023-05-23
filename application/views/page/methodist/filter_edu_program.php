<main class="container-fluid">

	<div class="row justify-content-md-center">
		<div class="col col-lg-1">
		</div>
		<div class="col-md-auto">
			<h1 class="display-3 text-center mb-3">Образовательная программа<a class="btn btn-primary m-3" href="edu_program/add_program">Добавить</a>
			</h1>
		</div>
		<div class="col col-lg-1">
			<h1 class="display-6 text-center mb-3 text-success"><?=$this->session->userdata('msg')?></h1>
		</div>
	</div>
	
	<!-- Фильтр -->
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col col-lg-1"></div>
			<div class="col-md-auto">
				<form class="justify-content-md-center mb-3 card" action="" method="post">
					<div class="card-header">
						Фильтр
					</div>
					<div class="card-body">
						<div class="row">
					
							<div class="col-auto">
								<label for="name_focus" class="form-label">Направление</label>
								<select class="form-select filter_ep" id="id_focus">
									<option value="all" selected>Все</option>
									<?php foreach($focus as $row) {?>
									<option value="<?=$row['ID_focus']?>"><?=$row['name_focus']?></option>
									<?php }?>
								</select>
							</div>
							<div class="col-auto">
								<label for="name_type_ep" class="form-label">Вид ОП</label>
								<select class="form-select filter_ep" id="id_type_ep">
									<option value="all" selected>Все</option>
									<?php foreach($type_ep as $row) {?>
									<option value="<?=$row['ID_type_ep']?>"><?=$row['name_type_ep']?></option>
									<?php }?>
								</select>
							</div>
							<div class="col-auto">
								<label for="name_form" class="form-label">Форма обучения</label>
								<select class="form-select filter_ep" id="id_form">
									<option value="all" selected>Все</option>
									<?php foreach($form_teach as $row) {?>
									<option value="<?=$row['ID_form']?>"><?=$row['name_form']?></option>
									<?php }?>
								</select>
							</div>
							<div class="col-auto">
								<label for="name_type_doc" class="form-label">Вид документа</label>
								<select class="form-select filter_ep" id="id_type_doc">
									<option value="all" selected>Все</option>
									<?php foreach($type_doc as $row) {?>
									<option value="<?=$row['ID_type_doc']?>"><?=$row['name_type_doc']?></option>
									<?php }?>
								</select>
							</div>
							
						</div>
					</div>
				</form>

			</div>
			<div class="col col-lg-1">
			</div>
		</div>
	</div>