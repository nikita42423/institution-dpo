<section id="cours">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 style="text-align: center; padding: 2%; color: blue;"><b>КУРСЫ</b></h1>
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
                <div class="table-responsive">

				<!-- Скрипт для пагинации -->
				<script>
				$(document).ready(function () {
					var table = $('#curs').DataTable({
						
					});

				});
				</script>

				<div class="data_table">
					<table id="curs" class="table" style="width:100%">
						<thead>
							<tr class="text-center">
								<th>Программа </th>
								<!-- <th>Курсы </th> -->
								<th>Цена</th>
								<th></th>
							</tr>
						</thead>
						<tbody id="client_curs">
               <?php foreach($clientcours as $row) {?>
                            <tr class="text-center">
                                <td><?=$row['name_ep']?></td>
                                <td><?=$row['price']?></td>
                                <td><!-- График курсов -->
                                <button class="btn btn-primary viewingCourse" type="button" data-bs-toggle="offcanvas" data-id_ep="<?=$row['ID_ep']?>" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                График курсов</button>

                                 


                                <!-- <button type="button" class="btn btn-primary addStatement" data-bs-toggle="modal" data-bs-target="#addStatement" 
                                data-id_course="<?=$row['ID_course']?>" data-name_course="<?=$row['name_course']?>">
                                  График курсов
                                </button> -->

                             
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
                                    <form id="recept_application" method="post">
                                    <tbody  id="recept_application_tbody">
                                      <?php
                                      $i=1;

                                      foreach ($course as $row) {?>
                                      <tr>
                                      <?php 
                                          if ($row['count_user'] >= $row['count_in_group'])
                                          {
                                            //занято
                                            $td = '<td class="table-danger text-danger-emphasis">-</td>';
                                            echo '<td class="d-grid gap-2 m-0 pt-1 pb-1"><button type="button" class="btn btn-danger btn-sm disabled" >-</button></td>';
                                          }
                                          else
                                          {
                                            //свободно
                                            $td = '<td class="table-primary text-primary-emphasis">+</td>';
                                            echo '<td class="d-grid gap-2 m-0 pt-1 pb-1"><button type="button" class="btn btn-primary btn-sm" onclick="receptionApplication('.$row['ID_course'].', '.$ID_user.')" >Запись</button></td>';
                                          }
                                        ?>

                                        <td><?=$row['name_course']?></td>
                                        <td><?=$row['ID_ep']?></td>
                                        <td><?=$row['short_name']?></td>
                                        <?php
                                       

                                        $date1 = new DateTime($row['date_start_teaching']);
                                        $date2 = new DateTime($row['date_end_teaching']);
                              
                                        for ($i = 1; $i <= 45; $i++) {
                                          $d = $header_table[$i];
                                          $date = new DateTime($d);

                                          if ($date >= $date1 && $date <= $date2) {
                                            echo  $td;
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





                        <!-- <div class="modal fade" id="addStatement" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="nameCourseModal">Курс </h5>
                            </div>
                            <div class="modal-body">
                            <form id="add_statement" method="post">
                              <div class="form-outline mb-4">
                                <input type="hidden" id="ID_course" name="ID_course">
                                <input type="hidden" id="ID_user" name="ID_user" value="<?php echo $ID_user;?>">
                                <label class="form-label">Вы подтверждаете подачу заявки?</label>
                              </div>
                              <div class="d-flex justify-content-center">
                                <button type="submit"
                                  class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Да</button>
                              </div>
                              </form>
                              
                            </div>
                            
                          </div>
                        </div>
                        </div> -->
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
      <h1 style="text-align: center; padding: 2%; color: blue;"><b>О БИЗНЕС - ШКОЛЕ</b></h1>
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


              
  <!-- <section style="background: linear-gradient(90deg, #b9deed, #efefef); padding-bottom: 2%;">
  <div class="container my-5 py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 col-lg-10">
            <h1 style="text-align: center; padding: 2%; color: blue;">ОТЗЫВЫ</h1>
        <div class="card text-dark">
          <div class="card-body p-4">
            <div class="d-flex flex-start">
              <img class="rounded-circle shadow-1-strong me-3"
                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(23).webp" alt="avatar" width="60"
                height="60" />
              <div>
                <h6 class="fw-bold mb-1">Марина Викторова</h6>
                <div class="d-flex align-items-center mb-3">
                  <p class="mb-0">
                    20 мая 2023г
                  </p>
                </div>
                <p class="mb-0">
                Очень хороший образовательный центр. С самого момента начала обучения только положительные эмоции... 
                Всё ясно и понятно! Материал курса адекватный. Прошел повышение квалификации и получил доки в срок по почте после НГ следил по трекномеру как на алиэкспресс. 
                Удостоверение передал в кадры, всё устраивает, вопросов нет. Так что рекомендую.
                </p>
              </div>
            </div>
          </div>

          <hr class="my-0" />

          <div class="card-body p-4">
            <div class="d-flex flex-start">
              <img class="rounded-circle shadow-1-strong me-3"
                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(26).webp" alt="avatar" width="60"
                height="60" />
              <div>
                <h6 class="fw-bold mb-1">Анна Хакаеева</h6>
                <div class="d-flex align-items-center mb-3">
                  <p class="mb-0">
                    18 мая 2023г
                  </p>
                </div>
                <p class="mb-0">
                Прошли дистанционное обучение группой в учебном классе все вместе. Очень было интересно как в институте на очном. 
                Все делились своим опытом. У нас произошло сплочение коллектива, стали чаще общаться на рабочие темы и просто. 
                Повысили квалификацию не только в рамках курса, но и в общем, делились опытом. Время пролетело так быстро с таким позитивом
                </p>
              </div>
            </div>
          </div>

          <hr class="my-0" style="height: 1px;" />

          <div class="card-body p-4">
            <div class="d-flex flex-start">
              <img class="rounded-circle shadow-1-strong me-3"
                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(33).webp" alt="avatar" width="60"
                height="60" />
              <div>
                <h6 class="fw-bold mb-1">Андруа Эритов</h6>
                <div class="d-flex align-items-center mb-3">
                  <p class="mb-0">
                    15 апреля 2023г
                  </p>
                </div>
                <p class="mb-0">
                Прошел профессиональную переподготовку по медицине, все очень быстро оформили, договор и счет прислали в тот же день! Я им прислал на следующий день платежку 
                что оплатил (платежку попросили прислать после оплаты чтобы ускорить) и мне сразу открыли программу обучения на портале. Прошел курс и сдал тест даже раньше. 
                Приезжал в офис в назначенное время забрать документы как договаривались все мне передали без очереди и я расписался о получении. 
                Сейчас выбираю второй курс обучения.
                </p>
              </div>
            </div>
          </div>

          <hr class="my-0" />

          <div class="card-body p-4">
            <div class="d-flex flex-start">
              <img class="rounded-circle shadow-1-strong me-3"
                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(24).webp" alt="avatar" width="60"
                height="60" />
              <div>
                <h6 class="fw-bold mb-1">Екатерина Андреева</h6>
                <div class="d-flex align-items-center mb-3">
                  <p class="mb-0">
                    10 марта 2023г  
                  </p>
                </div>
                <p class="mb-0">
                Мне все понравилось, менеджеры помогли с выбором программы курса, были вежливы и отзывчивы. сам курс выбрала по логистике, 
                обучение проходило максимально интересно, информации очень много, осталась довольна
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->


<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>

