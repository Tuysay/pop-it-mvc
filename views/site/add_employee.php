<h2>Добавление нового сотрудника</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post"  enctype="multipart/form-data">
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

    <label>Имя <input type="text" name="firt_name"></label>
    <label>Фамилия <input type="text" name="last_name"></label>
    <label>Отчество <input type="text" name="patronymic"></label>
    <label>Пол
       <select  name="gender">
           <option value="1">Мужской</option>
           <option value="0">Женский</option>
       </select>
    </label>
    <label>Адрес <input type="text" name="address"></label>
    <label>Аватарка
        <input type="file" name="img_photo"><br>
    </label>
    <label>Департамент
            <select name="department_id">
                <?php foreach($departments as $department)
                {
                    ?>
                    <option value="<?php echo $department->id; ?>"><?php echo $department->name; ?></option>
                <?php } ?>
            </select>
    </label>
    <label>Дисциплины
        <select name="disciplines_id">
            <?php foreach($disciplines as $discipline)
            {
                ?>
                <option value="<?php echo $discipline->id; ?>"><?php echo $discipline->name; ?></option>
            <?php } ?>
        </select>
    </label>
    <label>День рождения  <input type="date" name="birthday"></label>
    <label>Должность
        <select name="post_id">
            <?php foreach($posts as $post)
            {
                ?>
                <option value="<?php echo $post->id; ?>"><?php echo $post->name; ?></option>
            <?php } ?>
        </select>
    </label>
    <button>Зарегистрироваться</button>
</form>
<a class="faa" href="<?= app()->route->getUrl('/employee_search') ?>">Поиск сотрудника</a> <br>



