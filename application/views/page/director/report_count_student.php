<!-- <link href="assets/css/dashboard.css" rel="stylesheet"> -->

<main class="ms-sm-auto col-lg-12 px-md-4 container">
    <h1 class="text-center display-6 m-3">Просмотр сведений о количестве обучающихся на курсах</h1>
    <div class="table-responsive">
        <table class="table table-hover table-sm" id="table_count_student">
            <thead class="table-dark">
                <tr>
                    <th>Вид программы</th>
                    <th>Направление</th>
                    <th>Наименование ОП</th>
                    <th>Кол-во</th>
                    <th>Макс. кол-во</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($course as $row) { ?>
                    <tr>
                        <td><?= $row['name_type_ep'] ?></td>
                        <td><?= $row['name_focus'] ?></td>
                        <td><?= $row['name_ep'] ?></td>
                        <!-- Если кол-во достиг макс, то становится красным цветом -->
                        <?php
                        if ($row['count_user'] == $row['count_in_group']) {
                            echo '<td class="text-danger"><b>' . $row['count_user'] . '</b></td>';
                        } else {
                            echo '<td><b>' . $row['count_user'] . '</b></td>';
                        }
                        ?>
                        <td><b><?= $row['count_in_group'] ?></b></td>
                    </tr>
                <?php } ?>
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

<!-- Скрипт для диаграммы -->
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script src="assets/js/dashboard.js"></script>

<!-- Скрипт для таблицы (поиск и пагинация) -->
<script>
    $(document).ready(function() {
        var table = $('#table_count_student').DataTable({
            lengthChange:false,
            buttons: ['excel', 'pdf'] //['copy', 'csv', 'excel', 'pdf', 'print']
        });
        table.buttons().container().appendTo('#table_count_student_wrapper .col-md-6:eq(0)');
    });
</script>