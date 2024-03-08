<div class="search_employee_form">
    <form method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

        <fieldset>
            <pre><?= $message ?? ''; ?></pre>
            <h2>Поиск сотрудника</h2>
            <label>Имя <input type="text" name="employee[]"></label>
            <button>Поиск</button>
        </fieldset>
    </form>
    <h1>Список сотрудников</h1>
    <ol>
        <?php
        if (!empty($employees)) {
            foreach ($employees as $employee) {
                echo '<p>Имя: ' . $employee->firt_name . '</p>';
                echo '<p>Фамилия: ' . $employee->last_name . '</p>';
                echo '<p>Отчество: ' . $employee->patronymic . '</p>';
                echo '<p>Пол: ' . $employee->gender . '</p>';
                echo '<p>Дата рождения: ' . $employee->birthday . '</p>';
                echo '<p>Адрес проживания: ' . $employee->address . '</p>';
                echo '<img style="width: 300px;" src="public/' . $employee->img_photo . '" alt="Аватарка">';
                echo '<p>Должность: ' . $employee->post_id . '</p>';
                echo '<p>Департамент ' . $employee->department_id. '</p>';
                echo '<p>Дисциплина: ' . $employee->id . '</p>';
                echo '<br><br><br>';
            }
        }
        ?>
    </ol>
</div>
