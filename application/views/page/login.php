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

<div class="jumbotron">
            <button class="btn btn-primary head" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
</svg>
            </button>

                <div class="offcanvas offcanvas-start" style="width: 30%;" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel" ><img src="<?=asset_url()?>/img/log.png" alt="" width="200" height="200"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Закрыть"></button>
                </div>
                <div class="offcanvas-body ">
                    
                        <div class="nav">
                                <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="<?=base_url("main/index")?>">ГЛАВНАЯ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?=base_url("main/index")?>#aboutus">О БИЗНЕС - ШКОЛЕ</a>
                                </li>
                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="<?=base_url("main/index")?>#nabral" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    НАПРАВЛЕНИЕ
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="<?=base_url("")?>">ИНФОРМАЦИОННЫЕ СИСТЕМЫ И ПРОГРАММИРОВАНИЕ</a></li>
                                    <li><a class="dropdown-item" href="<?=base_url("")?>">ФИНАНСЫ И БУХГАЛТЕРСКИЙ УЧЕТ</a></li>
                                    <li><a class="dropdown-item" href="<?=base_url("")?>">ИНОСТРАННЫЕ ЯЗЫКИ</a></li>
                                    <li><a class="dropdown-item" href="<?=base_url("")?>">ЮРИСПРУДЕНЦИЯ И ПРАВО</a></li>
                                    <li><a class="dropdown-item" href="<?=base_url("")?>">ПЕДАГОГИКА И ДИДАКТИКА</a></li>
                                    <li><a class="dropdown-item" href="<?=base_url("")?>">ПСИХОЛОГИЯ</a></li>
                                </ul>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="<?=base_url("login/index")?>"><button type="button" class="btn btn-outline-dark">АВТОРИЗАЦИЯ</button></a>
                                </li>
                                </ul>
                        </div><hr>
                        <div class="cont">

                        <h3>Контакы</h3>
                        <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-forward-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zm10.761.135a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.293 4H9.5a.5.5 0 0 1 0-1h4.793l-1.647-1.646a.5.5 0 0 1 0-.708z"/>
</svg> &nbsp; &nbsp; 8 (863) 240-97-11

                        </span> <br>
                        <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
  <path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2H2Zm-2 9.8V4.698l5.803 3.546L0 11.801Zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 9.671V4.697l-5.803 3.546.338.208A4.482 4.482 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671Z"/>
  <path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034v.21Zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791Z"/>
</svg>
&nbsp; &nbsp; bs-kontrakt@yandex.ru
                        </span> <br>
                        <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z"/>
</svg>  &nbsp; &nbsp; Ростовская область, г. Новочеркасск, улица Платовский, д. 116
                        </span>
                        </div>
                </div>
                
                </div>  

                
  
</div>



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

        <div class="card bg-glass" style="margin-bottom: 25.1%; margin-top: 20%;">
          <div class="card-body px-4 py-5 px-md-5">
            <form action="<?=base_url('login/log_action')?>"  method="POST">
             
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
               <!-- Button trigger modal -->



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

        <form action="<?=base_url('login/add_user')?>" method="post">

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




