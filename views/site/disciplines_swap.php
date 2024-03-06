<h2>Добавление нового сотрудника</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post">
    <label>Авторы: <br>
        <select style="height: auto;" name="employee[]">
            <?php foreach($emp as $discipline) {
                ?>
                <option value="<?php echo $discipline->id ; ?>"><?php echo $discipline->firt_name ; ?></option>
            <?php } ?>
        </select>
    </label>

    <label>Дисциплины
        <select name="emp_disciplines">
            <?php foreach($disciplines as $discipline)
            {
                ?>
                <option value="<?php echo $discipline->id; ?>"><?php echo $discipline->name; ?></option>
            <?php } ?>
        </select>
    </label>
    <button>Зарегистрироваться</button>
</form>
<a class="faa" href="<?= app()->route->getUrl('/employee_search') ?>">Поиск сотрудника</a> <br>
<a class="faa" href="<?= app()->route->getUrl('/employee_search') ?>"></a>


