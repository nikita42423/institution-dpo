<div class="container">
    <h1>Добавление учебного плана</h1>
    <form  method="post" action="edu_program/add_program" role="form" class="row g-3">

        <div class="col-md-6">
            <label for="id_ep" class="form-label">Образовательная программа</label>
            <select class="form-select" id="id_ep" name="id_ep">
                <?php foreach($type_ep as $row) {?>
                <option value="<?=$row['ID_ep']?>"><?=$row['ID_ep']?></option>
                <?php }?>
            </select>
        </div>
        <div class="col-md-6">
            <label for="name_discipline" class="form-label">Наименование дисциплины</label>
            <input type="text" class="form-control" id="name_discipline" name="name_discipline" value="" required>
        </div>
        <div class="col-md-2">
            <label for="amount_hour" class="form-label">Объем часов</label>
            <input type="number" class="form-control" id="amount_hour" name="amount_hour" min="0" value="0" required>
        </div>
        <div class="col-md-2">
            <label for="amount_hour_work" class="form-label">объем часов лаб. и пр. работ</label>
            <input type="number" class="form-control" id="amount_hour_work" name="amount_hour_work" min="0" value="0" required>
        </div>
        <div class="col-md-2">
            <label for="type_practice" class="form-label">вид практики (если есть)</label>
            <input type="text" class="form-control" id="type_practice" value="" required>
        </div>
        <div class="col-md-2">
            <label for="amount_hour_practice" class="form-label">объем часов видов практики (если есть)</label>
            <input type="number" class="form-control" id="amount_hour_practice" name="amount_hour_practice" min="0" value="0">
        </div>
        <div class="col-md-2">
            <label for="type_mid_cert" class="form-label">вид промеж. аттестации</label>
            <input type="text" class="form-control" id="type_mid_cert" value="">
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Добавить</button>
        </div>

    </form>
</div>