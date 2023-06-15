<section id="cours">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
              <hr>
                <h1 style="text-align: center; padding: 1%; text-transform:uppercase;
  font-size:52px;
  font-family:'Verdana';
  padding:15px; color: blue; "><b>КУРСЫ</b></h1>
  <hr>
                <form class="row g-3 needs-validation" method="post">
    <div class="col-md-3">
    <label class="form-label">Направление подготовки</label>
        <select class="form-select filter_client" id="id_focus">
          <option value="all" selected>Все</option>
          <?php foreach($focus as $row) {?>
            <option value="<?=$row['ID_focus']?>"><?=$row['name_focus']?></option>
          <?php }?>
        </select>
      </div>
      <div class="col-md-3">
      <label class="form-label">Форма обучения</label>
        <select class="form-select filter_client" id="id_form">
          <option value="all" selected>Все</option>
          <?php foreach($form_teach as $row) {?>
            <option value="<?=$row['ID_form']?>"><?=$row['name_form']?></option>
          <?php }?>
        </select>
      </div>
      <div class="col-md-3">
        <label class="form-label">Период: с</label>
        <input type="date" class="form-control filter_client" id="date1">
      </div>
      <div class="col-md-3">
        <label class="form-label">по</label>
        <input type="date" class="form-control filter_client" id="date2">
        </select>
      </div>
    
  </form>
   <br>
                <div class="table-responsive">

				<!-- Скрипт для пагинации -->
				<!-- <script>
				$(document).ready(function () {
					var table = $('#curs').DataTable({
						
					});

				});
				</script> -->

				<div class="data_table">
					<table id="curs" class="table" style="width:100%">
						<thead>
							<tr>
								<th>Программа </th>
								<!-- <th>Курсы </th> -->
								<th>Цена</th>
								<th></th>
							</tr>
						</thead>
						<tbody id="client_curs">
               <?php foreach($clientcours as $row) {?>
                            <tr>
                                <td><?=$row['name_ep']?></td>
                                <td><?=$row['price']?></td>
                                <td><!-- График курсов -->
                                <button class="btn btn-primary viewingCourse" type="button" data-bs-toggle="offcanvas" data-id_ep="<?=$row['ID_ep']?>" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                График курсов</button>
                                </td>
                             </tr>
                            <?php } ?>
                      </tbody>
                    </table>
                  </div>

                </div>

             

                            <div class="offcanvas offcanvas-end" style="width: 85%;" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                            <div class="offcanvas-header">
                              <h5 class="offcanvas-title" id="offcanvasRightLabel">График курсов</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                              
                            <table id="table_course" class="table table-hover table-bordered border-dark" style="width:100%">
                                    <thead>
                                      <tr class="">
                                      <th class="text-table-rotate" rowspan="2"></th>
                                        <th class="text-table-rotate" rowspan="2">Курс</th>
                                        <th class="text-table-rotate" rowspan="2">Код ОП</th>
                                        <th class="text-nowrap text-center" rowspan="2">Наименование ОП</th>
                                        <?php
                                        for ($i = 1; $i <= 45; $i++) {
                                          echo '<th class="text-table-rotate" style="padding-left: 0px;padding-right: 0px;">'.$header_table[$i].'</th>';
                                        }?>
                                      </tr>
                                      <tr>
                                        <?php
                                        for ($i = 1; $i <= 45; $i++) {
                                          echo '<th class="text-center" style="padding: 0px;">'.$i.'</th>';
                                        }?>
                                      </tr>
                                    </thead>
                                      <?php
                                          // $s = $row['count1'] + $row['count1'] + $row['count1'];
                                          // if ($s >= $row['count_in_group'])
                                          // {
                                          //   //занято
                                          //   $td = '<td class="table-danger text-danger-emphasis">-</td>';
                                          //   echo '<td class="d-grid gap-2 m-0 pt-1 pb-1"><button type="button" class="btn btn-danger btn-sm disabled" >-</button></td>';
                                          // }
                                          // else
                                          // {
                                          //   //свободно
                                          //   $td = '<td class="table-primary text-primary-emphasis">+</td>';
                                          //   echo '<td class="d-grid gap-2 m-0 pt-1 pb-1"><button type="button" class="btn btn-primary btn-sm" onclick="receptionApplication('.$row['ID_course'].', '.$ID_user.')" >Запись</button></td>';
                                          // }
                                        ?>
                                    <form id="recept_application" method="post">
		<tbody>
			<?php
				$i=1;
				$j=1;
				$s=0;
				foreach ($course as $row) {
					echo '<tr>';
					$s = $row['count1'] + $row['count2'] + $row['count3'];

					//Проверка, переполнен ли курс
					if ($s >= $row['count_in_group'])
					{

						//занято
						$td1 = '<td colspan="';
						$td2 = '" class="table-danger" p-0 text-center align-middle border-dark">-</td>';
						
						//Курс
						echo '<td class="d-grid gap-2 m-0 pt-1 pb-1"><button type="button" class="btn btn-danger btn-sm disabled" >-</button></td>';
					}
					else
					{

						//свободно
						$td1 = '<td colspan="';
						$td2 = '" class="table-primary" p-0 text-center align-middle border-dark" data-bs-html="true" data-bs-toggle="tooltip" data-bs-placement="top" title="Подана: '.$row['count1'].'<br>Зачислена: '.$row['count2'].'<br>Окончена: '.$row['count3'].'<br>"><small>'.$s.'<small></td>';
						
						//Курс (проверка, если курс начнется обучение, то недоступены заявки)
						if ($row['status_course'] == 'Обучение')
						{
							echo '<td class="d-grid gap-2 m-0 pt-1 pb-1"><button type="button" class="btn btn-danger btn-sm disabled" >-</button></td>';
						}
						else
						{
              echo '<td class="d-grid gap-2 m-0 pt-1 pb-1"><button type="button" class="btn btn-primary btn-sm" onclick="receptionApplication('.$row['ID_course'].', '.$ID_user.')" >Запись</button></td>';
						}
					}
				?>

				<!-- Код ОП -->
				<td class="text-center"><?=$row['name_course']?></td>
        <td class="text-center"><?=$row['ID_ep']?></td>
				<td data-bs-toggle="tooltip" data-bs-placement="top" title="<?=$row['name_ep']?>">
						<span class="d-inline-block text-truncate" style="max-width: 150px;"><?=$row['name_ep']?></span>
					
				</td>
				<?php
				$date1 = new DateTime($row['date_start_teaching']);
				$date2 = new DateTime($row['date_end_teaching']);
				
				for ($i = 1; $i <= 45; $i++) {
					$d = $header_table[$i];
					$date = new DateTime($d);

					if ($date >= $date1 && $date <= $date2) {
						
						if ($date == $date2) {
							echo $td1.$j.$td2;
							$j=1;
						} else {
							$j++;
						}
					}
					else {
						echo "<td></td>";
					}

				}
				echo '</tr>';
			}?>
			
		</tbody>
                                    </form>
                             </table>


                            </div>
                          </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>

