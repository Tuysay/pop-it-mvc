<form method="post">
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
    <label>Структуры: <br>
        <select style="height: auto;" name="structure[]" multiple>
            <?php foreach($departments as $department) {
                ?>
                <option value="<?php echo $department->id; ?>"><?php echo $department->name; ?></option>
            <?php } ?>
        </select>
    </label>
    <button>Выбрать</button>
</form>
<h1>Список сотрудников</h1>
<ol>
    <?php
    foreach ($employees as $employee) {
        echo '<p>Имя: ' . $employee->fname . '</p>';
        echo '<p>Фамилия: ' . $employee->lname . '</p>';
        echo '<p>Отчество: ' . $employee->patronymic . '</p>';
        echo '<p>Пол: ' . $employee->gender . '</p>';
        echo '<p>Дата рождения: ' . $employee->birthdate . '</p>';
        echo '<p>Адрес проживания: ' . $employee->address . '</p>';
        echo '<p>Должность: ' . $employee->post_id . '</p>';
        echo '<p>Отдел: ' . $employee->department_id . '</p>';
        echo '<p>Структура: ' . $employee->structure_id . '</p>';
        echo '<br><br><br>';
    }
    ?>
</ol>