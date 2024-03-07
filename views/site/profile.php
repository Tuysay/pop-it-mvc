<h2>Поиск по дисциплине:</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post">
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
    <label>Авторы: <br>
        <select style="height: auto;" name="disciplines[]">
            <?php foreach($disciplines as $discipline) {
                ?>
                <option value="<?php echo $discipline->id ; ?>"><?php echo $discipline->name ; ?></option>
            <?php } ?>
        </select>
    </label>
    <button>Выбрать</button>
</form>
<h1>Список Книг</h1>
<ol>
    <?php
    foreach ($selectDiscipline as $discipline) {
        foreach ($discipline->employees as $employee) {
            echo '<p>Имя: ' . $employee->firt_name . '</p>';
            echo '<p>Фамилия: ' . $employee->last_name . '</p>';
            echo '<p>Отчество: ' . $employee->patronymic . '</p>';
            echo '<p>Пол: ' . $employee->gender . '</p>';
            echo '<p>Дата рождения: ' . $employee->birthday . '</p>';
            echo '<p>Адрес проживания: ' . $employee->address . '</p>';
            echo '<p>Должность: ' . $employee->post_id . '</p>';
            echo '<p>Департамент ' . $employee->department_id . '</p>';
            echo '<p>Дисциплина: ' . $discipline->name . '</p>';
            echo '<br><br><br>';
        }
    }

    ?>
</ol>