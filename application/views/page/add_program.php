<div class="container">
    <h1>Добавление образовательной программы</h1>
    <form  method="post" action="edu_program/add_program" role="form" class="row g-3">

        <div class="col-md-5">
            <label for="name_program" class="form-label">Наименование программы</label>
            <input type="text" class="form-control" id="name_program" value="" required>
        </div>
        <div class="col-md-5">
            <label for="name_profession" class="form-label">Наименование профессии</label>
            <input type="text" class="form-control" id="name_profession" value="" required>
        </div>
        <div class="col-md-2">
            <label for="type_cert" class="form-label">Вид итоговой аттестации</label>
            <input type="text" class="form-control" id="type_cert" value="" required>
        </div>
        <div class="col-md-3">
            <label for="ID_type_ep" class="form-label">Вид ОП</label>
            <select class="form-select" id="id_type_ep">
                <?php foreach($type_ep as $row) {?>
                <option value="<?=$row['ID_type_ep']?>"><?=$row['name_type_ep']?></option>
                <?php }?>
            </select>
        </div>
        <div class="col-md-3">
            <label for="ID_focus" class="form-label">Направление</label>
            <select class="form-select" id="id_focus">
                <?php foreach($focus as $row) {?>
                <option value="<?=$row['ID_focus']?>"><?=$row['name_focus']?></option>
                <?php }?>
            </select>
        </div>
        <div class="col-md-3">
            <label for="ID_type_doc" class="form-label">Вид документа</label>
            <select class="form-select" id="id_type_doc">
                <?php foreach($type_doc as $row) {?>
                <option value="<?=$row['ID_type_doc']?>"><?=$row['name_type_doc']?></option>
                <?php }?>
            </select>
        </div>
        <div class="col-md-3">
            <label for="ID_form" class="form-label">Форма обучения</label>
            <select class="form-select" id="id_form">
                <?php foreach($form_teach as $row) {?>
                <option value="<?=$row['ID_form']?>"><?=$row['name_form']?></option>
                <?php }?>
            </select>
        </div>
        <div class="col-md-2">
            <label for="time_week" class="form-label">Срок обучения в неделях</label>
            <input type="number" class="form-control" id="time_week" min="0" value="" required>
        </div>
        <div class="col-md-2">
            <label for="amount_hour" class="form-label">Объем часов</label>
            <input type="number" class="form-control" id="amount_hour" min="0" value="" required>
        </div>
        <div class="col-md-2">
            <label for="count_in_group" class="form-label">Наполняемость группы</label>
            <input type="number" class="form-control" id="count_in_group" min="0" value="" required>
        </div>
        <div class="col-md-2">
            <label for="cost_hour" class="form-label">Стоимость 1 педчаса</label>
            <input type="number" class="form-control" id="cost_hour" min="0" step="0.01" value="0">
        </div>
        <div class="col-md-2">
            <label for="price" class="form-label">Цена</label>
            <input type="number" class="form-control" id="price" min="0" step="0.01" value="0">
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Добавить</button>
        </div>

    </form>
</div>