<!-- <link href="assets/css/dashboard.css" rel="stylesheet"> -->

<div class="container">
    <div class="row">
        <main class="col-md-9 ms-sm-auto col-lg-12 px-md-4">
            <h1 class="text-center display-6 m-3">Просмотр сведений о работе преподавателей</h1>
            <div class="table-responsive">
                <table class="table table-hover" id="table_work_teacher">
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
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script src="assets/js/dashboard.js"></script>

<!-- Скрипт для таблицы (поиск и пагинация) -->
<script>
    $(document).ready(function() {
        var table = $('#table_work_teacher').DataTable({
            lengthChange:false,
            buttons: ['excel', 'pdf'] //['copy', 'csv', 'excel', 'pdf', 'print']
        });
        table.buttons().container().appendTo('#table_work_teacher_wrapper .col-md-6:eq(0)');
    });
</script>