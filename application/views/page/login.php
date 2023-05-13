<div class="container">
    <div class="container-fluid vh-100" style="margin-top:80px">
        <div class="" style="margin-top:100">
            <div class="rounded d-flex justify-content-center">
                <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                    <div class="text-center">
                        <h3 class="text-primary">АВТОРИЗАЦИЯ</h3>
                    </div>
                    <form action="<?=base_url('login/log_action')?>" method="POST">
                        <div class="p-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-primary"><i class="bi bi-person-plus-fill text-white"></i></span>
                                <input type="text" class="form-control" name="login" placeholder="Логин">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-primary"><i
                                        class="bi bi-key-fill text-white"></i></span>
                                <input type="password" class="form-control" name="password" placeholder="Пароль">
                            </div>
                            <div style="text-align: center;">
                            <button class="btn btn-primary text-center mt-2" type="submit">
                                ВОЙТИ
                            </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>