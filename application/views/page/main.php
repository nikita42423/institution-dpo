<section id="glav">
        <div class="container">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10" style="margin-top: 2%;">

                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                          <div class="carousel-item active"  data-bs-interval="5000">
                            <img src="assets/img/1.jpg" class="d-block w-100" alt="..." height="500">
                          </div>
                          <div class="carousel-item"  data-bs-interval="5000">
                            <img src="assets/img/2.jpg" class="d-block w-100" alt="..." height="500">
                          </div>
                          <div class="carousel-item"  data-bs-interval="5000">
                            <img src="assets/img/3.jpg" class="d-block w-100" alt="..." height="500">
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>

                </div>
                <div class="col-lg-1"></div>
            </div>
        </div>
    </section>

    <section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 style="text-align: center; padding: 2%; color: blue;">КУРСЫ</h1>
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
								<th>Курсы </th>
								<th>Цена</th>
								<th></th>
							</tr>
						</thead>
						<tbody id="client_curs">
               <?php foreach($clientcours as $row) {?>
                            <tr class="text-center">
                                <td><?=$row['name_ep']?></td>
                                <td><?=$row['name_course']?></td>
                                <td><?=$row['price']?></td>
                                <td><!-- Кнопка-триггер модального окна -->
                                <button type="button" class="btn btn-primary addStatement" data-bs-toggle="modal" data-bs-target="#addStatement" 
                                data-id_course="<?=$row['ID_course']?>" data-name_course="<?=$row['name_course']?>">
                                  Подать заявку
                                </button>

                                <!-- Модальное окно -->
                                </td>
                                </tr>
                            <?php } ?>
                      </tbody>
                    </table>
                  </div>

                </div>
                        <div class="modal fade" id="addStatement" tabindex="-1" role="dialog" aria-hidden="true">
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
                        </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>

</section>
  

    <section id="aboutus" style="margin-bottom: 3%;">
		<div class="container">
      <h1 style="text-align: center; padding: 2%; color: blue;">О БИЗНЕС - ШКОЛЕ</h1>
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

