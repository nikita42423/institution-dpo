<main class="container">

	<div class="row">
		<div class="col-md-auto">
			<h3 class="display-4 mb-3">Распределение нагрузки преподавателей<a class="btn btn-primary m-3" href="reg_teacher/browse">Преподаватель</a>
			</h3>
		</div>
	</div>
	<hr>

	<!-- Фильтр -->
	<div class="container">
        <form action="workload/browse_no_load" method="post">
		<div class="row g-3 mb-3">
			<div class="col-auto">
				<label id="id_focus" class="form-label">Направление</label>
                <div class="row">
                    <div class="col">
                    <select class="form-select filter_focus_for_noworkload" id="id_focus_of_no_workload" name="id_focus_of_no_workload">
						<option value="all" <?php if ($ID_focus == NULL) {echo 'selected';}?>>Все</option>
                        <?php foreach($focus as $row) {?>
                        <option value="<?=$row['ID_focus']?>" <?php if ($ID_focus == $row['ID_focus']) {echo 'selected';}?>><?=$row['name_focus']?></option>
                        <?php }?>
                    </select>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Поиск</button>
                    </div>
                </div>
			</div>
		</div>
        </form>
	</div>