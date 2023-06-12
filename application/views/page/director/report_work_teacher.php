<!-- <link href="assets/css/dashboard.css" rel="stylesheet"> -->

<main class="ms-sm-auto col-lg-12 px-md-4 container">
    <h1 class="text-center display-6 m-3">Просмотр сведений о работе преподавателей</h1>

    <!-- Период с ... по ... -->
    <form class="justify-content-md-center mb-3 card" action="" method="post">
        <div class="card-header">
            Период
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-3">
                    <label for="name_form" class="form-label">Дата с</label>
                    <input type="date" class="form-control filter_work_teacher" id="date1_work_teacher" name="date1_work_teacher">
                </div>
                <div class="col-3">
                    <label for="name_form" class="form-label">Дата по</label>
                    <input type="date" class="form-control filter_work_teacher" id="date2_work_teacher" name="date2_work_teacher">
                </div>
            </div>
        </div>
    </form>

    <div class="table-responsive" id="table_director">
        <table class="table table-hover table-sm" id="table_work_teacher">
            <thead class="table-dark">
                <tr>
                    <th>№</th>
                    <th>ФИО преподавателя</th>
                    <th>Специальность</th>
                    <th>Кол-во часов</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1;
                    foreach ($work_teacher as $row) {?>
                    <tr>
                        <td><?=$i++?></td>
                        <td><?=$row['full_name']?></td>
                        <td><?=$row['profession']?></td>
                        <?php
                            if ($row['sum_hour'] == NULL)
                            {
                                echo '<td><b>0</b></td>';
                            }
                            else
                            {
                                echo '<td><b>'.$row['sum_hour'].'</b></td>';
                            }
                        ?>                    
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Диаграмма</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
    <!-- здесь будет запрос из бд надо вывести его результаты в html таблицу например -->
</main>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script src="assets/js/dashboard.js"></script>