<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Личный кабинет</h1>

            <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
       Персональные данные
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
       
      <form id="edit_client" method="post">

      <div class="form-outline mb-4">
              <?php foreach ($client as $row) {}?>
              <input type="hidden" name="ID_user" id="ID_user" value="<?=$row['ID_user']?>">
                <input type="text" id="full_name" class="form-control form-control-lg" required name="full_name" value="<?=$row['full_name']?>" />
            <label class="form-label" for="full_name">ФИО</label>
      </div>

          <div class="form-outline mb-4">
            <input type="text" id="phone" class="form-control form-control-lg" required  name="phone" value="<?=$row['phone']?>" />
            <label class="form-label" for="phone">Телефон</label>
          </div>
          <div class="form-outline mb-4">
            <input type="text" id="address" class="form-control form-control-lg" required   name="address" value="<?=$row['address']?>" />
            <label class="form-label" for="address">Адрес</label>
          </div>
          <div class="d-flex justify-content-center">
            <button type="submit"
              class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">сохранить</button>
          </div>

        </form>


      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Мои курсы
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">


      <table class="table">
  <thead>
    <tr>
      <th scope="col">Курсы</th>
      <th scope="col">Направление</th>
      <th scope="col">Наименование ОП</th>
      <th scope="col">Вид</th>
      <th scope="col">Дата начала обучения</th>
      <th scope="col">Дата окончания обучения</th>
      <th scope="col">Телефон</th>
      <th scope="col">E-mail</th>
      <th scope="col">Статус</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>fdfdd</td>
      <td>fdfd</td>
      <td>fdf</td>
      <td>@fdfd</td>
      <td>@fdfd</td>
      <td>fdfd</td>
      <td>fdf</td>
      <td>@fdfd</td>
      <td>@fdfd</td>
    </tr>

  </tbody>




    </div>
    </div>
  </div>
</div>

            </div>
        </div>
    </div>
</section>