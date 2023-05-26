<main class="container">

    <div class="row justify-content-md-center mb-3">
        <div class="col-md-auto">
            <h1 class="display-6 text-center mb-3">Образовательная программа<br><b>"<?=$ep->name_ep?>"</b></h1>
        </div>
    </div>

    <form id="form_add_discipline" method="post" action="discipline/add_discipline" role="form" class="row g-3">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <input type="hidden" name="ID_ep" value="<?=$_GET['ID_ep']?>">
                
                <label for="name_discipline" class="form-label">Наименование дисциплины</label>
                <input type="text" class="form-control mb-3" id="name_discipline" name="name_discipline" value="12312" required>

                <div class="row mb-3">
                    <div class="col-3">
                        <label for="amount_hour" class="form-label">Объем часов</label>
                        <input type="number" class="form-control" id="amount_hour" name="amount_hour" min="0" value="" required>
                    </div>
                    <div class="col">
                        <label for="amount_hour_work" class="form-label">Объем часов лаб. и пр. работ</label>
                        <input type="number" class="form-control" id="amount_hour_work" name="amount_hour_work" min="0" value="" required>
                    </div>
                    <div class="col-4">
                        <label for="type_mid_cert" class="form-label">Вид промеж. аттестации</label>
                        <input type="text" class="form-control" id="type_mid_cert" name="type_mid_cert" value="" required>
                    </div>
                </div>
                
                <div class="row mb-5">
                    <div class="col-5">
                        <label for="type_practice" class="form-label">Вид практики (если есть)</label>
                        <input type="text" class="form-control" id="type_practice" name="type_practice" value="">
                    </div>
                    <div class="col">
                        <label for="amount_hour_practice" class="form-label">Объем часов видов практики (если есть)</label>
                        <input type="number" class="form-control" id="amount_hour_practice" name="amount_hour_practice" min="0" value="">
                    </div>
                </div>

                <button class="btn btn-primary btn-lg container-fluid" type="submit">Добавить</button>

            </div>
            <div class="col-3"></div>
        </div>
    </form>
    
</main>