<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/style/style.css">
    <title>Pop it MVC</title>
</head>
<body>
<header>
    <nav class="menu">
        <ul>
            <a href="<?= app()->route->getUrl('/hello') ?>">Главная</a>
            <?php
            if (!app()->auth::check()):
                ?>
                <a href="<?= app()->route->getUrl('/login') ?>">Вход</a>
                <a href="<?= app()->route->getUrl('/add_admin_employee') ?>">Регистрация обычного пользователя</a>
            <?php
            else:
                ?>
                <a href="<?= app()->route->getUrl('/add_employee') ?>">Добавление сотрудника</a>
                <a href="<?= app()->route->getUrl('/add_disciplines') ?>">Добавление дисциплины</a>
                <a href="<?= app()->route->getUrl('/add_department') ?>">Добавление департамента</a>
                <a href="<?= app()->route->getUrl('/add_posts') ?>">Добавление должно</a>
                <a href="<?= app()->route->getUrl('/signup') ?>">Регистрация основная</a>
                <a href="<?= app()->route->getUrl('/logout') ?>">Выход (<?= app()->auth::user()->name ?>)</a>

            <?php
            endif;
            ?>
        </ul>

    </nav>
</header>
<main>
    <?= $content ?? '' ?>
</main>

</body>
</html>
