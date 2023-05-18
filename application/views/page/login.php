<!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden">
  <style>
    .background-radial-gradient {
      background-color: hsl(218, 41%, 15%);
      background-image: radial-gradient(650px circle at 0% 0%,
          hsl(218, 41%, 35%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%),
        radial-gradient(1250px circle at 100% 100%,
          hsl(218, 41%, 45%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%);
    }

    #radius-shape-1 {
      height: 220px;
      width: 220px;
      top: -60px;
      left: -130px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
  </style>




  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
      

        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          Международная инклюзивная академия <br />
          <span style="color: hsl(218, 81%, 75%)">образовательный центр и ИТ</span>
        </h1>
        
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass" style="margin-bottom: 29%; margin-top: 20%;">
          <div class="card-body px-4 py-5 px-md-5">
            <form action="login/log_action"  method="POST">
             
              <div class="form-outline mb-4">
                <input type="text" id="form3Example3" class="form-control" name="login"/>
                <label class="form-label" for="form3Example3">Логин</label>
              </div>

              <div class="form-outline mb-4">
                <input type="password" id="form3Example4" class="form-control" name="passwords" />
                <label class="form-label" for="form3Example4">Пароль</label>
              </div>

              <div style="text-align:center;">
              <button type="submit" class="btn btn-primary btn-block mb-4">
                ВОЙТИ
              </button>
              </div>

           
              <div class="text-center">
                <p>У вас нет аккуант? <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                зарегистрироваться
</button> </p>
           <br>
           <a href="main/index"><button type="button" class="btn btn-info btn-rounded">Вернуться главную</button></a>


              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
      <section class=" bg-image">
  
  <div class="col-12 ">
    <div class="card" style="border-radius: 15px;">
      <div class="card-body p-5">
        <h2 class="text-uppercase text-center mb-5">РЕГИСТРАЦИЯ</h2>

        <form action="login/add_user" method="post">

          <div class="form-outline mb-4">
            <input type="text" id="form3Example1cg" class="form-control form-control-lg" required name="full_name"/>
            <input type="hidden" id="form3Example1cga" class="form-control form-control-lg" required name="ID_role" value="4"/>
            <label class="form-label" for="form3Example1cg">ФИО</label>
          </div>

          <div class="form-outline mb-4">
            <input type="text" id="form3Example2cg" class="form-control form-control-lg" required  name="phone"/>
            <label class="form-label" for="form3Example2cg">Телефон</label>
          </div>
          <div class="form-outline mb-4">
            <input type="email" id="form3Example3cg" class="form-control form-control-lg" required   name="email"/>
            <label class="form-label" for="form3Example3cg">E-mail</label>
          </div>

          <div class="form-outline mb-4">
            <input type="text" id="form3Example4cdg" class="form-control form-control-lg"  required  name="login"/>
            <label class="form-label" for="form3Example4cdg">Логин</label>
          </div>

          <div class="form-outline mb-4">
            <input type="password" id="form3Example5cg" class="form-control form-control-lg" required  name="passwords" />
            <label class="form-label" for="form3Example5cg">Пароль</label>
          </div>

          <div class="d-flex justify-content-center">
            <button type="submit"
              class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Регистрация</button>
          </div>

        </form>

      </div>
</div>
</div>
</section>
      </div>
      
    </div>
  </div>
</div>


</section>




