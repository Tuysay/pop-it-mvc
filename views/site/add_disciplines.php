<h2>Добавление новой дисциплины</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post">
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

    <label>Название <input type="text" name="name"></label>
    <button>Зарегистрироваться</button>
</form>

<a class="sas" href="<?= app()->route->getUrl('/profile') ?>">Поиск по дисциплине</a>
