<main class="container">
    <div class="row">
        <div class="col-10"><h1 class="display-6 m-3">Добро пожаловать, преподаватель <b><?=$session['full_name']?></b></h1></div>
        <div class="col-2"><a class="btn btn-outline-dark mt-3" href="main/out">Выйти из системы</a></div>
    </div>
    

    <!-- Таблица -->
    <div class="table-responsive">
		<div class="data_table">

            <table id="table_workload" class="table table-hover" style="width:100%">
				<thead class="table-dark">
					<tr>
						<th>Курс</th>
						<th>Наименование ОП</th>
						<th>Дата начала</th>
						<th>Дата окончания</th>
						<th>Дисциплина</th>
						<th>Объем часов</th>
					</tr>
				</thead>
				<tbody>
					<?php
                    if (!empty($workload))
                    {
                        $count = 0;
                        foreach ($workload as $row) {
                            $count += $row['amount_hour'];?>
                            <tr>
                                <td><?=$row['name_course']?></td>
                                <td><?=$row['short_name']?></td>
                                <td><?=$row['date_start_teaching']?></td>
                                <td><?=$row['date_end_teaching']?></td>
                                <td><?=$row['name_discipline']?></td>
                                <td><?=$row['amount_hour']?></td>
                            </tr>

                        <?php }
                        echo '<tr><td colspan="7"><h3 class="">Всего '.$count.' часов </h3></td></tr>';
                    }
                    else
                    {
                        echo '<tr><td colspan="7"><h1 class="text-center mt-3">У вас нет нагрузок, отдыхайте</h1></td></tr>';
                    }?>
				</tbody>
			</table>

		</div>

	</div>
</main>