</section>
  
<section class="text-center text-lg-start">
  <style>
    .cascading-right {
      margin-right: -50px;
    }

    @media (max-width: 991.98px) {
      .cascading-right {
        margin-right: 0;
      }
    }
  </style>

  <!-- Jumbotron -->
  <div class="container py-4">
    <div class="row g-0 align-items-center">
      <div class="col-lg-6 mb-5 mb-lg-0">
        <div class="card cascading-right" style=" background: hsla(0, 0%, 100%, 0.55); backdrop-filter: blur(30px);">
          <div class="card-body p-5 shadow-5">
            <h2 class="fw-bold mb-5">Подберём идеальную программу</h2>
            
            <div class="row">
  <div class="col-4">
    <div class="list-group text-center" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="list-home">Профессиональная переподготовка</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="list-profile">Повышение квалификации</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-bs-toggle="list" href="#list-messages" role="tab" aria-controls="list-messages">Общеразвивающая программа</a>
    </div>
  </div>
  <div class="col-8">
    <div class="tab-content text-justify" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list"><b>Профессиональная переподготовка</b> — это обучение и практика 
        для достижения новой карьерной цели. Включает в себя и короткие курсы, на которых можно получить дополнительные навыки для текущей 
        профессии, и получение второго высшего образования по другой специальности, и переквалификацию.</div>
      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list"><b>Повышения квалификации</b> — дать актуальные сведения о нововведениях в профессии, обучить работе в 
      новой программе или на новом оборудовании. <br>
     <b> Повышение квалификации </b> и переподготовка — это дополнительное профессиональное образование. </div>
      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">Дополнительная общеобразовательная <b> (общеразвивающая) программа</b> – это программа для детей и взрослых, определяющая направленность, адресность, 
      структуру, содержание, последовательность, сроки и объём реализации образовательных услуг.</div>
    </div>
  </div>
</div>
           


          </div>
        </div>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0">
      <img src="assets/img/log.png" alt=""  height="" class="w-100 rounded-4 shadow-4">
      
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>


    <section id="aboutus" style="margin-bottom: 3%;">
		<div class="container">
    <hr>
                <h1 style="text-align: center; padding: 1%; text-transform:uppercase;
  font-size:52px;
  font-family:'Verdana';
  padding:15px; color: blue; "><b>О БИЗНЕС - ШКОЛЕ</b></h1>
  <hr>
			<div class="clearfix">
				<img src="assets/img/4.jpg" class="col-md-6 float-md-start mb-3 ms-md-3 m-3" alt="...">
				<div class="text-justify p-3">
					<p ><b style="text-align:center">Цель проекта Все Курсы Онлайн - помогать людям познавать новую информацию каждый день и добиваться успеха в жизни.</b></p> 
					<p style="text-align:justify" >Для этого был создан удобный сайт со всеми образовательными программами онлайн и дистанционными курсами со всего мира.</p>
					<p style="text-align:justify">Главные достоинства проекта - удобный поиск курсов при помощи фильтров и категорий. Можно отобрать только платные курсы онлайн или только курсы онлайн для детей и взрослых. Отдельными спецпроектами выделены образовательные видео и вебинары. Также крайне полезна возможность записаться на курс или уточнить дополнительную информацию посредством функционала сайта Все Курсы Онлайн.</p> 
					<p style="text-align:justify">Все события рынка онлайн-образования освещаются на Всех Курсах Онлайн.</p>
					<p style="text-align:justify">На сайте - удобный дизайн, адаптированный к любым размерам экрана, в том числе будет удобен для просмотра с экранов мобильных устройств.</p>
				</div>
			</div>
		</div>
    </section>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>

