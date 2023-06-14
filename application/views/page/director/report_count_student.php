<!-- <link href="assets/css/dashboard.css" rel="stylesheet"> -->

<main class="ms-sm-auto col-lg-12 px-md-4 container">
    <h1 class="text-center display-6 m-3">Просмотр сведений о количестве обучающихся на курсах</h1>

    <div class="table-responsive">
        <table class="table table-hover table-sm" id="table_count_student">
            <thead class="table-dark">
                <tr>
                    <th colspan="2">Программа</th>
                    <th class="text-center">подана</th>
                    <th class="text-center">зачислена</th>
                    <th class="text-center">окончена</th>
                    <th class="text-center">Всего</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $s1 = 0; $s2 = 0; $s3 = 0; $s4 = 0; $label = ""; $value = "";
                foreach ($count_student as $row) {
                    $s1 += $row['count1'];
                    $s2 += $row['count2'];
                    $s3 += $row['count3'];
                    $ss1 = $row['count1'] + $row['count2'] + $row['count3'];
                    $label .= $row['short_name'].',';
                    $value .= $ss1.',';
                    ?>
                    <tr>
                        <td><?= $row['short_name'] ?></td>
                        <td><?= $row['name_ep'] ?></td>
                        <td class="text-center"><?= $row['count1'] ?></td>
                        <td class="text-center"><?= $row['count2'] ?></td>
                        <td class="text-center"><?= $row['count3'] ?></td>
                        <td class="text-center"><b><?= $ss1 ?></b></td>
                    </tr>
                <?php } ?>
                    <tr>
                        <td colspan="2"><b>Всего</b></td>
                        <td class="text-center"><b><?= $s1 ?></b></td>
                        <td class="text-center"><b><?= $s2 ?></b></td>
                        <td class="text-center"><b><?= $s3 ?></b></td>
                        <td class="text-center"><b><?= $s1 + $s2 + $s3 + $s4 ?></b></td>
                    </tr>
            </tbody>
        </table>

        <!-- Сбор данных -->
        <input type="hidden" id="chart_label" value="<?=$label?>">
        <input type="hidden" id="chart_value" value="<?=$value?>">
    </div>
    


    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Диаграмма <button class="btn btn-primary" id="chart_button">Обновить</button></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>

    <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

</main>

<!-- Скрипт для диаграммы -->
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script src="assets/js/dashboard.js"></script>