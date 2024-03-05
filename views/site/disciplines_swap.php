<h2>Изменение</h2>
<h3><?= $message ?? ''; ?></h3>

<form method="post">
    <label>Авторы: <br>
        <select name="disciplines[]">
            <?php foreach($disciplines as $discipline) {
                ?>
                <option value="<?php echo $discipline->id ; ?>"><?php echo $discipline->name ; ?></option>
            <?php } ?>
        </select>
    </label>
    <label>Дисциплины
        <select name="employee[]">
            <?php foreach($employees  as $employee )
            {
                ?>
                <option value="<?php echo $employee->disciplines_id; ?>"><?php echo $employee->firt_name; ?></option>
            <?php } ?>
        </select>
    </label>
    <button>Зарегистрироваться</button>
</form>

<ol>
    <?php
    if (!empty($disciplines)) {
        foreach ($disciplines as $discipline) {
            echo '<p>Имя: ' . $discipline->name . '</p>';

//                echo '<p><a href="/profile?id='.$employee->id.'">Просмотр</a></p>';
            echo '<br><br><br>';
        }
    }
    ?>
</ol>

<ol style="margin-left: 400px; margin-top: -300px">
    <?php
    if (!empty($employees)) {
        foreach ($employees as $employee) {
            echo '<p>Имя: ' . $employee->firt_name . '</p>';
            echo '<p>Фамилия: ' . $employee->last_name . '</p>';
            echo '<p>Отчество: ' . $employee->patronymic . '</p>';
            echo '<p>Пол: ' . $employee->gender . '</p>';
            echo '<p>Дата рождения: ' . $employee->birthday . '</p>';
            echo '<p>Адрес проживания: ' . $employee->address . '</p>';
            echo '<p>Должность: ' . $employee->post_id . '</p>';
            echo '<p>Департамент ' . $employee->department_id. '</p>';
            echo '<p>Дисциплина: ' . $employee->disciplines_id . '</p>';
//                echo '<p><a href="/profile?id='.$employee->id.'">Просмотр</a></p>';
            echo '<br><br><br>';
        }
    }
    ?>
</ol>
