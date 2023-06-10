
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="assets/css/dashboard.css" rel="stylesheet">
    <style type="text/css">/* Chart.js */
    @keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}
    </style>

<div class="container">
  <div class="row">
    <main class="col-md-9 ms-sm-auto col-lg-12 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Отчёт</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>

      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
      <!-- здесь будет запрос из бд
      надо вывести его результаты в html таблицу например -->

      <h2>Просмотр сведений о количестве обучающихся на курсах</h2>
      <div class="table-responsive">
        <table class="table table-hover table-sm">
          <thead>
            <tr>
              <th>Вид программы</th>
              <th>Направление</th>
              <th>Наименование ОП</th>
              <th>Кол-во</th>
              <th>Макс. кол-во</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($course as $row) {?>
                <tr>
                    <td><?=$row['name_type_ep']?></td>
                    <td><?=$row['name_focus']?></td>
                    <td><?=$row['name_ep']?></td>
                    <!-- Если кол-во достиг макс, то становится красным цветом -->
                    <?php
                        if ($row['count_user'] == $row['count_in_group'])
                        {
                            echo '<td class="text-danger"><b>'.$row['count_user'].'</b></td>';
                        }
                        else
                        {
                            echo '<td><b>'.$row['count_user'].'</b></td>';
                        }
                    ?>
                    <td><b><?=$row['count_in_group']?></b></td>
                </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script src="assets/js/dashboard.js"></script>